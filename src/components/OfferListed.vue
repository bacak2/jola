<template>
    <div id="offerListedWrapper">
        <v-card
            class="tom-secondary"
        >
            <router-link :to="`/offer/${data.id}`">
                <v-img
                        :src="`http://localhost:8000/img/${data.image}`"
                        :aspect-ratio="16/9"
                ></v-img>
            </router-link>
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
                                class="ma-2 jola-secondary"
                                label
                                outlined
                        >
                            <v-icon class="mr-2">{{ tag.icon }}</v-icon>
                            {{ tag.title }}
                        </v-chip>
                    </v-slide-item>
                </v-slide-group>
            </v-card-text>

            <v-card-actions>
                <router-link :to="`/offer/${data.id}`">
                    <v-btn class="tom-primary ml-3 mb-3">Szczegóły oferty...</v-btn>
                </router-link>
                <v-spacer></v-spacer>
                <v-bottom-sheet v-model="sheet" inset>
                    <template v-slot:activator="{ on }">
                        <v-btn v-on="on" class="tom-secondary mb-3 ml-2 ml-md-5 px-1">
                            <v-icon class="">date_range</v-icon>
                            Terminy
                        </v-btn>
                    </template>
                    <v-sheet class="text-center jola-primary" min-height="300px">
                        <div class="pt-12">
                            <span class="mb-4">
                                <span v-if="data.terms.length > 1">Oferta jest dostępna w terminach:</span>
                                <span v-else>Oferta jest dostępna w terminie:</span>
                            </span>
                            <ul>
                                <li
                                        v-for="term in data.terms"
                                        :key="term.id"
                                >{{ term.term }}</li>
                            </ul>
                        </div>
                        <v-btn
                                class="mt-6"
                                color="error"
                                @click="sheet = !sheet"
                        >Zamknij</v-btn>
                    </v-sheet>
                </v-bottom-sheet>
            </v-card-actions>
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