<template>
    <div id="about">
        <aboutUs />

        <p class="black-pink py-5">
            Coś więcej niż na stronie głównej...
        </p>
        <p class="pink-black">
            Coś więcej niż na stronie głównej...
        </p>
        <p class="black-pink py-5">
            Coś więcej niż na stronie głównej...
        </p>
    </div>
</template>

<script>
    import aboutUs from '@/components/AboutUs.vue';
    import offer from '@/components/OfferDetails.vue';

    export default {
        name: "about",
        components: {
            aboutUs,
            offer
        },
    }
</script>

<style scoped>

</style>