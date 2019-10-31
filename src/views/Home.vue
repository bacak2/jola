<template>
    <div id="homeWrapper">
        <carousel />
        <div id="offers">
            <div class="component-description text-center black-pink py-3 mb-5">Najnowsze oferty</div>
            <offerListed />
            <offerListed />
            <offerListed />
            <offerListed />
            <offerListed />
        </div>
        <aboutUs />
        <div class="mb-4" style="height: 80px">
            <router-link to="/about">
                <v-btn
                    class="slideButton px-5 mt-4 float-right black-pink"
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
    import offerListed from '@/components/OfferListed.vue';
    import carousel from '@/components/Carousel.vue';
    import aboutUs from '@/components/AboutUs.vue';
    import offer from '@/components/OfferDetails.vue';

    export default {
        name: "home",
        components: {
            offerListed,
            carousel,
            aboutUs,
            offer
        },
    }
</script>

<style scoped>

</style>