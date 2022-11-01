<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search-Master</title>
</head>
<body>
  <header class="head">
    <div id="seeker">
      <h1 class="logo"><a href="/top">SEEKER</a></h1>
    </div>
    <div id="side-menu">
      <h2 class="logout"><a href="/logout">logout</a></h2>
    </div>
  </header>
  <div id="row">
    <div id="container">
      @yield('content')
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/_ajaxfavorite.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>
