<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Solve the Story</title>
  <link rel="stylesheet" href="/css/style.css">
  <script src="script.js"></script>
</head>

    <header>
        <!-- @guest
            <a href="{{ route('login') }}" class="login">Se connecter</a>
            <a href="{{ route('register') }}" class="inscription">S'inscrire</a>
        @else
            <a href="{{ route('logout') }}" class="deconnexion" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

        @endguest
        <a href="{{route('home')}}"><img src="{{ asset('img/logo.png') }}"></a> -->

        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li><a href="{{ route('home') }}">Accueil</a></li>
      </ul>
      <form class="navbar-form navbar-left" method="get" action="{{ route('recherche') }}">
        <div class="form-group">
          <input type="search" name="truc" class="form-control" placeholder="Rechercher">
        </div>
        <button type="submit" class="btn btn-default">rechercher</button>
      </form>
      <a class="navbar-brand" id="logonav" href="#"><img src="{{ asset('img/logo.png') }}"></a>
      <ul class="nav navbar-nav navbar-right">
        @guest
        <li><a  href="{{ route('login') }}">Se connecter</a></li>
        <li><a class="menu" href="{{ route('register') }}">S'inscrire</a></li>
        @else
        <li><a class="menu" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a>Bonjour {{ Auth::user()->name }}</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('creer_histoire') }}">Ajouter une histoire</a></li>
            <li><a href="{{ route('mesHistoires') }}">Mes histoires</a></li>
          </ul>
        </li>
        @endguest
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    </header>
</html>
