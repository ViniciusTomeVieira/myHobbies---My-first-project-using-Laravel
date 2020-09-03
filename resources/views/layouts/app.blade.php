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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" defer></script>
    
    <script>

        $( document ).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#rg').mask('0.000.000');
            $('#rg').mask('0.000.000');
            $('#cep').mask('00000-000');
            $('#numero').mask('00000');
            $('#numero').prop("disabled", true);
        });

        function pesquisarCliente(){
            var xhttp = new XMLHttpRequest();

            var json = new Object() 

            json.id = document.getElementById('idCliente').value
            
            var myJson = JSON.stringify(json);
            let cliente
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        cliente = JSON.parse(this.responseText);
                        if(cliente != null){
                            document.getElementById('result').value = cliente.nome + "  Cpf: " + cliente.cpf
                        }else{
                            document.getElementById('result').value = "Cliente não encontrado"
                        }
                        
                    }
                };
                xhttp.open("POST", "http://localhost:4000/clientes/search", true);
                xhttp.setRequestHeader("Content-type", "application/json");
                xhttp.send(myJson)
        }
        function validarCep(){
            let nome = document.getElementById('nome').value != ""
            let cpf = document.getElementById('cpf').value != ""
            let rg = document.getElementById('rg').value != ""
            let nasc = document.getElementById('nasc').value != ""
            let cep = document.getElementById('cep').value != ""
            let cpfValido = false
            if(nome && cpf && rg && nasc && cep){
                cpfValido = validarCPF(document.getElementById('cpf').value)
                if(cpfValido){
                    pesquisacep(document.getElementById('cep').value)
                }else{
                    alert("CPF inválido")
                }               
            }           
        }

        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
            document.getElementById('ibge').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('estado').value=(conteudo.uf);
                document.getElementById('ibge').value=(conteudo.ibge);                              
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function validarCPF(cpf) {	
            cpf = cpf.replace(/[^\d]+/g,'');	
            if(cpf == '') return false;	
            // Elimina CPFs invalidos conhecidos	
            if (cpf.length != 11 || 
                cpf == "00000000000" || 
                cpf == "11111111111" || 
                cpf == "22222222222" || 
                cpf == "33333333333" || 
                cpf == "44444444444" || 
                cpf == "55555555555" || 
                cpf == "66666666666" || 
                cpf == "77777777777" || 
                cpf == "88888888888" || 
                cpf == "99999999999")
                    return false;		
            // Valida 1o digito	
            add = 0;	
            for (i=0; i < 9; i ++)		
                add += parseInt(cpf.charAt(i)) * (10 - i);	
                rev = 11 - (add % 11);	
                if (rev == 10 || rev == 11)		
                    rev = 0;	
                if (rev != parseInt(cpf.charAt(9)))		
                    return false;		
            // Valida 2o digito	
            add = 0;	
            for (i = 0; i < 10; i ++)		
                add += parseInt(cpf.charAt(i)) * (11 - i);	
            rev = 11 - (add % 11);	
            if (rev == 10 || rev == 11)	
                rev = 0;	
            if (rev != parseInt(cpf.charAt(10)))
                return false;		
            return true;   
        }

        function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');
        alert(cep)

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
                document.getElementById('numero').disabled = false;

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
        };
            
        function UserActionGet(){
            var xhttp = new XMLHttpRequest();
            let clientes = []
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        clientes = JSON.parse(this.responseText);
                        document.getElementById("listaClientes").value = clientes
                    }
                };
                xhttp.open("GET", "http://localhost:4000/clientes", true);
                xhttp.setRequestHeader("Content-type", "application/json");
                xhttp.send()
            }

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

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert("Dados enviados com sucesso");
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
                        <li><a class="nav-link{{Request::is('info') ? ' active ' : ''}}" href="/info">Info</a></li>  
                        <li><a class="nav-link{{Request::is('hobby*') ? ' active ' : ''}}" href="/hobby">Hobbies</a></li>
                        <li><a class="nav-link{{Request::is('tag*') ? ' active ' : ''}}" href="/tag">Tags</a></li>
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
