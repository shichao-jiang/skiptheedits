<html>
    <title>Edit an Essay</title>
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="../default.css">
</head>
<body id="body" style="background-color: rgb(250, 250, 250)">
    <?php include_once "../header/header.html" ?>
    <div id="header-secondary"><h1>Editor Module</h1></div>
    <div id="containerLeft">
        <div id="editor" onmouseup="popup(event)">
            <?php include_once('load.php') ?>
        </div>
    </div>
    <div id="containerRight">
        <div id="panelMark">
            <h2>Mark As</h2>
            <textarea id="comment" rows="9" placeholder="Add Comment Related to Highlight..."></textarea>
            <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/grammar.png" onclick="createChangeHTML(EnumChangeType.GRAMMAR);"></div>
                <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/diction.png" onclick="createChangeHTML(EnumChangeType.DICTION);"></div>
                <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/cliche.png" onclick="createChangeHTML(EnumChangeType.CLICHE);"></div>
                <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/length.png" onclick="createChangeHTML(EnumChangeType.LENGTH);"></div>
                <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/overused.png" onclick="createChangeHTML(EnumChangeType.OVERUSED);"></div>
                <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/plagiarism.png" onclick="createChangeHTML(EnumChangeType.PLAGIARISM);"></div>
                <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/pronoun.png" onclick="createChangeHTML(EnumChangeType.PRONOUN);"></div>
                <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/repeats.png" onclick="createChangeHTML(EnumChangeType.REPEATS);"></div>
                <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/style.png" onclick="createChangeHTML(EnumChangeType.STYLE);"></div>
                <div class="container-edit-icon"><img class="edit-icon" src="../img/edit-icons/thesaurus.png" onclick="createChangeHTML(EnumChangeType.THESAURUS);"></div>
            <button id="btnFinishMarking" onclick="showPanelFinalMessage();">Finish Marking</button>
        </div>
        <div id="panelFinalMessage">
            <h2>Finish Editing</h2>
            <textarea id="txtFinalMessage" type="text" rows="9" placeholder="Final Edit Message..." onkeydown="updateCharacterCounter();" onkeyup="updateCharacterCounter();"></textarea>
            <button id="btnShowPanelMark" onclick="showPanelMark();">Back</button>
            <button id="btnSubmitChanges" onclick="postChanges();">Submit Edits</button>
        </div>
    
        <div id="textAreaCounter"></div>
    </div>
    <div id="popup" class="hidden">
        <button onclick="edit(0); display()">&times;</button>
        <button onclick="edit(1); display()" style="background-color:yellow">pp</button>
    </div>
    <script src="edit.js"></script>
</body>
</html>