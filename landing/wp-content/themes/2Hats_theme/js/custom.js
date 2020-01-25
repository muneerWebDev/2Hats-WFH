$(document).ready(function () {

  //Navbar dropdown default bootstrap class
  $("#menu-main-menu .menu-item").each(function () {
    if ($(this).hasClass("menu-item-has-children")) {
      $(this).addClass("dropdown").find("> a.nav-link").addClass("dropdown-toggle");
      $(this).find(".sub-menu").addClass("dropdown-menu").find("a").addClass("dropdown-item");
    }

  });

  if ($('#wpadminbar').length) {
    $('body').addClass("wp_logged_in");
  }

  /****************** */

  //Navbar change on scroll

  if ($(window).scrollTop() > 30)
    $("header").removeClass("at_top");
  else
    $("header").addClass("at_top");

  $(window).scroll(function () {

    if ($(window).scrollTop() > 30)
      $("header").removeClass("at_top");
    else
      $("header").addClass("at_top");

  });

  //smooth scroll

  $(".navbar-nav li a,.scroll").on('click', function (e) {

    var full_url = this.href;
    var parts = full_url.split("#");
    var trgt = parts[1];
    var target_offset = $("#" + trgt).offset();
    var target_top = target_offset.top;

    $('html,body').animate({
      scrollTop: target_top - 60
    }, 1000);

    return false;
  });

  /* sliders */
  $(".main_banner .wrapper").slick({
    arrows: false,
    dots: true,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 2500,
    speed: 1000
  });
  $(".contact .wpforms-submit").addClass("btn btn-primary_inverse");


  new WOW().init();
});