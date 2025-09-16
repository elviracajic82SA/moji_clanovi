<!doctype html>
<html lang="bs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name') }}</title>
  <style>
    body{font-family:system-ui,Arial,sans-serif;max-width:1000px;margin:30px auto;padding:0 16px}
    nav a{margin-right:10px} table{width:100%;border-collapse:collapse;margin:10px 0}
    th,td{border:1px solid #ddd;padding:8px} .flash{color:green} form.inline{display:inline}
    input,select,button{padding:8px;font-size:15px}
  </style>
</head>
<body>
<nav>
  @auth
    <a href="{{ route('members.index') }}">Članovi</a>
    <a href="{{ route('fee-plans.index') }}">Planovi</a>
    <a href="{{ route('payments.index') }}">Uplate</a>
    <form class="inline" action="{{ route('logout') }}" method="post">@csrf<button>Odjava</button></form>
  @endauth
  @guest
    <a href="{{ route('login') }}">Prijava</a>
    <a href="{{ route('register') }}">Registracija</a>
  @endguest
</nav>
<hr>
@if(session('ok')) <p class="flash">{{ session('ok') }}</p> @endif
{{ $slot }}
</body>
</html>
    