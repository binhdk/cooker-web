$(document).ready(function() {
    var filter = $('.navbar');
    var filterSpacer = $('<div />', {
        "class": "vnkings-spacer",
        "height": filter.outerHeight()
    });
    if(filter.length)
    {
        $(window).scroll(function () {
            if(!filter.hasClass('fix') && $(window).scrollTop() > filter.offset().top) {
                filter.before(filterSpacer);
                filter.addClass("fix");
            } else if(filter.hasClass('fix')  && $(window).scrollTop() < filterSpacer.offset().top) {
                filter.removeClass("fix");
                filterSpacer.remove();
            }
        });
    }
    $(window).scroll(function() {
        if($(this).scrollTop()>200){
            $(".back-to-top").fadeIn(200);
        }else{
            $(".back-to-top").fadeOut(200);
        }
    });
    $('.back-to-top').click(function(event) {
        event.preventDefault();  
        $('html, body').animate({scrollTop: 0}, 200);
    });
});