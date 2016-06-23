function $(i) {return document.querySelector(i)} // Jquery in 48 bytes

function ajax(url,cb) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            cb(JSON.parse(xhttp.responseText));
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

function PostAjax(url, data, cb) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            cb(JSON.parse(xhttp.responseText));
        }
    };
    xhttp.open("post", url);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(encodeURI(data));
}
