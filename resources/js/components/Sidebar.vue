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
                <i class="nav-icon fa fa-university"></i>
                Dashboard
              </router-link>
            </li>

            <li class="nav-item">
              <a
                href="#my-products-submenu"
                class="dropdown-toggle nav-link"
                data-toggle="collapse"
                aria-expanded="false"
              >
                <i class="nav-icon fa fa-wallet"></i>
                Products
              </a>
              <ul class="nav collapse" id="my-products-submenu">
                <li class="nav-item">
                  <router-link to="/products" class="nav-link" exact>
                    <i class="nav-icon fa fa-piggy-bank"></i>
                    My Products
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/products/accounts" class="nav-link">
                    <i class="nav-icon fa fa-money-check-alt"></i>
                    Accounts
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/products/cards" class="nav-link">
                    <i class="nav-icon fa fa-credit-card"></i>
                    Cards
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/products/contract" class="nav-link">
                    <i class="nav-icon fa fa-file-signature"></i>
                    Contract
                  </router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a
                href="#operations-submenu"
                class="dropdown-toggle nav-link"
                data-toggle="collapse"
                aria-expanded="false"
              >
                <i class="nav-icon fa fa-money-bill-wave"></i>
                Operations
              </a>
              <ul class="nav collapse" id="operations-submenu">
                <li class="nav-item">
                  <router-link to="/user/operations/send" class="nav-link">
                    <i class="nav-icon fa fa-exchange-alt"></i>
                    Send money
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/operations/transfer" class="nav-link">
                    <i class="nav-icon fa fa-sync"></i>
                    Transfers
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/operations/invoices" class="nav-link">
                    <i class="nav-icon fa fa-file-invoice-dollar"></i>
                    Invoice Payments
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/operations/activation" class="nav-link">
                    <i class="nav-icon fa fa-thumbs-up"></i>
                    Activate Card
                  </router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                Profile
              </a>
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
.user-panel {
  border-top: 1px solid black;
  border-bottom: 1px solid black;
}
</style>