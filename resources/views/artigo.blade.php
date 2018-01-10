@extends('layouts.header')

@section('content')
  <pagina tamanho="12">
    <painel>
      <h2 align="center">{{$artigo->titulo}}</h2>
    </painel>
    <painel>
      <h4 align="center">{{$artigo->descricao}}</h4>
      <hr>
      <div><p>{!!$artigo->conteudo!!}</p></div>
      <hr>
      <p align="center">
        <small>Por: {{$artigo->user->name}} - {{date('d/m/Y',strtotime($artigo->data))}}</small>
      </p>
    </painel>
  </pagina>
@endsection
