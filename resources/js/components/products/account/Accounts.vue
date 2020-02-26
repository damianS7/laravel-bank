<template>
  <b-table show-empty small stacked="md" striped hover :items="accounts" :fields="fields">
    <template v-slot:cell(alias)="row">
      <b-form-input
        @change="updateAlias(row.item.id)"
        v-model="row.item.alias"
        placeholder="Edit to set an alias."
      ></b-form-input>
    </template>
    <template v-slot:cell(actions)="row">
      <b-dropdown variant="primary" size="sm" split text="Actions" class="m-2" right>
        <b-dropdown-item>
          <router-link :to="{ path: '/products/accounts/' + row.item.id}">Info</router-link>
        </b-dropdown-item>
        <b-dropdown-item>
          <router-link to="/">History</router-link>
        </b-dropdown-item>
        <b-dropdown-item>Cancel account</b-dropdown-item>
        <b-dropdown-item>Block account</b-dropdown-item>
      </b-dropdown>
    </template>
  </b-table>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  name: "Accounts",
  data: function() {
    return {
      fields: [
        {
          key: "alias",
          label: "Alias",
          sortable: true,
          sortDirection: "desc"
        },
        {
          key: "account.iban",
          label: "IBAN",
          sortable: true,
          sortDirection: "desc"
        },
        {
          key: "balance",
          label: "Balance",
          sortable: true,
          class: "text-center"
        },
        {
          key: "currency",
          label: "Currency",
          sortable: true,
          class: "text-center"
        },
        {
          key: "type",
          label: "Type",
          sortable: true,
          class: "text-center"
        },
        {
          key: "actions",
          label: "Actions",
          class: "text-center"
        }
      ]
    };
  },
  methods: {
    makeToast(title, message, variant = "info") {
      this.$bvToast.toast(message, {
        title,
        autoHideDelay: 5000,
        variant,
        solid: true,
        toaster: "b-toaster-bottom-right",
        appendToast: true
      });
    },
    updateAlias(accountId) {
      let account = this.getAccount(accountId);
      this.$store.dispatch("customeraccount/updateAccount", {
        vm: this,
        account
      });
    }
  },
  computed: {
    ...mapGetters({
      accounts: "customeraccount/getAccounts",
      getAccount: "customeraccount/getAccount"
    })
  }
};
</script>
<style scoped>
</style>