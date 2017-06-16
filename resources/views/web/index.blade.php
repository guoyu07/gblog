<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Automall</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ mix('css/vendor-web.css')}}">
  <script type="text/javascript">
    window.Laravel = {
        csrfToken: "{{ csrf_token() }}"
    }
  </script>
</head>
<body id="site-layout">
<div id="app"></div>
<script type="text/javascript" src="{{ mix('web/js/app.js') }}"></script>
</body>
</html>
