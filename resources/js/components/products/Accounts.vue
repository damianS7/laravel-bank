<template>
  <b-container fluid>
    <b-table striped hover :items="accounts" :fields="fields">
      <template v-slot:cell(actions)="row">
        <b-dropdown id="dropdown-1" text="Actions" class="m-md-2">
          <b-dropdown-item>First Action {{row }}</b-dropdown-item>
          <b-dropdown-item>Second Action</b-dropdown-item>
          <b-dropdown-item>Third Action</b-dropdown-item>
        </b-dropdown>
      </template>
    </b-table>
  </b-container>
</template>
<script>
export default {
  name: "Accounts",
  data: function() {
    return {
      fields: [
        {
          key: "name",
          label: "Name",
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
        { key: "actions", label: "Actions" }
      ],
      accounts: [
        { id: 0, name: "Account 1", balance: 471.33, currency: "$" },
        { id: 1, name: "Account 2", balance: 141.22, currency: "EUR" }
      ]
    };
  }
};
</script>
<style scoped>
</style>