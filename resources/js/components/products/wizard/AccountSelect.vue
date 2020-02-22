<template>
  <b-container>
    <b-row>
      <b-col cols="12">
        <b-card
          title="Bank account"
          img-src="https://picsum.photos/600/300/?image=25"
          img-alt="Image"
          img-top
          class="mb-2"
        >
          <b-card-text>
            Lorem Ipsum is simply dummy text of the printing
            and typesetting industry. Lorem Ipsum has been the industry's
            standard dummy text ever since the 1500s, when an unknown
            printer took a galley of type and scrambled it to make a
            type specimen book. It has survived not only five centuries,
            but also the leap into electronic typesetting, remaining
            essentially unchanged. It was popularised in the 1960s
            with the release of Letraset sheets containing
            Lorem Ipsum passages, and more recently with desktop
            publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.
          </b-card-text>
          <b-form-select v-model="type" :options="typeOptions"></b-form-select>
          <b-form-select v-model="currency" :options="currencyOptions"></b-form-select>
          <b-button href="#" variant="primary" @click="configAccount">I want this type</b-button>
        </b-card>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  name: "AccountSelect",
  props: {},
  data: function() {
    return {
      type: "savings",
      currency: "eur",
      typeOptions: { savings: "Savings", checking: "Checking" },
      currencyOptions: { eur: "EUR", usd: "USD" }
    };
  },
  methods: {
    configAccount() {
      //this.$emit("setType", this.type);
      //this.$emit("setCurrency", this.currency);
      this.$emit("configAccount", {
        currency: this.currency,
        type: this.type
      });
    }
  }
};
</script>
<style scoped>
</style>