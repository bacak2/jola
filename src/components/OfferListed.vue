<template>
    <div id="offerListedWrapper">
        <v-card
            class="pink-black"
        >
            <v-img
                    :src="`http://localhost:8000/img/${data.image}`"
                    :aspect-ratio="16/9"
            ></v-img>
            <v-card-title>
                <div class="display-1 mb-2">{{ data.name }}</div>
            </v-card-title>
            <div class="title mx-4">{{ data.location }}</div>
            <v-divider class="mt-6 mx-4"></v-divider>

            <v-card-text>
                <v-slide-group multiple show-arrows>
                    <v-slide-item
                            v-for="tag in data.tags"
                            :key="tag.id"
                            v-slot:default="{ active, toggle }"
                    >
                        <v-chip
                                class="ma-2"
                                label
                                outlined
                        >
                            <v-icon class="mr-2">{{ tag.icon }}</v-icon>
                            {{ tag.title }}
                        </v-chip>
                    </v-slide-item>
                </v-slide-group>
            </v-card-text>

            <router-link :to="`/offer/${data.id}`">
                <v-btn class="black-pink ml-3 mb-3">Szczegóły oferty...</v-btn>
            </router-link>

            <v-bottom-sheet v-model="sheet" inset>
                <template v-slot:activator="{ on }">
                    <v-btn v-on="on" class="pink-black mb-3 ml-2 ml-md-5 px-1">
                        <v-icon class="">date_range</v-icon>
                        Terminy
                    </v-btn>
                </template>
                <v-sheet class="text-center" min-height="300px">
                    <v-btn
                        class="mt-6"
                        text
                        color="error"
                        @click="sheet = !sheet"
                    >Zamknij</v-btn>
                    <div class="my-3">
                        <span class="mb-4">Oferta jest dostępna w terminach:</span>
                        <div
                            v-for="term in data.terms"
                            :key="term.id"
                        >{{ term.term }}</div>
                    </div>
                </v-sheet>
            </v-bottom-sheet>
            <v-tooltip top>
                <template v-slot:activator="{ on }">

                </template>
                <span>
                    tool

                </span>
            </v-tooltip>
        </v-card>
    </div>
</template>

<script>
    export default {
        name: "OfferListed",
        props: ['data'],
        data () {
            return {
                sheet: false,
            }
        },
    }
</script>

<style scoped>
    #offerListedWrapper {
        min-width: 200px;
    }

    @media (max-width: 465px) {
        #offerListedWrapper {
            width: 100%;
            margin: 10px 0;
        }
    }

    .pink-border {
        border-color: #fab;
    }
</style>