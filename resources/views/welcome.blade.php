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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Filmy</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Recenzje</a></li>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Jeste?? zalogowany</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Wyloguj si??
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('profil') }}">Profil</a>
                        </div>
                        </li>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Zaloguj si??</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Zarejestruj si??</a>
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
                    <h1 class="fw-bolder">Strona z recenzjami film??w!</h1>
                    <p class="lead mb-0">Mi??ego czytania</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div id="zamiana" class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img style="height: 350px" class="card-img-top" src="zdj??cia/lotr/lotr1.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">1 grudnia 2003</div>
                            <h2 class="card-title">W??adca Pier??cieni: Powr??t Kr??la</h2>
                            <p class="card-text">???W??adca Pier??cieni: Powr??t Kr??la???, to jedna z najlepszych ekranizacji powie??ci w ??wiatowej kinematografii. Nowozelandczyk Peter Jackson przeni??s?? na srebrny ekran najpopularniejsz?? trylogi?? fantasy. Ekranizacja powie??ci napisanej przez Johna Ronalda Raoula Tolkiena by??a du??ym ryzykiem, jednak tw??rcy obrazu zyskali przychylno???? krytyk??w oraz, co najwa??niejsze, wybrednych fan??w literackiego pierwowzoru.</p>
                            <a class="btn btn-primary" id="s0" href="#!" onclick="z_cat(this.id)">Recenzja ???</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="zdj??cia/piraci/pirates1.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">28 czerwa 2003</div>
                                    <h2 class="card-title h4">Piraci z Karaib??w: Kl??twa Czarnej Per??y</h2>
                                    <p class="card-text">G????wnym bohaterem filmu jest kapitan Jack Sparrow ??? pysza??kowaty, lecz w g????bi serca poczciwy, charyzmatyczny pirat, kt??ry swoim pijackim krokiem i ci??t?? puent?? kradnie dla siebie ca???? histori??. Histori??, co warte odnotowania, inspirowan?? jedn?? z atrakcji Disneylandu.</p>
                                    <a class="btn btn-primary" id="s1" href="#!" onclick="z_cat(this.id)">Recenzja ???</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="zdj??cia/harry/harry1.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">6 listopad 2005</div> 
                                    <h2 class="card-title h4">Harry Potter i Czara Ognia</h2>
                                    <p class="card-text">Czwarty rok nauki Harry'ego i sp????ki w Szkole Magii i Czarodziejstwa naznaczony jest ewidentnie okresem dojrzewania - zaczynaj?? si?? flirty i k????tnie z przyjaci????mi. Ponownie przychodzi Potterowi wybiera?? mi??dzy tym, co ??atwe, a tym, co w??a??ciwie, musi przekonywa?? o swojej niewinno??ci i znosi?? przeciwno??ci losu. Wszystko komplikuje si?? jeszcze bardziej, kiedy Harry zostaje czwartym (nieprzepisowym) uczestnikiem Turnieju Tr??jmagicznego, za kt??rego wygran?? zwyci??zca otrzymuje g??r?? z??ota i s??aw?? na wieki.</p>
                                    <a class="btn btn-primary" id="s2" href="#!" onclick="z_cat(this.id)">Recenzja ???</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="zdj??cia/star/stars1.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">17 maja 1980</div>
                                    <h2 class="card-title h4">Gwiezdne wojny: cz?????? V ??? Imperium kontratakuje</h2>
                                    <p class="card-text">Bitwa o galaktyk?? przybiera na sile. Gdy si??y Imperium przeprowadzaj?? atak na sojusz rebeliant??w, Han Solo i ksi????niczka Leia uciekaj?? do Miasta Chmur. Mroczniejszy klimat o wiele bardziej pasuje do uniwersum opanowanego przez despotyczne Imperium, w kt??rym jednak tli si?? iskierka nadziei.</p>
                                    <a class="btn btn-primary" id="s3" href="#!" onclick="z_cat(this.id)">Recenzja ???</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="zdj??cia/artur/artur1.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">7 maja 2017</div>
                                    <h2 class="card-title h4">Kr??l Artur: Legenda miecza</h2>
                                    <p class="card-text">M??ody Artur zdobywa miecz Excalibur i wiedz?? na temat swojego kr??lewskiego pochodzenia. Przy????cza si?? do rebelii, aby pokona?? tyrana, kt??ry zamordowa?? jego rodzic??w.</p>
                                    <a class="btn btn-primary" id="s4" href="#!" onclick="z_cat(this.id)">Recenzja ???</a>
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
