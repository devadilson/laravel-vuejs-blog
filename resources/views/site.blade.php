@extends('layouts.header')

@section('content')
  <pagina tamanho="12">
    <painel>
      <div class="row">

      @foreach ($lista as $key => $value)
        <artigocard 
          titulo="{{str_limit($value->titulo,35,"...")}}"
          descricao="{{str_limit($value->descricao,55,"...")}}"
          link="{{route('artigo',[$value->id,str_slug($value->titulo)])}}"
          imagem="http://127.0.0.1:8000/img_post/post.jpeg"
          data="{{$value->data}}"
          autor="{{$value->autor}}"
          alt="imagem"
          sm="6"
          md="4">
        </artigocard>
      @endforeach

        <div align="center">
            {{$lista}}
        </div>

      </div>
    </painel>
  </pagina>
@endsection