<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
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
        <th>Nome Completo</th>
        <th>Nome Exibicao</th>
        <th>Numero Candidato</th>
        <th>Endereço</th>
        <th>Party ID</th>
        <th>Foto</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($candidates as $candidate)
      @php
        $date=date('Y-m-d', $candidate['date']);
        @endphp
      <tr>
        <td>{{$candidate['id']}}</td>
        <td>{{$candidate['nome_completo']}}</td>
        <td>{{$candidate['nome_exibicao']}}</td>
        <td>{{$candidate['numero_candidato']}}</td>
        <td>{{$candidate['endereco']}}</td>
        <td>{{$candidate['party_id']}}</td>
        <td> <img src="{{$candidate['foto']}}"/> </td>
        
        <td><a href="{{action('CandidateController@edit', $candidate['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('CandidateController@destroy', $candidate['id'])}}" method="post">
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