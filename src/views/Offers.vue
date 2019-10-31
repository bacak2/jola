<template>
    <div id="offers">
        <div class="component-description text-center black-pink py-3 mb-5">Gorące oferty</div>
        <div class="component-description text-center pink-black py-3 mb-5">Spiesz się, bo znikną ;)</div>
        <offerListed />
        <offerListed />
        <offerListed />
        <offerListed />
        <offerListed />
    </div>
</template>

<script>
    import offerListed from '@/components/OfferListed.vue';

    export default {
        name: "offers",
        components: {
            offerListed
        },
    }
</script>

<style scoped>

</style>