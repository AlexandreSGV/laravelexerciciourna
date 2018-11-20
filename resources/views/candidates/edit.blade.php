<!-- create.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example  </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
  </head>
  <body>
    <div class="container">
      <h2>Criar Candidato</h2><br/>
      <form method="post" action="{{action('CandidateController@update', $id)}}">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" class="form-control" name="nome_completo" value="{{$candidate->nome_completo}}" >
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="nome_exibicao">Nome Exibição:</label>
            <input type="text" class="form-control" name="nome_exibicao" value="{{$candidate->nome_exibicao}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" name="endereco" value="{{$candidate->endereco}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="numero_candidato">Número Candidato:</label>
            <input type="number" class="form-control" name="numero_candidato" value="{{$candidate->numero_candidato}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="party_id">Party ID:</label>
            <input type="text" class="form-control" name="party_id" value="{{$candidate->party_id}}">
          </div>
        </div>


       
        
        

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">UDPATE</button>
          </div>
        </div>
      </form>
    </div>
    
  </body>
</html>