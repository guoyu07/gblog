<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ mix('css/vendor.css') }}">
  <script type="text/javascript">
    window.Laravel = {		
        csrfToken: "{{ csrf_token() }}"		
    }
    window.User = {!! Auth::user() !!}
    window.Language = "{{ config('app.locale') }}"
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div id="app"></div>

<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>
</html>
