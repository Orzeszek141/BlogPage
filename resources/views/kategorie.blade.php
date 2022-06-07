<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Strona z recenzjami</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="/js/scripts.js"></script>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand">Witamy!</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul  class="navbar-nav ms-auto mb-2 mb-lg-0" id="pasek">
                        <li class="nav-item"><a class="nav-link" href="{{ route('kontakt') }}">Kontakt</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('formularz') }}">Formularz</a></li>
                        <li class="nav-item"><a class="nav-link" href="/">Filmy</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('category') }}">Recenzje</a></li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul  class="navbar-nav ms-auto ml-auto mb-2 mb-lg-0" id="login_register">
                    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Jesteś zalogowany</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Wyloguj się
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('profil') }}">Profil</a>
                        </div>
                        </li>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Zaloguj się</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Zarejestruj się</a>
                        @endif
                    @endauth
                </div>
            @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Strona z recenzjami filmów!</h1>
                    <p class="lead mb-0">Miłego czytania</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div id="zamiana" class="col-lg-8">
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" style="height: 300px" src="zdjęcia/fantasy.jpeg" alt="..." /></a>
                                <div class="card-body">
                                    <h2 class="card-title h4">Fantastyka</h2>
                                    <p class="card-text">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{route('recenzje',['id_title'=>'Władca pierścieni: Powrót Króla'])}}">Władca pierścieni: Powrót Króla</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Piraci z Karaibów: Klątwa Czarnej Perły'])}}">Piraci z Karaibów: Klątwa Czarnej Perły</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Gwiezdne wojny: część V – Imperium kontratakuje'])}}">Gwiezdne wojny: część V – Imperium kontratakuje</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Harry Potter i Czara Ognia'])}}">Harry Potter i Czara Ognia</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Król Artur: Legenda miecza'])}}">Król Artur: Legenda miecza</a></li>
                                    </ul></p>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" style="height: 300px" src="zdjęcia/biography.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <h2 class="card-title h4">Biografia</h2>
                                    <p class="card-text">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{route('recenzje',['id_title'=>'Wielki Mike. The Blind Side'])}}">Wielki Mike. The Blind Side</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Nietykalni'])}}">Nietykalni</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Pianista'])}}">Pianista</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Wilk z Wall Street'])}}">Wilk z Wall Street</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Bohemian Rhapsody'])}}">Bohemian Rhapsody</a></li>
                                    </ul></p>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" style="height: 300px" src="zdjęcia/superhero.png" alt="..." /></a>
                                <div class="card-body">
                                    <h2 class="card-title h4">Superbohaterski</h2>
                                    <p class="card-text">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{route('recenzje',['id_title'=>'Avengers: Wojna bez granic'])}}">Avengers: Wojna bez granic</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Powrót Batmana'])}}">Powrót Batmana</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Avengers: Koniec gry'])}}">Avengers: Koniec gry</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Kapitan Ameryka: Wojna Bohaterów'])}}">Kapitan Ameryka: Wojna Bohaterów</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Mroczny Rycerz'])}}">Mroczny Rycerz</a></li>
                                    </ul></p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" style="height: 300px" src="zdjęcia/comedy.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <h2 class="card-title h4">Komedia</h2>
                                    <p class="card-text">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{route('recenzje',['id_title'=>'Sami swoi'])}}">Sami swoi</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Dzień Świstaka'])}}">Dzień Świstaka</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Kac Vegas'])}}">Kac Vegas</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Forrest Gump'])}}">Forrest Gump</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Praktykant'])}}">Praktykant</a></li></br>
                                    </ul></p>
                                </div>
                            </div>
                           
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" style="height: 300px" src="zdjęcia/action.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <h2 class="card-title h4">Akcja</h2>
                                    <p class="card-text">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{route('recenzje',['id_title'=>'John Wick'])}}">John Wick</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Olimp w ogniu'])}}">Olimp w ogniu</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'6 Underground'])}}">6 Underground</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Niezniszczalni'])}}">Niezniszczalni</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Mission: Impossible – Rogue Nation'])}}">Mission: Impossible – Rogue Nation</a></li>
                                    </ul></p>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" style="height: 300px" src="zdjęcia/war.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <h2 class="card-title h4">Wojenny</h2>
                                    <p class="card-text">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{route('recenzje',['id_title'=>'Furia'])}}">Furia</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Snajper'])}}">Snajper</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Szyfry wojny'])}}">Szyfry wojny</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Bękarty wojny'])}}">Bękarty wojny</a></li>
                                        <li><a href="{{route('recenzje',['id_title'=>'Pearl Harbor'])}}">Pearl Harbor</a></li>
                                    </ul></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Kategorie</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="/">Fantastyka</a></li>
                                        <li><a id="k0" href="#!" onclick="z_cat(this.id)">Biografia</a></li>
                                        <li><a id="k1" href="#!" onclick="z_cat(this.id)">Superbohaterski</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a id="k2" href="#!" onclick="z_cat(this.id)">Komedia</a></li>
                                        <li><a id="k3" href="#!" onclick="z_cat(this.id)">Akcja</a></li>
                                        <li><a id="k4" href="#!" onclick="z_cat(this.id)">Wojenny</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Mapa z kinem</div>
                        <div class="card-body"><iframe width="300" src="https://www.google.com/maps?q=Poland,Lublin,Plaza,CinemaCity,&output=embed"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; HO</p></div>
        </footer>
    </body>
</html>
