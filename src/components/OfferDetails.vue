<template>
    <div id="offerWrapper">
        <carousel :data="data.images"/>
        <h1>{{ data.offer.name }}</h1>
        <h2 class="mb-4">{{ data.offer.location }}</h2>
        <v-expansion-panels
            v-model="openPanelOnLoad"
        >
            <v-expansion-panel
                v-for="(detail, i) in data.details"
                :key="i"
                :class="[i%2 ? 'black-pink' : 'pink-black']"
            >
                <v-expansion-panel-header>
                    {{ detail.description_title }}
                </v-expansion-panel-header>
                <v-expansion-panel-content
                        inset
                        mandatory
                        popout
                >
                    {{ detail.description }}
                </v-expansion-panel-content>
            </v-expansion-panel>
        </v-expansion-panels>
        <contactFixed :data="data"/>
    </div>
</template>

<script>
    import carousel from '@/components/CarouselSimple.vue';
    import contactFixed from '@/components/ContactFixed.vue';

    export default {
        name: "OfferDetails",
        props: ['data'],
        components: {
            carousel,
            contactFixed
        },
        data () {
            return {
                openPanelOnLoad: 0,
            }
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