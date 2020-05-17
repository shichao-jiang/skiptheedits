let edits = [];

function uuidv4() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}

function display() {
    editor = document.getElementById("editor");

    edits.forEach(edit => {
        elem = document.getElementById(edit.uuid + "-com");

        if (elem == null) {
            div = document.createElement("div");
            div.setAttribute("class", "comment");
            div.setAttribute("id", edit.uuid + "-com")
            div.innerHTML = edit.uuid;
            div.style.top = edit.pos.top;
            div.style.left = "49rem";
            editor.appendChild(div);
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

        if (type) {
            var newtext = gay.innerHTML.slice(0, index) + "<mark id='" + uuid + "'>" + gay.innerHTML.slice(index, index2) + "</mark>" + gay.innerHTML.slice(index2);
            gay.innerHTML = newtext;
        } else {
            var newtext = gay.innerHTML.slice(0, index) + "<span id='" + uuid + "' style='text-decoration:line-through'>" + gay.innerHTML.slice(index, index2) + "</span>" + gay.innerHTML.slice(index2);
            gay.innerHTML = newtext;
        }

        edits.push({uuid:uuid, pos:oRect, edit:edit});
        document.getElementById("popup").setAttribute("class", "hidden");
    }
}

function popup(event) {
    var popup = document.getElementById("popup");
    var s = window.getSelection();

    if (s.toString().length > 0) {
        var oRange = s.getRangeAt(0);
        var oRect = oRange.getBoundingClientRect();

        popup.style.left = oRect.x + (oRect.width / 2) + 'px';
        popup.style.top = (oRect.bottom + 3) + 'px';
        popup.setAttribute("class", "visible");
    } else {
        popup.setAttribute("class", "hidden");
    }
}