$(document).ready(function() {
  // Modal
  $('#openModal').click(function() {
    $('.modal').css("display", "block");
  })

  $('span.close').click(function() {
    $('.modal').css("display", "none");
  })

  $(window).click(function(event) {
    var target = $(event.target);
    if (target.is('.modal')) {
      $('.modal').css("display", "none");
    }
  })

  // Preloader
  $(window).on('load', function() { // makes sure the whole site is loaded
  $('#status').fadeOut(); // will first fade out the loading animation
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
  })

  //Show and Hide Password
  $('#showHide').click(function() {
    if ($('.password').attr("type") == "password") {
      $('.password').attr("type", "text");
      $('#icon').removeClass('fa fa-eye');

      $('#icon').addClass('fa fa-eye-slash');
      $('#icon').css("color", "#2196f3");
    }
    else {
      $('.password').attr("type", "password");
      $('#icon').removeClass('fa fa-eye-slash');

      $('#icon').addClass('fa fa-eye');
      $('#icon').css("color", "black");
    }
  })

  //fullPage
  $('#fullpage').fullpage({
    fixedElements: '#cari',
    scrollBar:true,
    // normalScrollElements: '#normal',
    fitToSection: false,
    autoScrolling: false
    // scrollOverflow: true,
    // scrollHorizontally: true

  });

  //svg
  var items = $("#hex"),
      tl = new TimelineMax();

  TweenLite.set("svg", {visibility:"visible"})

  tl.from(items, 1, {drawSVG:0})

  .from(items, 0.2, {fill:"none"}, "end")
  .to(items, 0.2, {stokeWidth:0}, "end")

  //super slow-mo
  tl.timeScale(0.5)
  $(window).scroll(function(){
      var ypos = $(this).scrollTop();
      console.log('Scroll detected!  Window scroll top: ' + ypos);
      if (ypos > 567 && ypos <= 950) {
        $('.navbar-custom-user').css("background", "linear-gradient(18deg , #000 70%,#1d1d1d 0, #1d1d1d 85%, #333333 20%)");
        $('.navbar-default .navbar-collapse').css("background", "transparent");
        $('#cari').css({"right":"50%", "transform":"translateX(50%)"});
      }
      else if (ypos > 950) {
        $('#cari').css({"right":"0%", "transform":"translateX(-50%)"});
      }
      else {
        $('.navbar-custom-user').css("background", "linear-gradient(to right, rgb(251, 194, 25), rgb(246, 206, 24), rgb(242, 217, 24))");
        $('.navbar-default .navbar-collapse').css("background", "linear-gradient(to right, rgb(251, 194, 25), rgb(246, 206, 24), rgb(242, 217, 24))");
      }
  });

})
// btn.onclick = function() {
//     modal.style.display = "block";
// }
//
// span.onclick = function() {
//   modal.style.display = "none";
// }
//
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }
