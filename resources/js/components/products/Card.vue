<template>
  <b-container fluid class="p-0 wrapper">Card #{{ card.id }}</b-container>
</template>
<script>
export default {
  name: "Card",
  computed: {
    card() {
      return { id: 1 };
    }
  }
};
</script>
<style scoped>
</style>