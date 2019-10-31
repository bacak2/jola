<template>
    <div id="contactFixedWrapper">
        <div id="contact" class="pink-black">
            <div class="text-center">
                <v-dialog
                        v-model="dialog"
                        width="500"
                >
                    <template v-slot:activator="{ on }">
                        <v-btn v-on="on" class="black-pink">
                            Zainteresowany ofertą?
                        </v-btn>
                    </template>

                    <v-card>
                        <v-card-title
                                class="black-pink"
                                primary-title
                        >
                            Zainteresowany ofertą?
                        </v-card-title>

                        <v-card-text
                                class="pink-black pt-4"
                        >
                            <a href="mailto:bacak2@o2.pl">
                                <v-chip
                                        pill
                                        v-on="on"
                                        class="black-pink"
                                >
                                    <v-avatar left>
                                        <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                                    </v-avatar>
                                    Jola
                                </v-chip>
                            </a>

                            <v-spacer></v-spacer>

                            <div class="mt-3">
                                Napisz do mnie na adres
                                <a href="mailto:bacak2@o2.pl">bacak2@o2.pl</a>
                                w treści podając:
                                <ul>
                                    <li>datę przyjazdu</li>
                                    <li>datę wyjazdu</li>
                                    <li>liczbę osób</li>
                                </ul>
                            </div>
                        </v-card-text>

                        <v-card-actions
                                class="black-pink"
                        >
                            <v-spacer></v-spacer>
                            <v-btn
                                    class="pink-black"
                                    text
                                    @click="dialog = false"
                            >
                                Zamknij
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ContactFixed",
        data () {
            return {
                dialog: false,
            }
        },
    }
</script>

<style scoped>
    #contactFixedWrapper {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1;
    }

    #contact {
        padding: 20px;
        border-radius: 25px;
        border: 2px solid #fab;
    }

    a {
        color: #fab !important;
    }
</style>