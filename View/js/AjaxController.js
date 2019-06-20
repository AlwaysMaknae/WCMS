$(function(){

  $("#PagesSelect").change(function(e){
    var pageId = $("#PagesSelect option:selected").val();

    $.get( "adminAjax.php?Page=" + pageId , function( data ) {

      if(data != "false"){
        var content = JSON.parse(data);
        $( "#input" ).html( content["content"] );
      }

      PublicApp.loadStuff( content["content"]  );

    });
  });

});
