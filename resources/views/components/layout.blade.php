<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">E-Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('shop') ? 'active' : '' }}" href="/shop">Shop</a>
        </li>
        <li class="nav-item {{ Request::is('aboutus') ? 'active' : '' }}">
          <a class="nav-link" href="/aboutus">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('cart') ? 'active' : '' }}" href="/cart">Cart</a>
        </li>
        @if (auth()->check())
        <form action="/logout" method="POST">
            @csrf
            <li class="nav-item">
                <button class="nav-link" type="submit">Log Out</button>
            </li>
        </form>
        @else
            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
            <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
            <a class="nav-link" href="/register">Register</a>
            </li>
        @endif
      </ul>
    </div>
  </nav>
  {{$slot}}
      <!-- Footer -->
      <footer class="bg-dark text-white mt-5 p-4 text-center">
        <p>&copy; 2024 E-Shop. All Rights Reserved.</p>
      </footer>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
