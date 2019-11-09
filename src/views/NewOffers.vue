<template>
    <div id="offers">
        <div class="component-description text-center jola-primary py-3 mb-5">Najnowsze oferty</div>
        <div class="component-description text-center jola-secondary py-3 mb-5">Świerzutkie oferty- zamów jako pierwszy</div>
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
            axios.get(`${API_ENTRY_POINT}/offers/new/6`).then(
                (response) => {
                    this.offers = response.data;
                }
            );
        }
    }
</script>

<style scoped>

</style>