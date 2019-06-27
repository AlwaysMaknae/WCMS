

$(function(){

  //$("#deleteAlert").parent().hide();
  $("#alertClose").click(function(){
    $(this).parent().fadeOut();
  });

  $(".delete").each(function(e){
    $(this).click(function(e){
      var thisName = $(this).attr("name");
      var page = $(this).attr("name").split("-")[1];

      var dd = confirm("Are you shure you want to delete page #" + page + " ? \n This can not be undone.");
      if(dd){
        $.get( "adminAjax.php?Delete=" + page , function( data ) {
          //$("#deleteAlert").html("Succesfully deleted page #" + page);
          $("#deleteAlert").html(data);
          if(data != "Denied"){
            $("button[name=" + thisName + "]").parent().fadeOut();
          }
        });

        $("#deleteAlert").parent().fadeIn();

      }
    });
  });

});
