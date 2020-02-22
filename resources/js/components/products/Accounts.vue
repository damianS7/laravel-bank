<template>
  <b-table show-empty small stacked="md" striped hover :items="accounts" :fields="fields">
    <template v-slot:cell(alias)="row">
      <b-form-input>
        <input type="text" @change="changeAlias" :value="row.item.alias" />
      </b-form-input>
    </template>
    <template v-slot:cell(actions)>
      <b-dropdown variant="primary" split text="Actions" class="m-2" right>
        <b-dropdown-item>History</b-dropdown-item>
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
    changeAlias() {
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