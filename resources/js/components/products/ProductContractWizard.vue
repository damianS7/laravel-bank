<template>
  <b-container>
    <b-row class="text-right my-3">
      <b-col cols="12">
        <b-button variant="primary" v-if="wizard.step > 1" @click="nextStep('-1')">Back</b-button>
        <b-button variant="primary" v-if="wizard.step < 3" @click="nextStep('+1')">Next</b-button>
        <b-button variant="primary" v-if="wizard.step === 3" @click="contractAccount">Confirm</b-button>
      </b-col>
    </b-row>
    <b-row>
      <b-col>
        <product-selector v-if="wizard.step === 1" @selectProduct="selectProduct" />
      </b-col>
    </b-row>
    <b-row>
      <b-col>
        <account-selector
          v-if="wizard.step === 2 && wizard.product ==='account'"
          @configAccount="configAccount"
        />
        <card-selector
          v-if="wizard.step === 2 && wizard.product ==='card'"
          @configCardd="configCard"
        />
      </b-col>
    </b-row>

    <b-row>
      <b-col>
        <account-summary
          v-if="wizard.step === 3 && wizard.product ==='account'"
          :account="account"
        />
        <card-summary v-if="wizard.step === 3 && wizard.product ==='card'" />
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
        product: ""
      },
      account: {
        type: null, // savings/checking
        currency: null
      },
      card: {
        type: null, // VCC, Debit, Credit
        company: null // Masterdcard, VISA
      }
    };
  },
  methods: {
    showCreatedAccount(account) {
      this.account = account;
      this.nextStep("+1");
    },
    makeToast(title, message, variant = "info") {
      this.$bvToast.toast(message, {
        title,
        autoHideDelay: 5000,
        variant,
        solid: true,
        toaster: "b-toaster-bottom-right",
        appendToast: true
      });
    },
    nextStep(step) {
      if (step === "+1" && this.wizard.step < 3) {
        this.wizard.step += 1;
      }

      if (step === "-1" && this.wizard.step > 1) {
        this.wizard.step -= 1;
      }
    },
    configAccount({ currency, type }) {
      this.account.currency = currency;
      this.account.type = type;
      this.nextStep("+1");
    },
    configCard({ currency, type }) {
      this.card.currency = currency;
      this.card.type = type;
      this.nextStep("+1");
    },
    selectProduct(product) {
      this.wizard.product = product;
      this.nextStep("+1");
    },
    contractAccount() {
      this.$store.dispatch("customeraccount/contractAccount", {
        vm: this,
        account: {
          product: this.wizard.product,
          type: this.account.type,
          currency: this.account.currency
        }
      });
    },
    contractCardd() {
      this.$store.dispatch("customeraccount/contractCard", {
        vm: this,
        card: {
          product: this.wizard.product,
          type: this.account.type
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