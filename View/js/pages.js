var PublicApp;

  $(function(){
    PublicApp = new Pages();
  });


function Pages( App = {
  FormSelector:".add",
  TitleInputSelector:"#PageTitle",
  AddBtnSelector:"#AddPageButton",
  OutPutSelector:"#PageSaveOutput"
}){

  this.App = App;

  var title = $(App.TitleInputSelector).val();
  $(App.AddBtnSelector).click(function(e){
    title = $(App.TitleInputSelector).val();
    if(title == ""){
      $(App.OutPutSelector).html("Title can't be empty");
    } else {
      var result = PublicApp.addPageAJ(title, App.OutPutSelector);
      
    }

  });




}
