$(function(){

  $("#PagesSelect").change(function(e){
    var pageId = $("#PagesSelect option:selected").val();
    $.get( "adminAjax.php?Page=" + pageId , function( data ) {

      if(data != "false"){
        var content = JSON.parse(data);
        //$( "#debug" ).append( data );
        //console.log(data);
        PublicApp.loadStuff({
          content: content["content"],
          title: content["title"]
        });
      }
    });
  });


});
function saveAJ(Content = {
  content: "empty",
  title: "empty"
}){
  //console.log(Content);
  Content.id = $("#PagesSelect option:selected").val();
  $.post( "adminAjax.php?Save=", Content , function(data){
    $("#input").html(data);
  });
}
