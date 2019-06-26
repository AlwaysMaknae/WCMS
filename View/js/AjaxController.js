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

  PublicApp.addPageAJ = function(title, OutPutSelector){
    if(title == ""){
      return false;
    } else {
      $.get( "adminAjax.php?Add=" + title , function( data, status ) {
        $(OutPutSelector).html(data);
      });
      return true;
    }
  }

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

function uploadAJ( Content = {} ){
  console.log(Content);
}
