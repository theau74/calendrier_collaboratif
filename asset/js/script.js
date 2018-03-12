function myFunction() {
    var x = document.getElementById('nav-bar');
    if (x.className === "ac-main-nav") {
        x.className += " responsive-nav-bar";
    } else {
        x.className = "ac-main-nav";
    }
    var y = document.getElementById('cal');
    if (y.className === "ac-main-calendrier") {
        y.className += " responsive-calendrier";
    } else {
        y.className = "ac-main-calendrier";
    }
}