<template>
  <b-container class="p-0">
    <b-row class="sidebar-header">
      <b-col class="brand-link">
        <h3>Bootstrap Sidebar</h3>
      </b-col>
    </b-row>

    <b-row class="user-panel m-0">
      <b-col cols="8" class="pull-left info">
        <p>
          <router-link to="/profile" class="nav-link">DAMIANS7</router-link>
        </p>
      </b-col>
      <b-col cols="4" class="pull-left image">
        <img v-if="avatarPath" :src="avatarPath" class="img-circle" alt="User Image" />
      </b-col>
    </b-row>

    <!-- Sidebar -->
    <b-row class="sidebar m-0">
      <b-col class="p-2">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <li class="nav-item">
              <router-link to="/" class="nav-link" exact>
                <i class="nav-icon fa fa-tachometer-alt"></i>
                Dashboard
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/account" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                Account
              </router-link>
            </li>

            <li class="nav-item has-treeview">
              <a
                href="#pageSubmenuXXX"
                class="dropdown-toggle nav-link"
                data-toggle="collapse"
                aria-expanded="false"
              >
                <i class="nav-icon fa fa-calendar-alt"></i>
                Reservations
              </a>
              <ul class="nav collapse" id="pageSubmenuXXX">
                <li class="nav-item">
                  <router-link to="/reservation/wizard" class="nav-link">
                    <i class="nav-icon fa fa-hat-wizard"></i>
                    Reservation Wizard
                  </router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" @click.prevent="logout()" class="nav-link">
                <i class="nav-icon fa fa-sign-out-alt"></i>
                Logout
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </b-col>
    </b-row>
    <!-- /.sidebar -->
  </b-container>
</template>
<script>
import { mapGetters, mapState, mapActions } from "vuex";
export default {
  name: "Sidebar",
  methods: {
    logout() {
      return this.$store.dispatch("appuser/logout");
    }
  },
  computed: {
    ...mapGetters({
      isAdmin: "appuser/isAdmin",
      isRecepcionist: "appuser/isAdmin",
      isManager: "appuser/isAdmin",
      countPendingInvoices: "appuser/isAdmin",
      setting: "appuser/isAdmin2",
      inventory: "appuser/isAdmin2",
      appReady: "appuser/isAdmin"
    }),
    ...mapState({
      appUser: state => state.appuser.appUser
    }),
    avatarPath() {},
    hasLowStock() {
      return false;
    }
  }
};
</script>
<style scoped>
</style>