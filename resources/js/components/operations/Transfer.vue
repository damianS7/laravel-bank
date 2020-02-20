<template>
  <b-container fluid class="p-0 wrapper">
    <b-card
      bg-variant="primary"
      text-variant="white"
      header="Accounts ALIAS"
      class="text-center"
      v-b-toggle.accounts-collapse
    >
      <b-collapse id="accounts-collapse" visible>
        <b-card-text>input</b-card-text>
      </b-collapse>
    </b-card>>>>
    <b-card
      bg-variant="primary"
      text-variant="white"
      header="Accounts ALIAS"
      class="text-center"
      v-b-toggle.accounts-collapse
    >
      <b-collapse id="accounts-collapse" visible>
        <b-card-text>input</b-card-text>
      </b-collapse>
    </b-card>
  </b-container>
</template>
<script>
export default {
  name: "Account"
};
</script>
<style scoped>
</style>