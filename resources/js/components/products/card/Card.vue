<template>
  <b-container>
    <b-row>
      <b-col cols="12">
        <h3>ACOUNT INFO HERE, BALANCE, ACC NUMBER. AND CARROUSEL TO NEXT ACCOUNT</h3>
      </b-col>
    </b-row>
    <b-row>
      <b-col cols="12">
        <b-card no-body>
          <b-tabs pills card>
            <b-tab title="HISTORY" active>
              <b-card-text>TABLE WITH PAGINATION TO LIST HISTORY</b-card-text>
            </b-tab>
            <b-tab title="INFO">
              <b-card-text>Card type(debit/credit), expire date(10/22), cashout limit per day, account associated</b-card-text>
            </b-tab>
            <b-tab title="OPTIONS">
              <b-card-text>PIN change/show, cancel card, bloq card, .</b-card-text>
            </b-tab>
          </b-tabs>
        </b-card>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  name: "Account",
  computed: {
    card() {
      return { id: 12 };
    }
  }
};
</script>
<style scoped>
</style>