<?php

// File Upload Data
if(isset($_POST['continue'])) {
    $file_name = $_POST['filename']; 
}

class DocxConversion{
    private $filename;

    public function __construct($filePath) {
        $this->filename = $filePath;
    }

    private function read_doc() {
        $fileHandle = fopen($this->filename, "r");
        $line = @fread($fileHandle, filesize($this->filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline)
          {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(strlen($thisline)==0))
              {
              } else {
                $outtext .= $thisline." ";
              }
          }
         $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }

    private function read_docx(){

        $striped_content = '';
        $content = '';

        $zip = zip_open($this->filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    } 

    public function convertToText() {

        if(isset($this->filename) && !file_exists($this->filename)) {
            return "File Not exists";
        }

        $fileArray = pathinfo($this->filename);
        $file_ext  = $fileArray["extension"];
        if($file_ext == "doc" || $file_ext == "docx" || $file_ext == "xlsx" || $file_ext == "pptx")
        {
            if($file_ext == "doc") {
                return $this->read_doc();
            } elseif($file_ext == "docx") {
                return $this->read_docx();
            } elseif($file_ext == "xlsx") {
                return $this->xlsx_to_text();
            }elseif($file_ext == "pptx") {
                return $this->pptx_to_text();
            }
        } else {
            return "Invalid File Type";
        }
    }
}

// Convert
$docObj = new DocxConversion($file_name);
$docText= $docObj->convertToText();

// Shrink for Preview
function custom_echo($x, $length)
{
    if(strlen($x)<=$length) {
        echo $x;
    }
    else {
        $y=substr($x,0,$length) . '...';
        echo $y;
    }
}

$path = $file_name;
!unlink($path);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Preview of the File you are About to upload:
    <br>
    <div type="text" name="preview">
    <?php 
    custom_echo($docText, 900); 
    ?>
    </div>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="body" value="<?php echo $docText; ?>"></input>
    <br>
    <label for="Title">Title:</label>
    <input type="text" id="title" name="title"><br><br>
    <label for="instructions">Instructions:</label>
    <input type="text" id="instructions" name="instructions"><br><br>
    Click button to proceed:
    <br>
    <input type="submit" name="submit" value="Upload">
</form>
<form action="" method="get">
    <input type="submit" value="goback" 
         name="Cancel" id="frm1_submit" />
</form>
</body>
</html>
