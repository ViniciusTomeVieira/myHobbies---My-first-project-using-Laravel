<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title','MyHobbies')</title> <!-- {{ config('app.name', 'Laravel') }} -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script>
        function UserActionPost(){
            var xhttp = new XMLHttpRequest();

            var json = new Object();
                json.nome =  $("#nome").val(),
                json.cpf = $("#cpf").val(),
                json.rg = $("#rg").val(),
                json.nasc = $("#nasc").val(),
                json.cep = $("#cep").val(),
                json.rua = $("#rua").val(),
                json.bairro = $("#bairro").val(),
                json.cidade = $("#cidade").val(),
                json.estado = $("#estado").val(),
                json.numero = $("#numero").val()

            var myJson = JSON.stringify(json);

            var result = JSON.parse(JSON.stringify(json))
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                    }
                };
                xhttp.open("POST", "http://localhost:4000/clientes", true);
                xhttp.setRequestHeader("Content-type", "application/json");
                xhttp.send(myJson)
            }

            function UserActionPut(idUser) {
                var xhttp = new XMLHttpRequest();
                var json = new Object();
                    json.id = idUser,
                    json.nome =  $("#nome").val(),
                    json.cpf = $("#cpf").val(),
                    json.rg = $("#rg").val(),
                    json.nasc = $("#nasc").val(),
                    json.cep = $("#cep").val(),
                    json.rua = $("#rua").val(),
                    json.bairro = $("#bairro").val(),
                    json.cidade = $("#cidade").val(),
                    json.estado = $("#estado").val(),
                    json.numero = $("#numero").val()

                var myJson = JSON.stringify(json);

                var result = JSON.parse(JSON.stringify(json))
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            alert(this.responseText);
                        }
                    };
                    xhttp.open("PUT", "http://localhost:4000/clientes/:{{$cliente ?? '' ?? ''->id}}", true);
                    xhttp.setRequestHeader("Content-type", "application/json");
                    xhttp.send(myJson)
            }
            function UserActionDelete(userId) {
                var xhttp = new XMLHttpRequest();
                var json = new Object();
                    json.id = userId,
                    json.nome =  $("#nome").val(),
                    json.cpf = $("#cpf").val(),
                    json.rg = $("#rg").val(),
                    json.nasc = $("#nasc").val(),
                    json.cep = $("#cep").val(),
                    json.rua = $("#rua").val(),
                    json.bairro = $("#bairro").val(),
                    json.cidade = $("#cidade").val(),
                    json.estado = $("#estado").val(),
                    json.numero = $("#numero").val()

                var myJson = JSON.stringify(json);

                var result = JSON.parse(JSON.stringify(json))
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            alert(this.responseText);
                        }
                    };
                    xhttp.open("DELETE", "http://localhost:4000/clientes/:{{$cliente ?? '' ?? ''->id}}", true);
                    xhttp.setRequestHeader("Content-type", "application/json");
                    xhttp.send(myJson)
            }
            
    $(document).ready(function(){           
        $("#numero").click(function(){
        })       
});
</script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link{{Request::is('/') ? ' active ' : ''}}" href="/">Start</a></li>
                        <!--<li><a class="nav-link{{Request::is('info') ? ' active ' : ''}}" href="/info">Info</a></li> -->  
                        <!--<li><a class="nav-link{{Request::is('hobby*') ? ' active ' : ''}}" href="/hobby">Hobbies</a></li>  --> 
                        <li><a class="nav-link{{Request::is('cliente*') ? ' active ' : ''}}" href="/cliente">Clientes</a></li>  
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

        @isset($message_success)
        <div class="container">
            <div class="alert alert-success" role="alert">
                {!! $message_success !!}
            </div>
        </div>
        @endisset

        @isset($message_warning)
        <div class="container">
            <div class="alert alert-warning" role="alert">
                {!! $message_warning !!}
            </div>
        </div>
        @endisset

        @if($errors->any())
        <div class="container">      
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>                
                        {!! $error !!} 
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        @yield('content')
        </main>
    </div>
</body>
</html>
