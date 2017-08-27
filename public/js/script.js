$(document).ready(function() {
    var filter = $('.navbar');
    var filterSpacer = $('<div />', {
      "class": "vnkings-spacer",
      "height": filter.outerHeight()
    });
    if(filter.length)
    {
      $(window).scroll(function ()
      {
        if(!filter.hasClass('fix') && $(window).scrollTop() > filter.offset().top){
          filter.before(filterSpacer);
          filter.addClass("fix");
        }
        else if(filter.hasClass('fix')  && $(window).scrollTop() < filterSpacer.offset().top){
          filter.removeClass("fix");
          filterSpacer.remove();
        }
      });
    }
  function loadDropDown() {
    $.get("controllers/danhmuc-controller.php?action=xem",
      function (data,status) {
        var menu;
        for(i in data){
           menu+='<li><a href="index.php?action=chitietloaimonan&id="'
          +data[i].id_loai+ '">'+data[i].tenloai+'</a></li>';
        }
        $(".dropdown-menu").first().html(menu);     
    });
  }
});