<!DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>الشروط والاحكام</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min-rtl.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/styles-rtl.css') }}" />
        <link rel="shortcut icon" href="{{ asset('img/logo/medical_egy_logo.jpeg') }}" />
    </head>
    <body>
        <header class="sign-up log-in">
            <div class="bg">
                <img class="wave-purple" src="{{ asset('img/background/sign-bg-01.svg') }}" alt="" />
            </div>
            <div class="sign-up-content">
                <div class="container">
                    <div class="row">
                        <div class="form-trial col-sm-8 col-xs-12">
                            <h3>الشروط والاحكام </h3>
                            <p>{{$terms}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
