<template>
  <b-container fluid class="p-0 wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <sidebar></sidebar>
    </nav>

    <div id="content">
      <nav class="navbar navbar-expand-md navbar-light bg-secondary">
        <div class="container-fluid">
          <button @click="switchSidebar" type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
          </button>
          <button
            class="btn btn-dark d-inline-block d-lg-none ml-auto"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-align-justify"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Page</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <b-container class="my-3">
        <router-view />
      </b-container>
    </div>
  </b-container>
</template>
<script>
import Sidebar from "./Sidebar";
export default {
  name: "BankApp",
  data: function() {
    return {
      sidebarActive: false
    };
  },
  components: {
    sidebar: Sidebar
  },
  methods: {
    logout() {
      return this.$store.dispatch("appuser/logout");
    },
    switchSidebar() {
      let sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("active");
    }
  },
  beforeCreate() {
    this.$store.dispatch("fetchData");
  }
};
</script>
<style scoped>
</style>
