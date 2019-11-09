<template>
    <div id="offers">
        <div class="component-description text-center tom-primary py-3 mb-5">Oferty Tomka</div>
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
    import axios from 'axios';
    import offerListed from '@/components/OfferListed.vue';

    const API_ENTRY_POINT = 'http://localhost:8000';

    export default {
        name: "offers",
        components: {
            offerListed
        },
        data () {
            return {
                offers: [],
            }
        },
        created() {
            axios.get(`${API_ENTRY_POINT}/offers/all/6/tomek`).then(
                (response) => {
                    this.offers = response.data;
                }
            );
        }
    }
</script>

<style scoped>

</style>