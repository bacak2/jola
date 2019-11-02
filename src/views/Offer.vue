<template>
    <div id="offer">
        <offerDetails :data="offer"/>
    </div>
</template>

<script>
    import axios from 'axios';
    import offerDetails from '@/components/OfferDetails.vue';

    const API_ENTRY_POINT = 'http://localhost:8000';

    export default {
        name: "offer",
        props: ['id'],
        components: {
            offerDetails
        },
        data () {
            return {
                offer: [],
            }
        },
        created() {
            axios.get(`${API_ENTRY_POINT}/offer/${this.$route.params.id}`).then(
                (response) => {
                    this.offer = response.data;
                }
            );
        },
    }
</script>

<style scoped>
 #offer {
     z-index: 10;
 }
</style>