function loadedits() {
    xhr = new XMLHttpRequest();
    xhr.open('GET', 'loadedits.php', true);

    xhr.onload = function() {
        if (this.status == 200) {
            if (this.responseText !== "") {
                let edits = JSON.parse(this.responseText);

                edits.forEach(edit => {
                    div = document.createElement("div");
                    div.setAttribute("class", "comment");
                    div.setAttribute("id", edit.uuid + "-com")
                    div.innerHTML = edit.edit;
                    div.style.left = "calc(50% + 21rem)";
                    body.appendChild(div);
    
                    var pos = document.getElementById(edit.uuid).getBoundingClientRect().top + body.scrollTop;
                    div.style.top = pos + 'px';
                });
            }
        }
    }

    xhr.send();
}

function hover(id) {
    var comment = document.getElementById(id + "-com");
    comment.classList.add("hover");
}

function out(id) {
    var comment = document.getElementById(id + "-com");
    comment.classList.remove("hover");
}
