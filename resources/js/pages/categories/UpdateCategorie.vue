<template>
<div class="card">
    <div class="card-header">Editar Categoria</div>
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
            <button v-on:click="updateCategorie()" class="btn btn-primary btn-lg btn-block">Salvar</button>
        </div>
    </div>
</div>
</template>

<script>
import store from "../../store"

export default {

    data() {
        return {
            errors: {}
        }
    },

    computed: {
        categorie() {
            return store.getters.getCategorie(this.$route.params.id)
        }
    },

    methods: {
        updateCategorie() {
            store.dispatch('updateCategorie', this.categorie).then(response => {
                this.$snotify.success(response.success)
                this.$router.back()
            }).catch(error => {
                this.errors = error.response.data.errors
            })
        }
    },
}
</script>
