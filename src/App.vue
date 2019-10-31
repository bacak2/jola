<template>
  <v-app id="appWrapper" class="pink-black">
    <v-navigation-drawer
            v-model="drawer"
            class="pink-black"
            app
            clipped
    >
      <v-list dense>
        <router-link
                v-for="item in items"
                :key="item.text"
                :to="item.href"
        >
          <v-list-item>
            <v-list-item-action>
              <v-icon class="pink-black">{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                <p class="pink-black">{{ item.text }}</p>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </router-link>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
            class="pink-black"
            app
            clipped-left
            dense
    >
      <v-app-bar-nav-icon class="pink-black" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <router-link to="/">
        <v-btn text class="my-2 mx-4 pink-black">
          <v-icon class="mx-4">trending_up</v-icon>
          JolaTomek
        </v-btn>
      </router-link>
      <div class="flex-grow-1"></div>
    </v-app-bar>

      <v-content>
          <v-container>
              <router-view></router-view>
          </v-container>
      </v-content>

    <v-footer
            class="black-pink"
            padless
    >
      <v-row
              justify="center"
              style="margin: 40px 0;"
      >
        <router-link to="/">
          <v-btn text rounded class="my-2 mx-4 pink-black">Strona główna</v-btn>
        </router-link>
        <router-link to="/about">
          <v-btn text rounded class="my-2 mx-4 pink-black">O nas</v-btn>
        </router-link>
        <router-link to="/offers">
          <v-btn text rounded class="my-2 mx-4 pink-black">Oferty</v-btn>
        </router-link>

        <v-col
          class="pink-black py-4 text-center"
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
        { icon: 'featured_play_list', text: 'O nas', href: '/about' },
        { icon: 'trending_up', text: 'Gorące oferty', href: '/offers' },
      ]
    }),
    created () {
      //this.$vuetify.theme.dark = true
    },
  }
</script>

<style>
  .pink-black {
    color: #fab !important;
    background-color: #18314c !important;
  }

  .black-pink {
    color: #18314c !important;
    background-color: #fab !important;
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
</style>