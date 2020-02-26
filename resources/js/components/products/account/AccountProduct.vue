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
              <b-card-text>Info about acount. Alias. Balance. Account number, open date,</b-card-text>
            </b-tab>
            <b-tab title="OPTIONS">
              <b-card-text>Options. Cancel account. Transfer. Send money. See bills.</b-card-text>
            </b-tab>
          </b-tabs>
        </b-card>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  name: "Account",
  computed: {
    ...mapGetters({
      getAccount: "customeraccount/getAccount"
    }),
    accountId() {},
    account() {
      //return this.getAccount(this.accountId);
    }
  }
};
</script>
<style scoped>
</style>