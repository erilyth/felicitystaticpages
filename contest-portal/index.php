<!DOCTYPE html>
<html>
    <head>
        <title>Basic</title>
        <script src="https://cdn.rawgit.com/visionmedia/page.js/master/page.js"></script>    
        <script src="https://raw.githubusercontent.com/janl/mustache.js/master/mustache.js"></script>     
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>     
        <base href="/contestportal/" >
        <script></script>
    </head>
    <body>
        <h1>Basic</h1>
        <p></p>
        <div id='person'></div>
        <ul>
            <li><a href="./">Home</a></li>
            <li><a href="./scoreboard">Scoreboard</a></li>
            <li><a href="./problems">Problems</a></li>
        </ul>
        <div id="problems" style="display:none">
            <a href="./problem/1">Problem 1</a>
            <a href="./problem/2">Problem 2</a>
        </div>
        <div id="displayContent">
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
                var view = {
                    message : "Welcome!"
                };
                var template = document.getElementById('welcomeTemplate').innerHTML;
                var output = Mustache.render(template, view);
                document.getElementById('displayContent').innerHTML=output;
            }
            function scoreboard() {
                var view = {
                    data : "Scoreboard :)"  
                };
                var template = document.getElementById('scoreboardTemplate').innerHTML;
                var output = Mustache.render(template, view);
                document.getElementById('displayContent').innerHTML=output;
            }
            function problems() {
                var problems = [{name:'prob 1',level:'level 1'},{name:'prob 2', level:'level 2'}];
                document.getElementById('displayContent').innerHTML="";
                for(var i=0;i<problems.length;i++){
                    var view = {
                        data : problems[i].name
                    }
                    var template = document.getElementById('problemsViewTemplate').innerHTML;
                    var output = Mustache.render(template, view);
                    document.getElementById('displayContent').innerHTML+=output+"<hr />";
                }
            }
            
            function problem(ctx) {
              loadproblem(2);
            }
            
            function loadproblem(problem_no){
                var view = {
                    name : "Problem 1",
                    problemNo : problem_no
                };
                var template = document.getElementById('problemTemplate').innerHTML;
                var output = Mustache.render(template, view);
                document.getElementById('displayContent').innerHTML=output;
            }
        </script>
        <script type="text/plain" id="welcomeTemplate">
            {{message}} 
        </script>
        <script type="text/plain" id="scoreboardTemplate">
            {{data}}
        </script>
        <script type="text/plain" id="problemsViewTemplate">
            {{data}}
        </script>
        <script type="text/plain" id="problemTemplate">
            {{name}} hi {{problemNo}}
        </script>
        
    </body>
</html>
