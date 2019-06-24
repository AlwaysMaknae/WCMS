var PublicApp;

  $(function(){
    PublicApp = new UploadsApp();
  });


  function UploadsApp(
    App = {
      FormSelector:"#UploadForm",
      OutputSelector:"#output",
      SubmitSelector:"#UploadSubmit",
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
              console.log( data );
            }
          });
        } else {
          $(App.OutputSelector).html( "All fields are Required" );
        }


        var fData = new FormData(this);
      });


  }
