<template>
    <div id="offerListedWrapper">
        <v-card
            class="pink-black"
        >
            <v-img
                :src="image"
                :aspect-ratio="16/9"
            >

            </v-img>
            <v-card-title>
                <div class="display-1 mb-2">Śladami Gry o Tron</div>
                <div class="title">Dubrovnik, Chorwacja</div>
            </v-card-title>

            <v-divider class="mt-6 mx-4"></v-divider>

            <v-card-text>
                <v-chip
                    class="ma-2 pink-black pink-border"
                    label
                    outlined
                >
                    <v-icon class="pink-black mr-2">history</v-icon>
                    Imprezki
                </v-chip>
            </v-card-text>

            <router-link to="/offer/12">
                <v-btn class="black-pink ml-3 mb-3">Szczegóły oferty...</v-btn>
            </router-link>
        </v-card>
    </div>
</template>

<script>
    export default {
        name: "OfferListed",
        data () {
            return {
                image: require('@/assets/img/dubrovnik/dubrovnik1.jpg'),
            }
        }
    }
</script>

<style scoped>
    #offerListedWrapper {
        width: 30%;
        margin: 0 10px 10px 10px;
        min-width: 200px;
        display: inline-block;
    }

    @media (max-width: 465px) {
        #offerListedWrapper {
            width: 100%;
            margin: 10px 0;
        }
    }

    .pink-border {
        border-color: #fab;
    }
</style>