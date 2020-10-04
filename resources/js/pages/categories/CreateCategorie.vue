<template>
<div class="card">
    <div class="card-header">Nova Categoria</div>
    <div class="card-body">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" v-model="categorie.name">
            <div class="alert alert-danger" v-if="errors.name">
                <div v-for="error in errors.name">
                    {{ error }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <button v-on:click="createCategorie()" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
        </div>
    </div>
</div>
</template>

<script>
import store from "../../store"

export default {

    data() {
        return {
            categorie: {
                name: ''
            },
            errors: {}
        }
    },

    methods: {
        createCategorie() {
            store.dispatch('createCategorie', this.categorie).then(response => {
                this.$snotify.success(response.success)
                this.$router.back()
            }).catch(error => {
                this.errors = error.response.data.errors
            });
        }
    }
}
</script>
