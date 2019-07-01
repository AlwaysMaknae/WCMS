$(function(){

  var galleryImages = $("#Gallery img");
  console.log(galleryImages);

  var current = 0;

  var modal = $(".gallery-modal");
//$(modal).fadeOut();

  $("#GalleryClose").click(function(){
    $(this).parent().fadeOut();
  });

  var ff = "";
  $(galleryImages).each(function(e){
    current = this;
    $(this).click(function(e){
      ff = $(this).attr("src");

      $(modal).html("<img src='" + ff + "' alt='GalleryImage' />");
      $(modal).parent().fadeIn();
    });
  });

});
