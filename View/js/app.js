
var PublicApp;

  $(function(){
    PublicApp = new App();
  });



function App( App = {
  contentSelector:"#app",
  buttonSelector:".add",
  submitSelector:".submit",
  titleSelector:"#pageTitle",
  selectImageSelector:"#imgSelect"
  }){

  var Ents = { p:"Paragraph", h2:"MainTitle", h3:"SmallTitle", a:"Paragraph", hr:"HorizontalRule" };
  var EntsI = { p:"ParagraphInput", h2:"MainTitleInput",
  h3:"SmallTitleInput", a:"LinkInput", hr:"HorizontalRuleInput", img:"ImageInput" };
  var appPage = new Page( App.contentSelector ,[]);


  var Sortable = $( App.contentSelector ).sortable({
    cancel: ".fixed, textarea, input"
  });
  $( App.contentSelector ).disableSelection();


// Adding Btns
  $( App.buttonSelector ).each(function(e){
     var newEntity = $(this).attr("name");
     var pageEl = null;
     $(this).click( function(){
       if( newEntity == "img"){
         var alt = $(App.selectImageSelector + " option:selected")[0];
         alt = $(alt).html();
         pageEl  = new window[ EntsI[newEntity] ]( $(App.selectImageSelector).val(), alt  );
         appPage.add( pageEl );
       } else {
         pageEl = new window[ EntsI[newEntity] ]();
         appPage.add( pageEl );
       }

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

       saveAJ({content:htmlParsed,
         title:$(App.titleSelector).val()
       });

     } else if(action == "Preview"){
       var htmlParsed = appPage.parse();
       var title = "<h2>" + $(App.titleSelector).val() + "</h2>";
       $("#input").html(title+htmlParsed);
     }
    });
  });



  this.loadStuff = function(data){

    appPage.empty();
    var ins = $.parseHTML(data.content, false);

    var pageEl="";
    var tag = "";
    var link = "";

      for (var el =0;  el <= ins.length ; el++) {
        pageEl = $(ins[el])[0];

        if( pageEl != undefined ){
          tag = EntsI[ pageEl.tagName.toLowerCase() ];

          if(tag == EntsI.img){
            console.log( $(pageEl).attr("src") );
            console.log( $(pageEl).attr("alt") );
            pageEl = new window[ tag ]( $(pageEl).attr("src"), $(pageEl).attr("alt") );
            console.log(pageEl);
          } else if( $(pageEl).attr("href") ){
            link = $(pageEl).attr("href");
            pageEl = new window[ tag ]( pageEl.innerHTML, link );
          } else {
            pageEl = new window[ tag ]( pageEl.innerHTML, link );
          }

          appPage.add( pageEl );
        }
      }
    $(App.titleSelector).val( data.title );
    $(App.titleSelector).removeAttr("disabled");
    $("#input").html(appPage.parse());
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
    var input = $(app + " input, " + app + " textarea, "+ app + " .targetbox-img");
    var page = "";

    var ei = "";
    var boxi = "";
    input.each(function(e){
      boxi = $(this).attr("class").split("-")[1];
      if( boxi == "hr"){
        page += "<" +boxi+ " />";
      } else if (boxi == "a") {
        page += "<" +boxi+ " href='" +$(this).next().val() + "' target='_blank' >" + $(this).val() + "</" +boxi+ ">";
      } else if( boxi == "img"){
        page += $(this).html();
      } else if( boxi == "href"){
        // nothing ? lel
      } else {
        page += "<" +boxi+ ">" + $(this).val() + "</" +boxi+ ">";
      }
    });

    return page;


  }


  this.display();

}
