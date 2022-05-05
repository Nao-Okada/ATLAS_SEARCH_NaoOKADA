<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/logout.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search-Master</title>
</head>
<body>
  <header>
  <h1>SEEKER</h1>
  </header>
  <div id="container">
    @yield('content')
  </div>
</body>
</html>
