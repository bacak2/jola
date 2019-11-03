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
                    open-delay="200"
                >
                    <v-card
                        :elevation="hover ? 16 : 2"
                        class="mx-auto"
                        height="350"

                    >
                        <v-card-text class="font-weight-medium mt-12 text-center subtitle-1">
                            Jola
                        </v-card-text>
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
                            class="mx-auto"
                            height="350"
                    >
                        <v-card-text class="font-weight-medium mt-12 text-center subtitle-1">
                            Tomek
                        </v-card-text>
                    </v-card>
                </v-hover>
            </v-col>
        </v-row>
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
                offers: [1, 2],
            }
        },
        created() {
            axios.get(`${API_ENTRY_POINT}/offers`).then(
                (response) => {
                    this.offers = response.data;
                }
            );
        }
    }
</script>

<style scoped>

</style>