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
                            Złóż zamówienie
                        </v-card-title>

                        <v-card-text
                                class="pink-black pt-4"
                        >
                            Masz pytania? Napisz do mnie
                            <v-chip
                                pill
                                v-on="on"
                                class="black-pink"
                            >
                                <v-avatar left>
                                    <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                                </v-avatar>
                                <a href="mailto:bacak2@o2.pl">
                                    bacak2@o2.pl
                                </a>
                            </v-chip>

                            <v-spacer></v-spacer>

                            <div class="mt-3">
                                <v-form
                                    ref="form"
                                    v-model="valid"
                                >
                                    <v-select
                                        v-model="term"
                                        :items="terms"
                                        label="Termin"
                                        placeholder="Wybierz termin"
                                        :rules="[v => !!v || 'Pole jest wymagane']"
                                        required
                                        outlined
                                    ></v-select>
                                    <v-select
                                        v-model="person"
                                        :items="persons"
                                        label="Liczba osób"
                                        placeholder="Wybierz liczbę osób"
                                        :rules="[v => !!v || 'Pole jest wymagane']"
                                        required
                                        outlined
                                    ></v-select>
                                    <v-text-field
                                        v-model="email"
                                        label="Adres email"
                                        placeholder="Email będzie służył wyłącznie do kontaktu w sprawie oferty"
                                        :rules="emailRules"
                                        required
                                    ></v-text-field>
                                    <v-textarea
                                        v-model="additional_message"
                                        name="input-7-1"
                                        label="Dodatkowe uwagi"
                                        rows="2"
                                    ></v-textarea>
                                </v-form>
                            </div>
                        </v-card-text>

                        <v-card-actions
                            class="black-pink"
                        >
                            <v-spacer></v-spacer>
                            <v-btn
                                :loading="submitting"
                                :disabled="!valid || submitting"
                                @click="submit"
                                class="pink-black"
                                text
                            >
                                Wyślij
                            </v-btn>
                            <v-btn
                                class="danger"
                                text
                                @click="dialog = false"
                            >
                                Anuluj
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    const API_ENTRY_POINT = 'http://localhost:8000';

    export default {
        name: "ContactFixed",
        props: ['data'],
        data () {
            return {
                dialog: false,
                submitting: false,
                terms: [],
                term: null,
                persons: [1, 2, 3, 4, 5, 6, 7, 8],
                person: null,
                valid: false,
                email: '',
                emailRules: [
                    v => !!v || 'Adres email jest wymagany',
                    v => /.+@.+\..+/.test(v) || 'Adres email musi być poprawny',
                ],
                additional_message: ''
            }
        },
        created() {
            axios.get(`${API_ENTRY_POINT}/offer-terms/${this.$route.params.id}`).then(
                (response) => {
                    this.terms = response.data;
                }
            );
        },
        methods: {
            validate () {
                if (this.$refs.form.validate()) {
                    this.snackbar = true
                }
            },
            submit () {
                this.submitting = true;
                axios.post(`${API_ENTRY_POINT}/offer/${this.$route.params.id}`, {
                    email: this.email,
                    person: this.person,
                    term: this.term,
                    additional_message:  this.additional_message
                }).then(
                    () => {
                        alert('Zamówienie zostało przyjęte. Niebawem się z Tobą skontaktujemy');
                        this.dialog = false;
                    }
                ).catch(() => {
                    alert('Przepraszamy, wystąpił problem');
                }).finally(() => {
                    this.submitting = false;
                });
            }
        }
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
        color: #18314c !important;
    }
</style>