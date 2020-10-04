import Vue from 'vue'
import VueRouter from 'vue-router'
import Categories from '../pages/categories/Categories'
import CreateCategorie from '../pages/categories/CreateCategorie'
import UpdateCategorie from '../pages/categories/UpdateCategorie'
import Products from '../pages/products/Products'
import CreateProduct from '../pages/products/CreateProduct'
import UpdateProduct from '../pages/products/UpdateProduct'

Vue.use(VueRouter)

export const router = new VueRouter({
    routes: [
        {
          path: '/',
          name: 'products',
          component: Products
        },
        {
            path: '/create-product',
            name: 'create-product',
            component: CreateProduct
        },
        {
            path: '/categories',
            name: 'categories',
            component: Categories
        },
        {
            path: '/create-categorie',
            name: 'create-categorie',
            component: CreateCategorie
        },
        {
            path: '/update-categorie/:id',
            name: 'update-categorie',
            component: UpdateCategorie
        },
        {
            path: '/update-product/:id',
            name: 'update-product',
            component: UpdateProduct
        }
    ]
})