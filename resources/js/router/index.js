import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//import Dashboard from '../components/Dashboard.vue'
import Account from '../components/Account.vue'
//import About from '../components/About.vue'
//import Settings from '../components/Settings.vue'


export default new VueRouter({
    routes: [
        {
            path: '/account',
            component: Account
        },
    ]
})