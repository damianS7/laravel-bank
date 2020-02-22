<template>
  <b-container>
    <b-row>
      <b-col>
        <product-selector
          v-if="wizard.step === 1"
          @selectProduct="selectProduct"
          :product="wizard.product"
        ></product-selector>
      </b-col>
    </b-row>
    <b-row>
      <b-col>
        <account-selector
          v-if="wizard.step === 2 && wizard.product ==='account'"
          @selectType="selectAccountType"
        ></account-selector>
        <card-selector v-if="wizard.step === 2 && wizard.product ==='card'"></card-selector>
      </b-col>
    </b-row>

    <b-row>
      <b-col>
        <account-selector
          v-if="wizard.step === 3 && wizard.product ==='account'"
          @confirm="getAccount"
        ></account-selector>
        <card-selector v-if="wizard.step === 2 && wizard.product ==='card'"></card-selector>
      </b-col>
    </b-row>

    <b-row class="text-right">
      <b-col cols="12">
        <b-button variant="primary" v-if="wizard.step > 1" @click="nextStep('-1')">Back</b-button>
        <b-button variant="primary" v-if="wizard.step !== 3" @click="nextStep('+1')">Next</b-button>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
import ProductSelector from "./wizard/ProductSelector";
import AccountSelect from "./wizard/AccountSelect";
import AccountSummary from "./wizard/AccountSummary";
import CardSelect from "./wizard/CardSelect";
import CardSummary from "./wizard/CardSummary";
export default {
  name: "ProductsContractWizard",
  data: function() {
    return {
      wizard: {
        step: 1,
        product: "",
        accountType: null, // savings/checking
        cardType: null, // VCC, Debit, Credit
        cardCompany: null // Masterdcard, VISA
      }
    };
  },
  methods: {
    nextStep(step) {
      console.log(this.wizard);
      if (step === "+1" && this.wizard.step < 3) {
        this.wizard.step += 1;
      }

      if (step === "-1" && this.wizard.step > 1) {
        this.wizard.step -= 1;
      }
      console.log(this.wizard);
    },
    selectProduct(product) {
      this.wizard.product = product;
      this.nextStep("+1");
    },
    selectAccountType(type) {
      console.log(type);
      this.wizard.accountType = type;
      this.nextStep("+1");
    },
    getAccount() {
      this.$store.dispatch("contractAccount", {
        vm: this,
        account: {
          product: this.wizard.product,
          type: this.wizard.accountType
        }
      });
    }
  },
  components: {
    "product-selector": ProductSelector,
    "card-selector": CardSelect,
    "account-selector": AccountSelect,
    "card-summary": CardSummary,
    "account-summary": AccountSummary
  }
};
</script>
<style scoped>
</style>