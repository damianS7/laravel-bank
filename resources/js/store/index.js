import Vuex from "vuex"
import Vue from "vue"

// Modules
import appuser from "./modules/app-user"
import customeraccount from "./modules/customer-account"

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        appuser, customeraccount
    },
    state: {
        ready: false
    },
    getters: {
        appReady: (state, getters) => {
            return state.ready;
        },
    },
    mutations: {
        SET_READY(state, ready) {
            state.ready = ready;
        },
    },
    actions: {
        // Este metodo realiza una peticion al backend y recibe los datos
        // necesarios para inicializar la aplicacion
        fetchData(context) {
            axios.get("/bank/fetch").then(function (response) {
                context.commit("appuser/SET_USER", response.data.app_user);
                context.commit("customeraccount/SET_ACCOUNTS", response.data.accounts);
                context.commit("SET_READY", true);
            });
        },
    }
})
