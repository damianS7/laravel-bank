<template>
  <b-table show-empty small stacked="md" striped hover :items="accounts" :fields="fields">
    <template v-slot:cell(alias)="row">
      <b-form-input
        @change="updateAlias"
        v-model="row.item.alias"
        placeholder="Edit to set an alias."
      ></b-form-input>
    </template>
    <template v-slot:cell(actions)>
      <b-dropdown variant="primary" size="sm" split text="Actions" class="m-2" right>
        <b-dropdown-item>
          <router-link to="/">Info</router-link>
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
    updateAlias() {
      console.log("change alias");
    }
  },
  computed: {
    ...mapGetters({
      accounts: "customeraccount/getAccounts"
    })
  }
};
</script>
<style scoped>
</style>