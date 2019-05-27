<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                Banner will be here
                <nav>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>  
        
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>  

        <div class="row">
            <div class="col-lg-12">
                &copy; 2019, mysite.com, All rights reserved.
            </div>
        </div>
    </div>
    <!-- container closed ---->
</body>
</html>
