<!DOCTYPE html>
<html>
    <head>
        <title>Basic</title>
        <script src="https://cdn.rawgit.com/visionmedia/page.js/master/page.js"></script>    
        <script src="https://raw.githubusercontent.com/janl/mustache.js/master/mustache.js"></script>     
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>     
        <base href="/portal/">
    </head>
    <body>
        <h1>Basic</h1>
        <p></p>
        <ul>
            <li><a href="./">Home</a></li>
            <li><a href="./scoreboard">Scoreboard</a></li>
            <li><a href="./problems">Problems</a></li>
        </ul>
        <div id="displayContent">
        </div>
        <script>
            // the "notfound" implements a catch-all
            // with page('*', notfound). Here we have
            // no catch-all, so page.js will redirect
            // to the location of paths which do not
            // match any of the following routes
            //
            page.base('/portal');
            page('/', index);
            page('/scoreboard', scoreboard);
            page('/problems', problems);
            page('/problem/:problemNo', problem);
            page();

            function locationHashChanged() {
                page(location.hash);
            }

            window.onhashchange = locationHashChanged;

            function index() {
                var view = {
                    message : "Welcome!"
                };
                var template = document.getElementById('welcomeTemplate').innerHTML;
                var output = Mustache.render(template, view);
                document.getElementById('displayContent').innerHTML=output;
            }
            function scoreboard() {
                var obj;
                /*$.ajax({
                        type: 'GET',
                        url: 'http://10.42.0.59/con/api/problems/?format=json',
                        dataType: 'json'
                    }).done(function(data) {
                        obj=data;
                        console.log('hi');
            });*/
                obj={"user_nick":"feli","problem_data":[{"question_list":[{"status":"Not Attempted","question_title":"1->1","question_number":1}],"question_level":1}]};
                document.getElementById('displayContent').innerHTML="";
                for(var i=0;i<obj.length;i++){
                    var view = {
                        name : obj[i]['user_nick'],
                        score : obj[i]['user_score']
                    };
                    var template = document.getElementById('scoreboardTemplate').innerHTML;
                    var output = Mustache.render(template, view);
                    document.getElementById('displayContent').innerHTML+=output+"<hr />";
                }
            }
            function problems() {
                var obj;
                /*$.ajax({
                        type: 'GET',
                        url: 'http://10.42.0.59/con/api/problems/?format=json',
                        dataType: 'json'
                    }).done(function(data) {
                        obj=data;
            });*/
                obj={"user_nick":"feli","problem_data":[{"question_list":[{"status":"Not Attempted","question_title":"1->1","question_number":1}],"question_level":1}]};
                var data = obj['problem_data'];
                document.getElementById('displayContent').innerHTML="";
                for(var j=0;j<data.length;j++){
                    var problems = data[j]['question_list'];
                    for(var i=0;i<problems.length;i++){
                        var view = {
                            question_status : problems[i]['status'],
                            title : problems[i]['question_title'],
                            question_number : problems[i]['question_number'],
                            link : "./problem/"+data[j]['question_level']+"/"+problems[i]['question_number'],
                            level : data[j]['question_level']
                        }
                        var template = document.getElementById('problemsViewTemplate').innerHTML;
                        var output = Mustache.render(template, view);
                        document.getElementById('displayContent').innerHTML+=output+"<hr />";
                    }
                }
            }
            
            function problem(ctx) {
                loadproblem(ctx.params.problemNo || '');
            }
            
            function loadproblem(problem_no){
                var obj;
                /*$.ajax({
                        type: 'GET',
                        url: 'http://10.42.0.59/con/api/problems/?format=json',
                        dataType: 'json'
                    }).done(function(data) {
                        obj=data;
            });*/
                obj={"user_nick":"feli","question_comments":[],"question_data":{"question_level":1,"question_number":1,"question_title":"1->1","question_desc":"asasas","question_image":null}};
                var data = obj['question_data'];
                var view = {
                    title : data['question_title'],
                    id : data['question_number'],
                    level : data['question_level'],
                    description : data['question_desc'],
                    image : data['question_image']
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
            <a href={{link}}>{{title}} yaya {{level}}</a>
        </script>
        <script type="text/plain" id="problemTemplate">
            {{title}} hi {{level}} and {{description}}
        </script>
        
    </body>
</html>
