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

function hover(id) {
    var comment = document.getElementById(id + "-com");
    comment.classList.add("hover");
}

function out(id) {
    var comment = document.getElementById(id + "-com");
    comment.classList.remove("hover");
}

function edit(type) {
    var gay = document.getElementById("editor");
    var s = window.getSelection();

    var text = "";
    if (s) {
        text = s.toString();
    }

    var spans = body.getElementsByTagName("span");
    var overlap = null;

    for (var i=0; i<spans.length; i++) {
        if (s.containsNode(spans[i], true)) {
            overlap = spans[i];
        }
    }

    var indexText = s.anchorOffset;
    var indexText2 = s.focusOffset;
    var index = gay.innerHTML.indexOf(text);
    var index2 = index + text.length;

    if (overlap == null) {
        var uuid = uuidv4();
        var oRange = s.getRangeAt(0);
        var oRect = oRange.getBoundingClientRect();
        var comment = document.getElementById("comment");
        
        if (indexText > indexText2) {
            var temp = indexText;
            indexText = indexText2;
            indexText2 = temp;
        }

        if (s.anchorNode.previousSibling) {
            var offset = gay.innerHTML.indexOf(s.anchorNode.previousSibling.outerHTML) + s.anchorNode.previousSibling.outerHTML.length;
            indexText += offset;
            indexText2 += offset;
        }

        if (comment.value.length > 0) {
            if (type) {
                var newtext = gay.innerHTML.slice(0, indexText) + "<span id='" + uuid + "' class='highlight' onmouseover='hover(\"" + uuid + "\")' onmouseout='out(\"" + uuid + "\")'>"
                            + gay.innerHTML.slice(indexText, indexText2) + "</span>" + gay.innerHTML.slice(indexText2);
                gay.innerHTML = newtext;
            } else {
                var newtext = gay.innerHTML.slice(0, indexText) + "<span id='" + uuid + "' class='strike' onmouseover='hover(\"" + uuid + "\")' onmouseout='out(\"" + uuid + "\")'>"
                            + gay.innerHTML.slice(indexText, indexText2) + "</span>" + gay.innerHTML.slice(indexText2);
                gay.innerHTML = newtext;
            }

            edits.push({uuid:uuid, pos:oRect, edit:comment.value});
            comment.value = "";
            document.getElementById("popup").setAttribute("class", "hidden");
        } else {
            alert("Comment cannot be blank");
        }
    } else {
        console.log(overlap);
    }
}

function popup(event) {
    var popup = document.getElementById("popup");
    var s = window.getSelection();

    if (!s.isCollapsed) {
        var oRange = s.getRangeAt(0);
        var oRect = oRange.getBoundingClientRect();

        popup.style.left = oRect.x + (oRect.width / 2) + 'px';
        popup.style.top = (oRect.bottom + body.scrollTop + 3) + 'px';
        popup.setAttribute("class", "visible");
    } else {
        popup.setAttribute("class", "hidden");
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

    params = "uuid=" + edit.uuid + "&pos=" + edit.pos.top + body.scrollTop + "&edit=" + edit.edit;
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
            alert("Edits Submitted");
            window.location.replace('../home/home.php');
        }
    }

    params = "text=" + editor.innerHTML;
    xhr.send(params);   
}