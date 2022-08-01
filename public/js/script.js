$(function () { //①
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);

      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});


$(function () {
  $('.mainMenu p').on('click', function () {
     $('.mainMenu p span').toggleClass("active");
    $('.menu').slideToggle();

  });


});
