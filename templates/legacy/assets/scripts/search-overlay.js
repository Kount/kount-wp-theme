// Use $ instead of jQuery without replacing global $
(function ($) {

  $(function () {
    $(".search-btn").on("click", function (e) {
      var str = $(this).parent().find('.search-input').val();
      window.location.href = "https://www.kount.com/search?term=" + str;
      return false;
    });

    /* Search overlay functionality */
    $('header .search').click(function (e) {
      e.stopPropagation();
      $('header .search-outer').addClass('active');
      setTimeout(function () {
        $(".search-input").focus();
      }, 50);

    });

    $('header .search-outer .close').click(function () {
      $('header .search-outer').removeClass('active');
      $(".search-input").val('');
    });

  });
})(jQuery);