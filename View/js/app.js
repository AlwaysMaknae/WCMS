
var PublicApp;

  $(function(){
    PublicApp = new App();
  });



function App( App = {
  contentSelector:"#app",
  buttonSelector:".add",
  submitSelector:".submit",
  titleSelector:"#pageTitle"
  }){

  var Ents = { p:"Paragraph", h2:"MainTitle", h3:"SmallTitle", a:"Paragraph", hr:"HorizontalRule" };
  var EntsI = { p:"ParagraphInput", h2:"MainTitleInput",
  h3:"SmallTitleInput", a:"LinkInput", hr:"HorizontalRuleInput" };
  var appPage = new Page( App.contentSelector ,[]);


  var Sortable = $( App.contentSelector ).sortable({
    cancel: ".fixed, textarea, input"
  });
  $( App.contentSelector ).disableSelection();


// Adding Btns
  $( App.buttonSelector ).each(function(e){
     var newEntity = $(this).attr("name");
     $(this).click( function(){
       var pageEl = new window[ EntsI[newEntity] ]();
       appPage.add( pageEl );
     });
  });


//Submit buttons
  $( App.submitSelector ).each(function(e){
    $(this).click( function(){
     var action = $(this).attr("name");
     //console.log(action);
     if(action == "Save"){
       var htmlParsed = appPage.parse();
       $("#input").html(htmlParsed);
     } else if(action == "Preview"){
       var htmlParsed = appPage.parse();
       $("#input").html(htmlParsed);
     }
    });
  });



  this.loadStuff = function(data){
    appPage.empty();
    var pageEl = new window[ EntsI.p ]( data.content );
    appPage.add( pageEl );
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
      var deleteBtn = new DeleteHandle().getElement();
      $(wrap).append( deleteBtn );
      $(wrap).append( el.getElement() );

      $(deleteBtn).click( function(e){
           $(this).parent().remove();
      });

      this.app.append( wrap );
  }

  this.empty = function(){
    this.elements = [];
    $( this.app ).empty();
  }


  this.parse = function(){
    var input = $(app + " input, " + app + " textarea");
    var page = "";

    var ei = "";
    var boxi = "";
    input.each(function(e){
      boxi = $(this).attr("class").split("-")[1];
      if( boxi == "hr"){
        page += "<" +boxi+ " />";
      } else if (boxi == "a") {
        page += "<" +boxi+ " href='" +$(this).next().val() + "' target='_blank' >" + $(this).val() + "</" +boxi+ ">";
      } else if( boxi == "href"){
        // nothing ? lel
      } else {
        page += "<" +boxi+ ">" + $(this).val() + "</" +boxi+ ">";
      }
    });

    console.log(page);
    return page;


  }


  this.display();

}
