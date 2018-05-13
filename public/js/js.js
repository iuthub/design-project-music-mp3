var TxtRotate = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtRotate.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 300 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('txt-rotate');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-rotate');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtRotate(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};

$(document).ready(function(){
    $('.hamburger').click(function(){
        $('.hamburger').toggleClass('toggle');
        $('#ul').css('display', 'block');
        $('#ul').css('background', 'white');
        $('#ul').css('position', 'absolute');
        $('#ul').css('padding', '5px 30px');
        $('#ul').css('right', '20px');
        $('#ul').css('top', '45px');
        $('#ul').css('z-index', '1');
        $('.ul_a').css('color', 'black');
        $('.hamburger').css('z-index', '2');
        $('.navbar_ul').toggle(500);
    })
});
$(document).ready(function()
{
    $("#stoggle").click(function()
    {
        $('#stoggle').css('display', 'none');
        $('#close').css('display', 'block');
        $('.search_input').css('display', 'block');
        $('.search_input').css('position', 'absolute');
        $('.search_input').css('padding', '4px');
        $('.search_input').css('font-size', '12px');
        $('.search_input').css('right', '64px');
        $('.search_input').css('width', '150px');
        $('.search_input').css('top', '-15px');
        $("#close").click(function()
        {
            $("#close, #body-search").css('display', 'none');
            $("#stoggle").css('display', 'block');
            $('.search_input').css('display', 'none');
        });
    });
});

$(document).ready(function(){

    var stickyHeaderTop = $('#header').offset().top;

    $(window).scroll(function(){
        if( $(window).scrollTop() > stickyHeaderTop ) {
            $('#header').css({position: 'fixed', top: '0px', width: '100%', zIndex: "100", overflow: 'visible'});
        } else {
            $('#header').css({position: 'static', top: '0px'});
        }
    });

});
function initMap() {
    var uluru = {lat: 41.338532,lng: 69.334593};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}