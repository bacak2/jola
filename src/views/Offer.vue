<template>
    <div id="offer">
        <h1>Oferta {{ $route.params.id }}</h1>
        <offerDetails />
    </div>
</template>

<script>
    import offerDetails from '@/components/OfferDetails.vue';

    export default {
        name: "offer",
        props: ['id'],
        components: {
            offerDetails
        },
    }
</script>

<style scoped>
 #offer {
     z-index: 10;
 }
</style>