<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <title>{{config('app.name')}}</title>
        <!-- Style -->
        <!-- <link href="{{asset('frontend_assets/css/app.css')}}?v={{time()}}" rel="stylesheet" type="text/css"> -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,700,900">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900">
        <link rel="stylesheet" href="{!!url('front/css/app.css')!!}">
    </head>
    <body>
        <div id="web_app">
          <front-end/>
        </div>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script src="{{asset('frontend_assets/js/app.js')}}"></script>
    </body>
</html>