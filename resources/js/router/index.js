import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Dashboard from '../components/Dashboard.vue'
import ProductsRouter from '../components/products/ProductsRouter.vue'
import Products from '../components/products/Products.vue'
import ProductContractWizard from '../components/products/wizard/ProductContractWizard.vue'
import Accounts from '../components/products/account/Accounts.vue'
import Account from '../components/products/account/Account.vue'
import Cards from '../components/products/card/Cards.vue'
import Card from '../components/products/card/Card.vue'
import Transfer from '../components/operations/Transfer.vue'
import OperationsRouter from '../components/operations/OperationsRouter.vue'
import Profile from '../components/Profile.vue'


export default new VueRouter({
    linkActiveClass: "active",
    linkExactActiveClass: "active",
    routes: [
        {
            path: '/',
            component: Dashboard
        },
        {
            path: '/products', component: ProductsRouter,
            children: [
                {
                    path: '',
                    component: Products
                },
                {
                    path: 'accounts/:id',
                    component: Account,
                },
                {
                    path: 'cards/:id',
                    component: Card,
                },
                {
                    path: 'contract',
                    component: ProductContractWizard,
                },
            ]
        },
        {
            path: '/operations', component: OperationsRouter,
            children: [

                {
                    path: 'transfer',
                    component: Transfer,
                },

            ]
        },
        {
            path: '/profile',
            component: Profile
        },
    ]
})