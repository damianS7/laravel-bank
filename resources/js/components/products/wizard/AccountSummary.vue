<template>
  <b-container fluid>
    <b-row>LOADING TRANSITION ...</b-row>
    Imagen de un cheque con los datos
    {{ account.iban }}
  </b-container>
</template>
<script>
export default {
  name: "AccountSummary",
  props: {
    account: { required: true, type: Object }
  },
  data: function() {
    return {};
  }
};
</script>
<style scoped>
</style>