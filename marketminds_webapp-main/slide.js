var myElement = document.getElementById('carouselExampleControls');
// create a simple instance
// by default, it only adds horizontal recognizers
var mc = new Hammer(myElement);
// listen to events...
mc.on("swipeleft", function(ev) {
    $('#carouselExampleControls').carousel('next');
});
mc.on("swiperight", function(ev) {
    $('#carouselExampleControls').carousel('prev');
});