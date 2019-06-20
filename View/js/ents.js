

var EntList = ["Paragraph", "Maintitle", "SmallTitle"];


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

function Handle(content = "■"){
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
      $(b).attr("value", this.content);
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
