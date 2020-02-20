<template>
  <b-container>
    <b-row class="my-3">
      <b-col cols="12">
        <b-card
          bg-variant="primary"
          text-variant="white"
          header="Accounts"
          class="text-center"
          v-b-toggle.accounts-collapse
        >
          <b-collapse id="accounts-collapse" visible>
            <b-card-text>
              <user-accounts></user-accounts>
            </b-card-text>
          </b-collapse>
        </b-card>
      </b-col>
    </b-row>
    <b-row class="my-3">
      <b-col cols="12">
        <b-card
          bg-variant="primary"
          text-variant="white"
          header="Cards"
          class="text-center"
          v-b-toggle.cards-collapse
        >
          <b-collapse id="cards-collapse" visible>
            <b-card-text>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</b-card-text>
          </b-collapse>
        </b-card>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
import Accounts from "./Accounts";
export default {
  name: "Products",
  components: {
    "user-accounts": Accounts
  }
};
</script>
<style scoped>
</style>