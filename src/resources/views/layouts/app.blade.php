<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  @php
  $noHeaderNavRoutes = ['/', 'contacts/confirm'];
  @endphp
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">FashionablyLate</a>
      @if (!in_array(request()->path(), $noHeaderNavRoutes))
        @hasSection('header-nav')
          @yield('header-nav')
        @else
        <nav class="header-nav">
          <ul class="header-nav__list">
            <li class="header-nav__item">
              <a class="header-nav__link" href="{{ route('logout') }}">logout</a>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__link" href="{{ route('register') }}">register</a>
            </li>
            <li class="header-nav__item">
              <a class="header-nav__login" href="{{ route('login') }}">login</a>
            </li>
          </ul>
        </nav>
        @endif
      @endif
    </div>
  </header>

  <main>
    @yield('content')
  </main>
  @yield('scripts')
</body>
</html>