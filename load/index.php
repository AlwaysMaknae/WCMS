<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>jQ Loader and parser Test</title>
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/ents.js" ></script>
  <script src="js/App.js" ></script>

  <style media="screen">
    #app input{
      display: inline-block;
    }
    #app button{
    /* float: left; */
      vertical-align: top;
    }

  </style>

</head>
<body>
  <div class="buttonSelector">
    <button type="button" class="add" id="p" >Add Paragraph</button>
    <button type="button" class="add" id="h2">Add Main Title</button>
    <button type="button" class="add" id="h3">Add Small Title</button>
    <button type="button" class="add" id="a">Add link</button>
  </div>
  <div id="app" ></div>

</body>
</html>
