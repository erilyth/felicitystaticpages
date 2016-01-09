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
                var userList = [{name:'user 1',score:'score 1'},{name:'user 2',score:'score 2'}];
                document.getElementById('displayContent').innerHTML="";
                    for(var i=0;i<userList.length;i++){
                    var view = {
                        name : userList[i].name,
                        score : userList[i].score
                    };
                    var template = document.getElementById('scoreboardTemplate').innerHTML;
                    var output = Mustache.render(template, view);
                    document.getElementById('displayContent').innerHTML+=output+"<hr />";
                }
            }
            function problems() {
                var problems = [{id:1,name:'prob 1',level:'level 1'},{id:2,name:'prob 2', level:'level 2'}];
                document.getElementById('displayContent').innerHTML="";
                for(var i=0;i<problems.length;i++){
                    var view = {
                        id : problems[i].id,
                        link : "./problem/"+problems[i].id,
                        name : problems[i].name,
                        level : problems[i].level
                    }
                    var template = document.getElementById('problemsViewTemplate').innerHTML;
                    var output = Mustache.render(template, view);
                    document.getElementById('displayContent').innerHTML+=output+"<hr />";
                }
            }
            
            function problem(ctx) {
                loadproblem(ctx.params.problemNo || '');
            }
            
            function loadproblem(problem_no){
                var view = {
                    name : "Problem 1",
                    id : problem_no,
                    level : 1
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
            {{name}} scored {{score}}
        </script>
        <script type="text/plain" id="problemsViewTemplate">
            <a href={{link}}>{{id}} problem name is {{name}} and level is {{level}}</a>
        </script>
        <script type="text/plain" id="problemTemplate">
            {{name}} hi {{id}} and {{level}}
        </script>
        
    </body>
</html>
