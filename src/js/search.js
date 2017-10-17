// jquery price range slider
$("#priceRangeBeer").slider();
$("#priceRangeBeer").on("slide", function(slideEvt) {
  $("#priceRangeBeerValue").text(slideEvt.value);
});

$("#priceRangeBooze").slider();
$("#priceRangeBooze").on("slide", function(slideEvt) {
  $("#priceRangeBoozeValue").text(slideEvt.value);
})
