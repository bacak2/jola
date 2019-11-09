<template>
    <div id="offerWrapper">
        <carousel :data="data.images"/>
        <h1 :class="secondCssClass">{{ data.offer.name }}</h1>
        <h2 :class="secondCssClass">{{ data.offer.location }}</h2>
        <v-expansion-panels
            v-model="openPanelOnLoad"
            class="mt-4"
        >
            <v-expansion-panel
                v-for="(detail, i) in data.details"
                :key="i"
                :class="[i%2 ? firstCssClass : secondCssClass]"
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
        <contactFixed :data="data" :firstCssClass="firstCssClass" :secondCssClass="secondCssClass"/>
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
        },
        computed: {
            firstCssClass () {
                if (this.data.offer.owner === 'jola') {
                    return 'jola-primary';
                } else {
                    return 'tom-primary';
                }
            },

            secondCssClass () {
                if (this.data.offer.owner === 'jola') {
                    return 'jola-secondary';
                } else {
                    return 'tom-secondary';
                }
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