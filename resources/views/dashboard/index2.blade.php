<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INSPINIA | Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/vendor.css') }}">
    <script type="text/javascript"> 
    	window.Laravel = {csrfToken: "{{ csrf_token() }}"} 
    	window.Language = "{{ config('app.locale') }}"
    </script>
</head>

<body class="pace-done body-small">
    <div id="app"></div>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>
</html>
