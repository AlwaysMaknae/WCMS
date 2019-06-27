var PublicApp;

  $(function(){
    PublicApp = new UploadsApp();
  });


  function UploadsApp(
    App = {
      FormSelector:"#UploadForm",
      OutputSelector:"#output",
      SubmitSelector:"#UploadSubmit",
      CardOutputSelector:"#CardOutput",
      ContentSelectors : {
        File : "input[name=file]",
        Title : "input[name=title]",
        Alt : "input[name=alt]",
      }
    }) {
      $(App.FormSelector).on("submit", function(e){
        e.preventDefault();

        var emptyTitle = $(App.ContentSelectors.Title).val() == "";
        var emptyAlt = $(App.ContentSelectors.Alt).val() == "";
        var emptyFile = $(App.ContentSelectors.File).get(0).files.length === 0;
        if( !emptyTitle &&
          !emptyAlt &&
          !emptyFile
        ){
          $.ajax({
            url: "adminAjax.php?Upload",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(data){
              console.log(data);
              if(data == "Denied"){
                $(App.OutputSelector).html(data);
              } else {

                var res = JSON.parse(data);
                if( !res.error ){
                  newUploadCard(App.CardOutputSelector , res);
                  var succesMsg = res.title + " was uploaded succesfully." ;
                  $(App.OutputSelector).html(succesMsg);
                } else {
                  $(App.OutputSelector).html(res.message);
                }

              }
            }
          });
        } else {
          $(App.OutputSelector).html( "All fields are Required" );
        }
      });

      var cardTemplate = $("#CardTemplate").hide();

      function newUploadCard( OutPutSelector, UploadInfo ){
        var cardHtml = $(cardTemplate[0]).clone();
          $(cardHtml).find("#CardFile").attr("src", UploadInfo.file );
          $(cardHtml).find("#CardFile").attr("alt", UploadInfo.alt );

          $(cardHtml).find("#CardTitle").html("New Upload : "+ UploadInfo.title );
          $(cardHtml).find("#CardAlt").html( UploadInfo.alt );

          $(cardHtml).fadeIn();
          //("style", "width:18rem;");
      $(OutPutSelector).prepend(cardHtml);

      }


  }
