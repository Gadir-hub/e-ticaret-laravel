<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h3>Hoşgeldiniz, {{ auth()->user()->username }}</h3>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger mt-3">Çıkış Yap</button>
  </form>
</div>
</body>
</html>
