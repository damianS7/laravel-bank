<template>
  <b-container>
    <b-row>
      <b-col cols="12">
        <div id="account">
          <div class="accrow account-owner">Owner: DAVID MORGANSON</div>

          <div class="accrow account-owner">Address: ASDASDSAAS</div>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  name: "AccountInfo"
};
</script>
<style scoped>
#account {
  border: 1px solid black;
  padding: 5px;
  background-color: aquamarine;
}
.account-owner {
  font-size: 1.3 rem;
  margin-bottom: 12px;
}
.accrow {
  border-bottom: 1px solid black;
}
</style>