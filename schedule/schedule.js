var rectelem1 = document.getElementById('calendar1');
var rectelem2 = document.getElementById('calendar2');
var timelineelem = document.getElementsByClassName('timeline');

function test() {
    var rect1 = rectelem1.getBoundingClientRect();
    var rect2 = rectelem2.getBoundingClientRect();
    var timelinerect = timelineelem[0].getBoundingClientRect();
    
    var overlap = (rect1.bottom - rect2.top) > 10;
    var overlap2 = (rect1.right - timelinerect.left) > 10;

    if (overlap == true) {
        rectelem2.style.visibility = "hidden";
    } else if (overlap == false) {
        rectelem2.style.visibility = "visible";
    }
    
    if (overlap2 == true) {
        rectelem1.style.visibility = "hidden";
    } else if (overlap2 == false) {
        rectelem1.style.visibility = "visible";
    }
}

setInterval(test, 100);

function hoverDate(text, element) {
    element.innerHTML = text;
    element.style.padding = 0;
}

function hoverOutDate(text, element) {
    element.innerHTML = text;
}
