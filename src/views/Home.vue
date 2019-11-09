<template>
    <div id="homeWrapper">
        <carousel />
        <div id="offers">
            <div class="component-description text-center jola-primary py-3 mb-5">Najnowsze oferty</div>
            <v-row>
                <v-col
                    cols="12"
                    sm="4"
                    v-for="offer in offers"
                    :key="offer"
                >
                    <offerListed :data="offer"/>
                </v-col>
            </v-row>
        </div>
        <div class="mb-4" style="height: 80px">
            <router-link to="/new-offers">
                <v-btn
                        class="slideButton px-5 mt-4 float-right jola-primary"
                        elevation="20"
                        large
                >
                    Więcej...
                </v-btn>
            </router-link>
        </div>
        <aboutUs />
        <div class="mb-4" style="height: 80px">
            <router-link to="/about">
                <v-btn
                    class="slideButton px-5 mt-4 float-right jola-primary"
                    elevation="20"
                    large
                >
                    Więcej...
                </v-btn>
            </router-link>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import offerListed from '@/components/OfferListed.vue';
    import carousel from '@/components/Carousel.vue';
    import aboutUs from '@/components/AboutUs.vue';

    const API_ENTRY_POINT = 'http://localhost:8000';

    export default {
        name: "home",
        components: {
            offerListed,
            carousel,
            aboutUs
        },
        data () {
            return {
                offers: [],
            }
        },
        created() {
            axios.get(`${API_ENTRY_POINT}/offers/new/3`).then(
                (response) => {
                    this.offers = response.data;
                }
            );
        }
    }
</script>

<style scoped>

</style>