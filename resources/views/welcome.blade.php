<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Municípios</title>


        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="/app.css">
    </head>
    <body>
      
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if (Route::has('login'))
        
        <div class="card">
            <div class="card-body">
                <div class="container text-center">
                    <div class="row">
                      <div class="col">
                        @auth
                        <p>Logado</p>
                    @endauth
                    @guest
                        <p>Sem login</p>
                    @endguest
                      </div>
                      <div class="col">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Fazer login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            Registrar
                        </a>
                    @endif
                    @endauth
                      </div>
                    
                    </div>
                  </div>
                </div>
                @endif
        </div>
        <span class="title">
            <h1>
            Municípios
        </h1>
        </span>
        
        <div>
            
            <table id="myTable">
                <thead>
                  
                    <tr>
                        <th>Brasão</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Código do IBGE</th>
                        <th>Estado(UF)</th>
                        <th>Endereço</th>
                        @auth
                        <th></th>
                        <th></th>
                        @endauth
                    </tr>
                  
                </thead>
                
                <tbody>

                    @foreach ($municipios as $municipio)
                        <tr>
                            <td><img src="/storage/{{ $municipio->Brasao }}" alt="" srcset=""></td>
                            <td>{{ $municipio->Nome }}</td>
                            <td>{{ $municipio->CNPJ }}</td>
                            <td>{{ $municipio->CodigoIBGE }}</td>
                            <td>{{ $municipio->EstadoUF }}</td>
                            <td>{{ $municipio->Endereco }}</td>
                            @auth
                            <td>
                                {{-- <form action="{{ route('municipio.delete', $municipio->id) }}"
                                method="POST">
                                @csrf --}}
                                {{-- @method('DELETE') --}}
                                <button type="submit" class=""><a href="{{ url('editar-municipio/' . $municipio->id) }}">Editar</a></button>
                                {{-- </form> --}}
                            </td>
                            <td>
                                <form action="{{ route('municipio.delete', $municipio->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="">Deletar</button>
                                </form>
                            </td>
                            @endauth
                        </tr>
                    @endforeach
            
                </tbody>

            </table>

        </div>

        <div class="form">@include('partials.form')</div> 

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    </body>
</html>
