<template>
  <b-container>
    <b-row class="my-3">
      <b-col cols="12">
        <b-card class="text-center" body-class="p-0">
          <template v-slot:header>
            <h6 class="mb-0" v-b-toggle.accounts-collapse>Header Slot</h6>
          </template>

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
import Accounts from "./account/Accounts";
export default {
  name: "Products",
  components: {
    "user-accounts": Accounts
  }
};
</script>
<style scoped>
</style>