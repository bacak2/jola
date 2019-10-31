<template>
    <div id="offerWrapper">
        <carousel />
        <v-expansion-panels>
            <v-expansion-panel
                v-for="(item,i) in 5"
                :key="i"
                :class="[i%2 ? 'black-pink' : 'pink-black']"
                multiple="[]"
            >
                <v-expansion-panel-header>Item</v-expansion-panel-header>
                <v-expansion-panel-content
                        inset
                        mandatory
                        popout
                >
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </v-expansion-panel-content>
            </v-expansion-panel>
        </v-expansion-panels>
        <contactFixed />
    </div>
</template>

<script>
    import carousel from '@/components/Carousel.vue';
    import contactFixed from '@/components/ContactFixed.vue';

    export default {
        name: "OfferDetails",
        components: {
            carousel,
            contactFixed
        }
    }
</script>

<style scoped>
    #offerWrapper {
        width: 100%;
    }

    #contactWrapper {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1;
    }
</style>