<!-- index.blade.php -->



@extends('layouts.meulayout')

@section('conteudo1')
<h1>CONTEUDO 1</h1>
@endsection

@section('conteudo2')

<h1>CONTEUDO 2</h1>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sigla</th>
        <th>Numero</th>
        <th>Endereço</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($parties as $party)
      @php
        $date=date('Y-m-d', $party['date']);
        @endphp
      <tr>
        <td>{{$party['id']}}</td>
        <td>{{$party['nome']}}</td>
        <td>{{$party['sigla']}}</td>
        <td>{{$party['numero']}}</td>
        <td>{{$party['endereco']}}</td>
        
        <td><a href="{{action('PartyController@edit', $party['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('PartyController@destroy', $party['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>


@endsection