

$(function(){

  //$("#deleteAlert").parent().hide();
  $("#alertClose").click(function(){
    $(this).parent().fadeOut();
  });

  $(".delete").each(function(e){
    $(this).click(function(e){
      var page = $(this).attr("name").split("-")[1];

      var dd = confirm("Are you shure you want to delete page #" + page + " ? \n This can not be undone.");
      if(dd){
        $.get( "adminAjax.php?Delete=" + page , function( data, status ) {
          $("#deleteAlert").html("Succesfully deleted page #" + page);
        });

        $("#deleteAlert").parent().fadeIn();
        $(this).parent().fadeOut();
      }
    });
  });

});
