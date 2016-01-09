<!DOCTYPE html>
<html>
  <head>
    <title>Basic</title>
    <script src="https://cdn.rawgit.com/visionmedia/page.js/master/page.js"></script>    
    <script src="https://raw.githubusercontent.com/janl/mustache.js/master/mustache.js"></script>     
    <base href="/contestportal/" >
    <script>
    </script>
  </head>
  <body>
    <?php
        $html = '';
        $html .= '<input id="url" style="display:none" value="' . explode('/',$_SERVER['REQUEST_URI'])[3] . '"/>';
        echo $html;
    ?>
    <h1>Basic</h1>
    <p></p>
    <div id='person'></div>
    <ul>
      <li><a href="./">/</a></li>
      <li><a href="#whoop">#whoop</a></li>
      <li><a href="./scoreboard">/scoreboard</a></li>
      <li><a href="./problems">/problems</a></li>
      <li><a href="./not-found?foo=bar">/not-found</a></li>
    </ul>
    
    <div id="problems" style="display:none">
        <a href="./problem/1">Problem 1</a>
        <a href="./problem/2">Problem 2</a>
    </div>

    <div id="problem">
    </div>

    <script>
      // the "notfound" implements a catch-all
      // with page('*', notfound). Here we have
      // no catch-all, so page.js will redirect
      // to the location of paths which do not
      // match any of the following routes
      //
      page.base('/contestportal');
      page('/', index);
      page('/scoreboard', scoreboard);
      page('/problems', problems);
      page('/problem/:problemNo', problem);
      page();
      function index() {
        document.getElementById('problem').style.display="none";
        document.getElementById('problems').style.display="none";
        document.querySelector('p')
          .textContent = 'viewing index';
      }
      function scoreboard() {
        document.getElementById('problem').style.display="none";
        document.getElementById('problems').style.display="none";
        document.querySelector('p')
          .textContent = 'viewing scoreboard';
      }
      function problems() {
        document.getElementById('problem').style.display="none";
        document.getElementById('problems').style.display="block";
      }
   
      function problem(ctx) {
        document.getElementById('problems').style.display="none";
        loadtemp();
      }
        function loadtemp(){
            var view = {
                name : "Problem 1",
                problemNo : "1"
            };
            var output = Mustache.render("Problem {{problemNo}} is {{name}}", view);
            document.getElementById('problem').style.display="block";
            document.getElementById('problem').innerHTML = output;
        }
    </script>
  </body>
</html>
