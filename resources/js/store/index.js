import Vuex from "vuex"
import Vue from "vue"

// Modules
import appuser from "./modules/app-user"

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        appuser
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
                context.commit("SET_READY", true);
            });
        },
        contractAccocunt(context, { vm, account }) {
            axios.post("/products/contract", {
                account
            }).then(function (response) {
                // Objeto recibido
                let newAccount = response.data.account;

                // Si la respuesta tuvo el codigo 200 y el objeto tiene id
                // Asumimos que es un objeto valido
                if (response.status == 200 && newAccount.hasOwnProperty("id")) {
                    //context.commit("ADD_ITEM", newItem);
                    vm.makeToast("Product", newAccount.iban + " has been added.", "success");
                }
            }).catch(function (error) {
                vm.makeToast("Product", "Something went wrong.", "danger");
            });
        },

    }
})
