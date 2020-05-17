let edits = [];

function uuidv4() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
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
        if (type) {
            var newtext = gay.innerHTML.slice(0, index) + "<mark id=" + uuidv4() + 
                        ">" + gay.innerHTML.slice(index, index2) + "</mark>" + gay.innerHTML.slice(index2);
            gay.innerHTML = newtext;
        } else {
            var newtext = gay.innerHTML.slice(0, index) + "<span id=" + uuidv4() + 
                        "style='text-decoration:line-through'>" + gay.innerHTML.slice(index, index2) + "</span>" + gay.innerHTML.slice(index2);
            gay.innerHTML = newtext;
        }
    }
}

function popup(event) {
    var popup = document.getElementById("popup");
    var s = window.getSelection();

    if (s.toString().length > 0) {
        var oRange = s.getRangeAt(0); //get the text range
        var oRect = oRange.getBoundingClientRect();

        popup.style.left = oRect.x + (oRect.width / 2) + 'px';
        popup.style.top = (oRect.bottom + 3) + 'px';
        popup.setAttribute("class", "visible");
    } else {
        popup.setAttribute("class", "hidden");
    }
}