<template>
    <div id="offers">
        <div class="component-description text-center black-pink py-3 mb-5">Oferty</div>
        <v-row>
            <v-col
                    cols="12"
                    sm="6"
            >
                <v-hover
                        v-slot:default="{ hover }"
                        close-delay="200"
                >
                    <v-card
                            :elevation="hover ? 16 : 2"
                            class="mx-auto black-pink"
                            min-height="350"
                    >
                        <v-card-text class="font-weight-medium mt-12 text-center subtitle-1">
                            <h1>Jola</h1>
                            <div>
                                Tutaj trzeba coś napisać co to są za oferty. Ale krótko, zwięźle ;)
                            </div>
                        </v-card-text>

                        <div
                                v-for="offer in jolasOffers"
                                :key="offer"
                                class="mx-1 mx-md-5 mb-5"
                        >
                            <offerListed :data="offer"/>
                        </div>

                        <div class="mx-5 pb-5">
                            <router-link to="/jola-offers">
                                <v-btn
                                        class="black-pink"
                                        style="width: 100%"
                                        elevation="5"
                                        large
                                >
                                    Więcej jej ofert...
                                </v-btn>
                            </router-link>
                        </div>
                    </v-card>
                </v-hover>
            </v-col>

            <v-col
                cols="12"
                sm="6"
            >
                <v-hover
                        v-slot:default="{ hover }"
                        close-delay="200"
                >
                    <v-card
                            :elevation="hover ? 16 : 2"
                            class="mx-auto pink-black"
                            min-height="350"
                    >
                        <v-card-text class="font-weight-medium mt-12 text-center subtitle-1">
                            <h1>Tomek</h1>
                            <div>
                                Tu też...
                            </div>
                        </v-card-text>

                        <div
                                v-for="offer in tomsOffers"
                                :key="offer"
                                class="mx-1 mx-md-5 mb-5"
                        >
                            <offerListed :data="offer"/>
                        </div>

                        <div class="mx-5 pb-5">
                            <router-link to="/toms-offers">
                                <v-btn
                                        class="black-pink"
                                        style="width: 100%"
                                        elevation="5"
                                        large
                                >
                                    Więcej jego ofert...
                                </v-btn>
                            </router-link>
                        </div>
                    </v-card>
                </v-hover>
            </v-col>
        </v-row>

    </div>
</template>

<script>
    import offerListed from '@/components/OfferListed.vue';
    import axios from 'axios';

    const API_ENTRY_POINT = 'http://localhost:8000';

    export default {
        name: "offers",
        components: {
            offerListed
        },
        data () {
            return {
                jolasOffers: [],
                tomsOffers: [],
            }
        },
        created() {
            axios.get(`${API_ENTRY_POINT}/offers/all/3/jola`).then(
                (response) => {
                    this.jolasOffers = response.data;
                }
            );

            axios.get(`${API_ENTRY_POINT}/offers/all/3/tomek`).then(
                (response) => {
                    this.tomsOffers = response.data;
                }
            );
        }
    }
</script>

<style scoped>

</style>