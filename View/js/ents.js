

var EntList = ["Paragraph", "Maintitle", "SmallTitle", "Link"];


function Paragraph(content){
  Object.assign(this, new Ent("p", content) );
}

function MainTitle(content){
  //$.extend(this, new Ent("h2", content) );
   Object.assign(this, new Ent("h2", content) );
}

function SmallTitle(content){
  Object.assign(this, new Ent("h3", content) );
}

function HorizontalRule(){
  var b = document.createElement("hr");
  this.b = b;
  this.getElement = function(){
    return b;
  }
}

function Handle(content = "↕"){
  Object.assign(this, new Ent("button", content) );
}

function DeleteHandle(content = "X"){
  Object.assign(this, new Ent("button", content) );
  $(this.getElement()).attr("class", "delete");
}



function ParagraphInput(content=""){
  Object.assign(this, new AreaInputEnt("p", content, "Paragraph") );
}

function MainTitleInput(content=""){
  //$.extend(this, new Ent("h2", content) );
   Object.assign(this, new InputEnt("h2", content, "Main Title (h2) ") );
}

function SmallTitleInput(content=""){
  Object.assign(this, new InputEnt("h3", content, "Small Title (h3) ") );
}

function HorizontalRuleInput(content=""){
  Object.assign(this, new InputEnt("hr", content, "Small Title (h3) ") );
  $(this.getElement()).attr("disabled" , true);
  $(this.getElement()).attr("value", "Horizontal Rule");
}

function DivEditInput(content=""){
  Object.assign(this, new EditDivInput(content) );
}


function ImageInput(src = "", alt = ""){
  //box, content="", placeholder=""
  var box = document.createElement( "img" );
  $(box).attr("src", src);
  $(box).attr("alt", alt);


  var b = document.createElement( "div" );
    $(b).attr("class", "targetbox-img");
    $(b).append( box );
  this.getElement = function(){
    return b;
  }
}

function LinkInput(content = "", link = ""){
  //box, content="", placeholder=""
  var displayText = new InputEnt("a", content, "Display Text").getElement();
  var link = new InputEnt("href", link, "Link").getElement();


  var b = document.createElement( "div" );
    $(b).attr("class", "targetbox-a");
    $(b).append( displayText );
    $(b).append( link );
  this.getElement = function(){
    return b;
  }
}

function Ent(box, content){
  this.box = box;
  this.meta = "<"+ box +">";
  this.content = content;
  this.closingMeta = "</" +box +">";

  var b = document.createElement( this.box );
  var bt = document.createTextNode( this.content );
  b.appendChild( bt );

  this.getElement = function(){
    return b;
  }
}

function AreaInputEnt(box, content="", placeholder=""){
  this.box = "textarea";
  this.meta = "<textarea "+ box +">";
  this.content = content;
  this.closingMeta = "</textarea>";

  var b = document.createElement( this.box );
      $(b).attr("placeholder", placeholder);
      $(b).attr("class", "targetbox-" + box);
      //$(b).attr("value", this.content);
      $(b).append( this.content );

  this.getElement = function(){
    return b;
  }
}



function InputEnt(box, content="", placeholder=""){
  this.box = "input";
  this.meta = "<input type=text>";
  this.content = content;
  this.closingMeta = "</input>";

  var b = document.createElement( this.box );
      $(b).attr("type", "text");
      $(b).attr("class", "targetbox-" + box);
      $(b).attr("placeholder", placeholder);
      $(b).attr("value", this.content);
      $(b).append( this.content );

  this.getElement = function(){
    return b;
  }
}
