<template>
  <b-container>
    <b-row>
      <b-col cols="12" sm="6">
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

          <b-button href="#" variant="primary" @click="selectProduct('account')">I want an account</b-button>
        </b-card>
      </b-col>
      <b-col cols="12" sm="6">
        <b-card
          title="Credit/Debit/VCC Cards"
          class="mb-2"
          img-src="https://picsum.photos/600/300/?image=25"
          img-alt="Image"
          img-top
        >
          <template v-slot:header>
            <h6 class="mb-0">
              <i class="nav-icon fa fa-credit-card"></i>
            </h6>
          </template>
          <b-card-text>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</b-card-text>

          <b-button href="#" variant="primary" @click="selectProduct('card')">I want a card</b-button>
        </b-card>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  name: "ProductSelector",
  props: {
    product: { type: String, required: true }
  },
  data: function() {
    return {};
  },
  methods: {
    selectProduct(product) {
      this.$emit("selectProduct", product);
    }
  }
};
</script>
<style scoped>
</style>