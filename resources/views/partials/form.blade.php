<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/app.css">
@auth
  
  <span class="formTitle"><h3 class="">Adicione um novo município</h3></span>
  <div class="formFlex">
  <div class="form">
  <form class="" method="POST" action="{{ route('municipio.create') }}">
    {{-- form enctype="multipart/form-data" --}}
@csrf
    {{-- <div class="flex"> --}}
      <div class="row justify-content-md-center">
        <div class="col input-group mb-3">
            {{-- <label class="form-label">Nome</label> --}}
            <span class="input-group-text" id="basic-addon1">Nome</span>
            <input type="text" class="form-control"  name="Nome" id="name">
        </div>
        
        <div class="col input-group mb-3">
            {{-- <label class="form-label">CNPJ</label> --}}
            <span class="input-group-text" id="basic-addon1">CNPJ</span>
            <input type="text" class="form-control"  name="CNPJ" id="CNPJ">
        </div>
      </div> 
      <div class="row">
        <div class="col input-group mb-3">
            {{-- <label class="form-label">Código IBGE</label> --}}
            <span class="input-group-text" id="basic-addon1">Código IBGE</span>
            <input class="form-control" type="text" name="CodigoIBGE" id="CodigoIBGE">
        </div>
        
        <div class="col input-group mb-3">
            {{-- <label>Estado(UF)</label> --}}
            <span class="input-group-text" id="basic-addon1">Estado(UF)</span>
            <input type="text" class="form-control" name="EstadoUF" id="EstadoUF">
        </div>
      </div>
      <div class="row">  
      <div class="col input-group mb-3">
            {{-- <label class="form-label">Endereço</label> --}}
            <span class="input-group-text" id="basic-addon1">Endereço</span>
            <input type="text" class="form-control"  name="Endereco" id="Endereco">
      </div>

      <div class="col input-group mb-3">
        {{-- <label class="form-label">Brasão</label> --}}
        <span class="input-group-text" id="basic-addon1">Brasão</span>
        <input type="file" class="form-control"  name="Brasao" id="Brasao">
    </div>
    </div>
      <div class="input-group mb-3">  
      <input type="submit" name="send" class="form-control"  value="Adicionar" class="btn btn-primary">
    </div>
  </form>
  </div>
</div>
@endauth