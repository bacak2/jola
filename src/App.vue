<template>
  <v-app id="appWrapper" class="jola-secondary">
    <v-navigation-drawer
      v-model="drawer"
      class="jola-primary"
      fixed
      temporary
    >
      <v-list dense>
        <router-link
                v-for="item in items"
                :key="item.text"
                :to="item.href"
        >
          <v-list-item>
            <v-list-item-action>
              <v-icon class="jola-primary">{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                <p class="jola-primary mb-0">{{ item.text }}</p>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </router-link>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
            class="jola-primary"
            app
            clipped-left
            dense
    >
        <v-app-bar-nav-icon class="jola-primary" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-row style="margin-left: -62px; width: 100%; height: 100%;" justify="center" align="center">
          <v-col cols="2" class="px-0 py-0"></v-col>
            <v-col cols="8" class="px-0 py-0 mt-1" align="center" justify="center">
                <router-link to="/" class="jola-primary">
                  <v-icon class="jola-primary mb-1">face</v-icon>
                  <span class="mt-2">JolaTomek</span>
                  <v-icon class="jola-primary mb-1">sentiment_satisfied_alt</v-icon>
                </router-link>
            </v-col>
            <v-col cols="2" class="px-0 py-0">
              <a href="https://facebook.com" class="mr-2">
                <v-icon class="jola-primary">fab fa-facebook-square</v-icon>
              </a>
              <a href="https://facebook.com" class="mr-2">
                <v-icon class="jola-primary">fab fa-instagram-square</v-icon>
              </a>
              <a href="https://facebook.com">
                <v-icon class="jola-primary">fab fa-pinterest-square</v-icon>
              </a>
            </v-col>
        </v-row>
    </v-app-bar>

      <v-content>
          <v-container>
              <router-view></router-view>
          </v-container>
      </v-content>

    <v-footer
            class="jola-primary"
            padless
    >
      <v-row
              justify="center"
              style="margin: 40px 0;"
      >
        <router-link to="/" class="px-4 footer-link">
          <v-btn rounded outlined class="my-2 tom-secondary">Strona główna</v-btn>
        </router-link>
        <router-link to="/about" class="px-4 footer-link">
          <v-btn rounded outlined class="my-2 tom-secondary">O nas</v-btn>
        </router-link>
        <router-link to="/offers" class="px-4 footer-link">
          <v-btn rounded outlined class="my-2 tom-secondary">Oferty</v-btn>
        </router-link>
        <a href="https://facebook.com" class="mr-2 mt-3">
          <v-icon class="jola-primary">fab fa-facebook-square</v-icon>
        </a>
        <a href="https://facebook.com" class="mr-2 mt-3">
          <v-icon class="jola-primary">fab fa-instagram-square</v-icon>
        </a>
        <a href="https://facebook.com" class="mt-3">
          <v-icon class="jola-primary">fab fa-pinterest-square</v-icon>
        </a>


        <v-col
          class="tom-secondary py-4 text-center"
          cols="12"
          style="margin: 40px 0;"
        >
          {{ new Date().getFullYear() }} — <strong>JolaTomek</strong>
        </v-col>
      </v-row>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: false,
      items: [
        { icon: 'supervisor_account', text: 'O nas', href: '/about' },
        { icon: 'view_list', text: 'Wszystkie oferty', href: '/offers' },
        { icon: 'whatshot', text: 'Gorące oferty', href: '/hot-offers' },
        { icon: 'new_releases', text: 'Najnowsze oferty', href: '/new-offers' },
      ]
    }),
    created () {
      //this.$vuetify.theme.dark = true
    },
  }
</script>

<style>
  .jola-secondary {
    color: #00a8bb !important;
    background-color: #e6e6e6 !important;
    text-shadow: none;
  }

  .jola-primary {
    color: #ff732f !important;
    background-color: #00a8bb !important;
    text-shadow: #c14a02 1px 1px;
  }

  .tom-primary {
    color: #e6e6e6 !important;
    background-color: #00a8bb !important;
  }

  .tom-secondary {
    color: #827f7b !important;
    background-color: #eeeeee !important;
    text-shadow: #a4a4a4 1px 1px;
  }

  #offers {
    width: 100%;
  }

  .component-description {
    font-size: 30px;
    font-weight: bold;
  }

  a {
    text-decoration: none;
  }

  .v-toolbar__content {
       padding-right: 0 !important;
   }

  header {
      min-height: 50px !important;
  }

  .moreButton {
    color: #00a8bb !important;
    background-color: #ff732f !important;
    text-shadow: #c14a02 1px 1px;
  }

  @media (max-width: 465px) {
      .footer-link, .footer-link > button {
          width: 100%;
      }
  }
</style>