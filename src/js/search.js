// jquery price range slider
$("#priceRangeBeer").slider();
$("#priceRangeBeer").on("slide", function(slideEvt) {
  $("#priceRangeBeerValue").text(slideEvt.value);
});

$("#priceRangeBooze").slider();
$("#priceRangeBooze").on("slide", function(slideEvt) {
  $("#priceRangeBoozeValue").text(slideEvt.value);
});

function leftSlide(tab){
   $(tab).addClass('animated slideInLeft');
}

function rightSlide(tab){
   $(tab).addClass('animated slideInRight');   
}

$('li[data-toggle="tab"]').on('shown.bs.tab', function (e) {  
    var url = new String(e.target);
    var pieces = url.split('#');
    var seq=$(this).children('a').attr('data-seq');
    var tab=$(this).children('a').attr('href');
    if (pieces[1] == "booze"){       
      leftSlide(tab);        
    }
})

