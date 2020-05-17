let edits = [];
let body = document.getElementById("body");

function uuidv4() {
    return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
      (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
  }

function display() {
    edits.forEach(edit => {
        elem = document.getElementById(edit.uuid + "-com");

        if (elem == null) {
            div = document.createElement("div");
            div.setAttribute("class", "comment");
            div.setAttribute("id", edit.uuid + "-com")
            div.innerHTML = edit.edit;
            div.style.top = edit.pos.top + body.scrollTop;
            div.style.left = "calc(40rem + (40% - 22rem))";
            body.appendChild(div);
        }
    });
}

function edit(type) {
    var gay = document.getElementById("editor");

    var text = "";
    if (window.getSelection) {
        text = window.getSelection().toString();
    }

    var index = gay.innerHTML.indexOf(text);
    var index2 = index + text.length;

    if (index <= 0|| index2 < 0 ) {
        alert("Cannot highlight overlapping text.");
    } else {
        var uuid = uuidv4();
        var s = window.getSelection();
        var oRange = s.getRangeAt(0);
        var oRect = oRange.getBoundingClientRect();
        var comment = document.getElementById("comment");

        if (comment.value.length > 0) {
            if (type) {
                var newtext = gay.innerHTML.slice(0, index) + "<mark id='" + uuid + "'>" + gay.innerHTML.slice(index, index2) + "</mark>" + gay.innerHTML.slice(index2);
                gay.innerHTML = newtext;
            } else {
                var newtext = gay.innerHTML.slice(0, index) + "<span id='" + uuid + "' style='text-decoration:line-through'>" + gay.innerHTML.slice(index, index2) + "</span>" + gay.innerHTML.slice(index2);
                gay.innerHTML = newtext;
            }

            edits.push({uuid:uuid, pos:oRect, edit:comment.value});
            comment.value = "";
            document.getElementById("popup").setAttribute("class", "hidden");
        } else {
            alert("Comment cannot be blank");
        }    
    }
}

function popup(event) {
    var popup = document.getElementById("popup");
    var s = window.getSelection();

    var activeEl = document.activeElement.getAttribute("id");

    if (activeEl != "editor") {
        if (s.toString().length > 0) {
            var oRange = s.getRangeAt(0);
            var oRect = oRange.getBoundingClientRect();
    
            popup.style.left = oRect.x + (oRect.width / 2) + 'px';
            popup.style.top = (oRect.bottom + body.scrollTop + 3) + 'px';
            popup.setAttribute("class", "visible");
        } else {
            popup.setAttribute("class", "hidden");
        }
    }
}

function sendEdit(edit) {
    xhr = new XMLHttpRequest();
    xhr.open('POST', 'send.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (this.status == 200) {
        }
    }

    params = "uuid=" + edit.uuid + "&pos=" + edit.pos.top + "&edit=" + edit.edit;
    xhr.send(params);
}   

function finish() {
    edits.forEach(edit => {
        sendEdit(edit);
    });

    var editor = document.getElementById("editor");

    xhr = new XMLHttpRequest();
    xhr.open('POST', 'send2.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (this.status == 200) {
            alert(this.responseText);
            //window.location.replace('../home/home.php');
        }
    }

    params = "text=" + editor.innerHTML;
    xhr.send(params);   
}