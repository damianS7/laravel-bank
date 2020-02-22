
export default ({
    namespaced: true,
    state: {
        accounts: {}
    },
    getters: {

    },
    mutations: {
        // Asigna el usuario de la app
        SET_ACCOUNTS(state, accounts) {
            state.accounts = accounts;
        },
        ADD_ACCOUNT(state, account) {
            Vue.set(state.accounts, account.id, account);
        },
    },
    actions: {
        contractAccount(context, { vm, account }) {
            axios.post("/products/contract", {
                account
            }).then(function (response) {
                // Objeto recibido
                let newAccount = response.data.account;

                // Si la respuesta tuvo el codigo 200 y el objeto tiene id
                // Asumimos que es un objeto valido
                if (response.status == 200 && newAccount.hasOwnProperty("id")) {
                    context.commit("ADD_ACCOUNT", newAccount);
                    vm.showCreatedAccount(newAccount);
                    vm.makeToast("Product", "Your account has been created.", "success");
                }
            }).catch(function (error) {
                vm.makeToast("Product", "Something went wrong.", "danger");
            });
        },
    }
})
