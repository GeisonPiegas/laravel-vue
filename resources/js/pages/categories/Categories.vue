<template>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Listagem de Categorias</a>
            </li>
            <li class="nav-item">
                <router-link class="nav-link active" to="/create-categorie">Nova Categoria</router-link>
            </li>
        </ul>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody v-for="categorie in categories">
            <tr>
                <th scope="row">{{categorie.id_categorie}}</th>
                <td>{{categorie.name}}</td>
                <td>
                    <a class="secondary-content">
                        <i v-on:click="updateCategorie(categorie)" class="btn btn-primary">
                            Editar
                        </i>
                    </a>
                    <a class="secondary-content">
                        <i v-on:click="deleteCategorie(categorie)" class="btn btn-danger">
                            Excluir
                        </i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
import store from '../../store';

export default {

    data() {
        return {

        }
    },

    mounted() {
        store.dispatch('getCategories').then(() => {}).catch(error => {
            this.$snotify.error(error.response.data.error)
        })
    },

    computed: {
        categories() {
            return store.state.categories.categories
        }
    },

    methods: {

        updateCategorie(categorie) {
            this.$router.push({
                name: 'update-categorie',
                params: {
                    id: categorie.id_categorie
                }
            })
        },

        deleteCategorie(categorie) {
            this.$snotify.confirm('Você deseja excluir a categoria ' + categorie.name, {
                timeout: 5000,
                showProgressBar: true,
                closeOnClick: false,
                pauseOnHover: true,
                buttons: [{
                        text: 'Sim',
                        action: (toast) => {
                            store.dispatch('deleteCategorie', categorie).then(response => {
                                    this.$snotify.success(response.success)
                                }).catch(error => {
                                    this.$snotify.error(error.response.data.error)
                                }),
                                this.$snotify.remove(toast.id)
                        },
                        bold: false
                    },
                    {
                        text: 'Não',
                        action: (toast) => this.$snotify.remove(toast.id)
                    },
                ]
            });

        },

    },

}
</script>
