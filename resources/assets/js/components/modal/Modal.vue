<template>
  <div class="modal fade " v-bind:id="nome" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{nome | capitalize}}</h4>
        </div>
        <div class="modal-body">
          <slot></slot>
        </div>
        <div class="modal-footer">
          <slot name="botoes"></slot>
          <button v-if="nome === 'deletar'" type="button" @click="deleteData($store.state.item.id, api)" class="btn btn-danger" data-dismiss="modal">Remover</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props:['id','nome','api'],

    filters: {
      capitalize: function (value) {
        if (!value) return ''
        value = value.toString()
        return value.charAt(0).toUpperCase() + value.slice(1)
      }
    },

     methods:{
        deleteData: function(id, api) {
          axios.delete('../api/'+api+'/' + id)
          .then(window.location.href='/admin/'+api)
          .catch((err) => {
            console.log(err)
          })
        }
    }
  } 
</script>