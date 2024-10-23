jQuery(document).ready(function ($) {
  $(".lpcd_copy_icons").on("click", function () {
    var shortcodetext = $(this).siblings(".lpcd_shortcode").find("h6").text();
    var lpcd_copyicon = $(this).find(".lpcd_copyicon");
    var lpcd_copyiedicon = $(this).find(".lpcd_copyiedicon");
    navigator.clipboard.writeText(shortcodetext);
    lpcd_copyicon.addClass("lpcd_hide_it");
    lpcd_copyiedicon.removeClass("lpcd_hide_it");
    setTimeout(function () {
      lpcd_copyicon.removeClass("lpcd_hide_it");
      lpcd_copyiedicon.addClass("lpcd_hide_it");
      console.log(lpcd_copyicon);
    }, 5000);
  });
});
