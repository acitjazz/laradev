<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #000;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
            .logo img{
                max-width: 80px;
            }
            h1{ font-size: 10em; margin: 0;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
              <div class="logo">
               <img src="{{url('/images/logo.png')}}" alt="">
              </div>
                <h1>404</h1>
                <div class="title">PAGE NOT FOUND.</div>
            </div>
        </div>
    </body>
</html>
