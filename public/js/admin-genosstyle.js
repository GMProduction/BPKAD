$(".nav-button").click(function () {
  if ($(".admin").hasClass("minimize")) {
    $(".admin").removeClass("minimize");
  } else {
    $(".admin").addClass("minimize");
  }
});

$(".tooltip").hover(
  function () {
    $(this).addClass("hovering");
  },
  function () {
    $(this).removeClass("hovering");
  }
);

$(".menu.multiple").click(function () {
  if ($(".menu.multiple .iconbtn").is(":contains('arrow_drop_down')")) {
    $(".menu.multiple .iconbtn").html("arrow_drop_up");
  } else {
    $(".menu.multiple .iconbtn").html("arrow_drop_down");
  }
});
