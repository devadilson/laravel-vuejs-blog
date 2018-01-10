<template>
    <div :class="'col-sm-'+(sm || '6') + ' col-md-'+(md || '4')">
        <div class="thumbnail">
            <img :src="imagem" :alt="(alt || '...')">
            <div class="caption">
                <small>{{data | formataData}} - {{autor}}</small>
                <h4>{{titulo}}</h4>
                <small>{{descricao}}</small>
                <p><a :href="link" class="btn btn-primary" role="button">Leia mais</a></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo', 'descricao', 'link', 'imagem', 'alt','data', 'autor', 'sm', 'md'],

        filters:{
        formataData: function(valor){
          if(!valor) return '';
          valor = valor.toString();
          if(valor.split('-').length == 3){
            valor = valor.split('-');            
            return valor[2] + '/' + valor[1] + '/' + valor[0];
          }
          return valor;
        }
      }
    }
</script>