<template>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Listagem de Produtos</a>
            </li>
            <li class="nav-item">
                <router-link class="nav-link active" to="/create-product">Novo Produto</router-link>
            </li>
        </ul>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody v-for="product in products">
            <tr>
                <th scope="row">{{product.id_product}}</th>
                <td>{{product.name}}</td>
                <td>{{product.description}}</td>
                <td>{{new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(product.price)}}</td>
                <td>{{product.categorie.name}}</td>
                <td>
                    <a class="secondary-content">
                        <i v-on:click="updateProduct(product)" class="btn btn-primary">
                            Editar
                        </i>
                    </a>
                    <a class="secondary-content">
                        <i v-on:click="deleteProduct(product)" class="btn btn-danger">
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
import store from '../../store'

export default {

    mounted() {
        store.dispatch('getProducts').then(() => {}).catch(error => {
            this.$snotify.error(error.response.data.error)
        })
    },

    computed: {
        products() {
            return store.state.products.products
        }
    },

    methods: {

        updateProduct(product) {
            this.$router.push({
                name: 'update-product',
                params: {
                    id: product.id_product
                }
            })
        },

        deleteProduct(product) {
            this.$snotify.confirm('Você deseja excluir o produto ' + product.name, {
                timeout: 5000,
                showProgressBar: true,
                closeOnClick: false,
                pauseOnHover: true,
                buttons: [{
                        text: 'Sim',
                        action: (toast) => {
                            store.dispatch('deleteProduct', product).then(response => {
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
    }
}
</script>
