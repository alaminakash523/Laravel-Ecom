<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="/tinymce/js/tinymce/tinymce.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">E-Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ Request::is('/add-product') ? 'active' : '' }}">
          <a class="nav-link" href="/add-product">Add Product</a>
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link {{ Request::is('prders') ? 'active' : '' }}" href="/orders">Orders</a> --}}
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">All Product</a>
        </li>
        @if (auth()->check())    
        <form action="/logout" method="POST">
            @csrf
            <li class="nav-item">
                <button class="nav-link" type="submit">Log Out</button>
            </li>
        </form>
        @else
          <li class="nav-item">
            <a class="nav-link" href="/admin-login">Log In</a>
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
  <script>

    tinymce.init({
      selector: '#productDescription', // This will apply TinyMCE to all textarea elements
      license_key: 'gpl',
      plugins: 'lists link image table code', // Example plugins for added functionality
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image', // Toolbar configuration
      setup: function(editor) {
    editor.on('change', function(e) {
      editor.save(); // Sync TinyMCE content to the textarea
    });
  }
    });
    document.querySelector('form').addEventListener('submit', function(e) {
      tinymce.triggerSave(); // Save TinyMCE content to the textarea
    });
  </script>
</body>
</html>
