<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Laravel-project</title>
</head>

<body>
  <div class="wrapper">
    <header class="header">
    @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Уведомления:{{ auth()->user()->unreadNotifications->count() }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (auth()->user()->unreadNotifications as $notification)
                        <a class="dropdown-item" href="/things/{{$notification->data['thing_id']}}">
                            {{ $notification->data['message'] }}
                        </a>
                        @endforeach
                    </div>
                </li>
                @endauth
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="@active('things') nav-item">
              <a class="nav-link" href="/things">Вещи</a>
            </li>
            <li class="nav-item @active('places')">
              <a class="nav-link" href="/places">Места<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item @active('users')">
              <a class="nav-link" href="/users">Пользователи<span class="sr-only">(current)</span></a>
            </li>
          </ul>
          @auth

          <div class='auth__wrapper'>
            <a href="/auth/logout">Выйти</a>
            <a href="/my_things" class="@active('my_things')" style="margin-left:12px">Мои вещи</a>
            <a href="#" style="margin-left:12px">Вещи в работе</a>
            <a href="#" style="margin-left:12px">Repair Things</a>
            <a href="#" style="margin-left:12px">Used Things</a>
          </div>

          @endauth
          @guest
          <ul class="navbar-nav">
            <li class="nav-item @active('signup')">
              <a href="/signup" class="nav-link auth-button button">Регистрация</a>
            </li>
            <li class="nav-item @active('signin')">
              <a href='/signin' class="nav-link auth-button button">Вход</a>
            </li>
          </ul>
          @endguest
        </div>
      </nav>
    </header>
    <main class="main">
      <div class="container mt-4">

        @yield('content')

      </div>
    </main>
    <footer class="footer p-3">
      <div class="footer_content">
        <h2>Анашкин Максим Дмитриевич<br>221-323</h2>
      </div>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>