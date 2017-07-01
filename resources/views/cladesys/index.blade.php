
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CLADESYS</title>

        <link href="{{ asset('css/app.css') }} " rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div ng-app="cladesys">
            
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <a class="navbar-brand" href="#">Title</a>
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Link</a>
                    </li>
                </ul>
            </nav>
            
            <div ng-view></div>
        </div>

        
        <script src="{{ asset('js/app.js') }} "></script>
        <script src="{{ asset('bower_components/angular/angular.js') }} "></script>
        <script src="{{ asset('bower_components/angular-route/angular-route.js') }} "></script>

        <script>window.url = "{{ url('') }}"</script>
        <script src="{{ asset('js/cladesys/main.js')}} "></script>
    </body>
</html>
