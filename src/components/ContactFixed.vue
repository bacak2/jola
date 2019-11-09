<template>
    <div id="contactFixedWrapper">
        <div id="contact" :class="firstCssClass">
            <div class="text-center">
                <v-dialog
                        v-model="dialog"
                        width="500"
                >
                    <template v-slot:activator="{ on }">
                        <v-btn v-on="on" :class="secondCssClass">
                            Zainteresowany ofertą?
                        </v-btn>
                    </template>

                    <v-card>
                        <v-card-title
                                :class="firstCssClass"
                                primary-title
                        >
                            Złóż zamówienie
                        </v-card-title>

                        <v-card-text
                                class="jola-secondary pt-4"
                        >
                            Masz pytania? Napisz do mnie
                            <v-chip
                                pill
                                v-on="on"
                                :class="firstCssClass"
                            >
                                <v-avatar left>
                                    <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
                                </v-avatar>
                                <a :href="'mailto:' + owner_settings.email">
                                    {{ owner_settings.email }}
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
                                        @change="getAvailableSpots"
                                        item-text="term"
                                        item-value="id"
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
                            :class="firstCssClass"
                        >
                            <v-spacer></v-spacer>
                            <v-btn
                                :loading="submitting"
                                :disabled="!valid || submitting"
                                @click="submit"
                                :class="secondCssClass"
                                text
                            >
                                Wyślij
                            </v-btn>
                            <v-btn
                                :class="firstCssClass"
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
        props: [
            'data',
            'firstCssClass',
            'secondCssClass'
        ],
        data () {
            return {
                dialog: false,
                submitting: false,
                terms: [],
                term: null,
                persons: [],
                person: null,
                valid: false,
                email: '',
                emailRules: [
                    v => !!v || 'Adres email jest wymagany',
                    v => /.+@.+\..+/.test(v) || 'Adres email musi być poprawny',
                ],
                additional_message: '',
                owner_settings: []
            }
        },
        created() {
            axios.get(`${API_ENTRY_POINT}/offer-terms/${this.$route.params.id}`).then(
                (response) => {
                    this.terms = response.data;
                }
            ).then(() => {
                if (this.terms.length === 1) {
                    this.term = this.terms[0];
                }
            }).then(() => {
                this.getAvailableSpots(this.terms[0].id);
            }).then(() => {
                this.getOwnerSettings(this.data.offer.owner);
            });
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
            },

            getAvailableSpots (termId) {
                axios.get(`${API_ENTRY_POINT}/available-spots/${termId}`).then(
                    (response) =>{
                        this.persons = Array.from({length: response.data}, (v, k) => ++k);
                    }
                )
            },

            getOwnerSettings (ownerName) {
                axios.get(`${API_ENTRY_POINT}/owner-settings/${ownerName}`).then(
                    (response) =>{
                        this.owner_settings = response.data;
                    }
                )
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
        border: 2px solid #fff;
    }

    a {
        color: #fff !important;
    }
</style>