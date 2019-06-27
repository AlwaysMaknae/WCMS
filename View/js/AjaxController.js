$(function(){

  $("#PageListTemplate").hide();

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

  $("#Refresh").click(function(e){
    addPageToList();
  });

  PublicApp.addPageAJ = function(title, OutPutSelector){
    if(title == ""){
      return false;
    } else {
      $.get( "adminAjax.php?Add=" + title , function( data, status ) {
        $(OutPutSelector).html(data);
        addPageToList(data);
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

function addPageToList(name){

  var liTem = $("#PageListTemplate").clone();
  $(liTem).prepend(name);
  $(liTem).fadeIn();
  $("#PagesList").append( liTem );

}

function uploadAJ( Content = {} ){
  console.log(Content);
}
