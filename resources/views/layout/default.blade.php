<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Case task, UKE </title>
        <link rel="stylesheet" href="https://ukeweb-styleguide-cdn.s3.eu-central-1.amazonaws.com/0.99.105/osg.css">
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }
            .content {
                flex: 1;
            }
        </style>
    </head>
    <body>
        <div class="header">
            @include('includes.header')
        </div>
        <div class="content osg-padding-horizontal-8">
            @yield('content')
        </div>
        <div class="footer">
            @include('includes.footer')
        </div>
    </body>
</html>
