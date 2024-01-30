<nav class="navbar navbar-expand-lg" style="color: #fff;background-color: #1D3557;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" class="d-inline-block align-text-top logo">
          </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link @if ($link == "home")
                actives
            @endif" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($link == "category")
                actives
            @endif" href="/categories">Books & Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login/Register</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
