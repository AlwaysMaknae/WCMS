
var PublicApp;
$(function(){
 PublicApp = new App();
});



function App(App = {contentSelector:"#app", buttonSelector:".add"}){

  var Ents = { p:"Paragraph", h2:"MainTitle", h3:"SmallTitle", a:"Paragraph" };
  var EntsI = { p:"ParagraphInput", h2:"MainTitleInput", h3:"SmallTitleInput", a:"ParagraphInput" };
  var appPage = new Page( App.contentSelector ,[]);


  var Sortable = $( App.contentSelector ).sortable({
    cancel: ".fixed, textarea, input"
  });
  $( App.contentSelector ).disableSelection();


  $( App.buttonSelector ).each(function(e){
     var newEntity = $(this).attr("name");
     $(this).click( function(){
       var pageEl = new window[ EntsI[newEntity] ]();
       appPage.add( pageEl );
     });
  });



  this.loadStuff = function(data){
    var pageEl = new window[ EntsI.p ]( data );
    appPage.add( pageEl );


    $( ".delete" ).each(function(e){
      $(this).click( function(e){
         $(this).parent().remove();
      });
   });
  }

}

function Page(app, elements = []){

  this.app = $(app);
  this.elements = elements;

  this.display = function(){
    this.elements.forEach(function(el){
      this.app.append( el.getElement() );
    });
  }

  this.add = function(el){
      this.elements.push(el);
      var wrap = document.createElement( "div" );
      $(wrap).append( new Handle().getElement() );
      $(wrap).append( el.getElement() );
      $(wrap).append( new DeleteHandle().getElement() );

      this.app.append( wrap );
  }


  this.display();

}
