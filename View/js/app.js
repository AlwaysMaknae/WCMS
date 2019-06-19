
var PublicApp;
$(function(){
 PublicApp = new App();

});



function App(App = {contentSelector:"#app", buttonSelector:".add"}){

  var Ents = { p:"Paragraph", h2:"MainTitle", h3:"SmallTitle", a:"Paragraph" };
  var EntsI = { p:"ParagraphInput", h2:"MainTitleInput", h3:"SmallTitleInput", a:"ParagraphInput" };
  this.greet = new MainTitle("Hello");
  var appPage = new Page( App.contentSelector ,[this.greet]);

  //appPage.add( new SmallTitle("So Schmoll") );
  appPage.add( new SmallTitleInput("My Titlle is good") );
  appPage.add( new ParagraphInput() );
  appPage.add( new MainTitleInput("This one is too") );


  var Sortable = $( App.contentSelector ).sortable({
    cancel: ".fixed, textarea, input"
  });
  $( App.contentSelector ).disableSelection();

  console.log(Sortable);


  $( App.buttonSelector ).each(function(e){
     var newEntity = $(this).attr("id");
     $(this).click( function(){
       var pageEl = new window[ EntsI[newEntity] ]();
       appPage.add( pageEl );
     })
  });

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


      this.app.append( wrap );
  }


  this.display();

}
