@extends('layouts.app')

@section('content')
  <pagina tamanho="10">
    <painel titulo="Dashboard" nome='{{ Auth::user()->name }}' email='{{ Auth::user()->email }}'>
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <div class="row">
        @can('eAutor')
        <div class="col-md-4" class="img-responsive">
          <caixa qtd="{{ $totalArtigos }}" titulo="Artigos" url="{{route('artigos.index')}}" cor="orange" icone="ion ion-pie-graph"></caixa>
        </div>
        @endcan
        @can('eAdmin')
        <div class="col-md-4">
          <caixa qtd="{{ $totalUsuarios }}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="blue" icone="ion ion-person-stalker"></caixa>
        </div>
        <div class="col-md-4">
          <caixa qtd="{{ $totalAutores }}" titulo="Autores" url="{{route('autores.index')}}" cor="red" icone="ion ion-person"></caixa>
        </div>
        <div class="col-md-4">
          <caixa qtd="{{ $totalAdmin }}" titulo="Admin" url="{{route('adm.index')}}" cor="green" icone="ion ion-person"></caixa>
        </div>
        @endcan
      </div>      
    </painel>
  </pagina>
@endsection