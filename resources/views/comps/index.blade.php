<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h1>会社のページだよ！！！！！</h1>
  <h1>{{ url('/company/logout') }}</h1>
  <a href="{{ url('/company/logout') }}"
      onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
      Logout
  </a>

  <form id="logout-form" action="{{ url('/company/logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
</body>
</html>