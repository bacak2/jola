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
        <v-row style="margin-left: -62px; width: 100%; height: 100%;">
            <v-col cols="6" class="px-0 py-0">
                <router-link to="jola-offers" style="float: right;">
                    <div class="jola-primary py-3 pr-4" style="height: 100%; margin-left: 62px;">
                        <v-icon class="jola-primary">face</v-icon>
                        Jola
                    </div>
                </router-link>
            </v-col>
            <v-col cols="6" class="px-0 py-0">
                <router-link to="toms-offers">
                    <div class="tom-primary py-3 pl-4" style="height: 100%;">
                        Tomek
                        <v-icon class="tom-primary">sentiment_satisfied_alt</v-icon>
                    </div>
                </router-link>
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
    color: #006030 !important;
    background-color: #eeeeee !important;
  }

  .jola-primary {
    color: #eeeeee !important;
    background-color: #006030 !important;
  }

  .tom-primary {
    color: #eeeeee !important;
    background-color: #724f11 !important;
  }

  .tom-secondary {
    color: #724f11 !important;
    background-color: #eeeeee !important;
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

  @media (max-width: 465px) {
      .footer-link, .footer-link > button {
          width: 100%;
      }
  }
</style>