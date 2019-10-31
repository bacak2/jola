<template>
    <div id="carouselWrapper">
        <v-carousel
            hide-delimiters
            hide-delimiter-background
            cycle
        >
            <v-carousel-item
                v-for="(image,i) in images"
                :key="i"
                :src="image.src"
                :aspect-ratio="16/9"
                reverse-transition="fade-transition"
                transition="fade-transition"
            >
                <div class="slideDescription">
                    <p v-if="image.description">{{ image.description }}</p>
                    <div v-if="image.link && image.linkDescription" class="slideButtonWrapper">
                        <router-link :to="image.link">
                            <v-btn
                                class="slideButton px-5 mt-4"
                                elevation="20"
                                outlined
                                large
                            >
                                {{ image.linkDescription }}
                            </v-btn>
                        </router-link>
                    </div>
                </div>
            </v-carousel-item>
        </v-carousel>
    </div>
</template>

<script>
    export default {
        name: "Carousel",
        data () {
            return {
                images: [
                    {
                        src: require('@/assets/img/dubrovnik/dubrovnik1.jpg'),
                        description: "Poznaj niesamowite cośtam cośtam",
                        link: '/offer/1',
                        linkDescription: 'Odkryj...'
                    },
                    {
                        src: require('@/assets/img/dubrovnik/dubrovnik2.jpg'),
                        description: "Poznaj",
                        link: '/offer/3',
                        linkDescription: 'Poznaj...'
                    },
                    {
                        src: require('@/assets/img/dubrovnik/dubrovnik2.jpg'),
                        link: '/about',
                        linkDescription: 'Poznaj nas...'
                    }
                ],
            }
        },
    }
</script>

<style scoped>
     #carouselWrapper {
         width: 100%;
         margin-bottom: 30px;
         position: relative;
     }

    .slideDescription {
        position: absolute;
        right: 40px;
        bottom: 60px;
        z-index: 1;
        color: white;
        text-shadow: 2px 2px #000;
        font-size: 45px;
        font-weight: bold;
        margin-left: 20px;
    }

    .slideButtonWrapper {
        position: relative;
    }

    .slideButtonWrapper {
        position: absolute;
        right: 0;
        bottom: -40px;
    }

    .slideButtonWrapper button {
        color: white;
        text-shadow: 2px 2px #000;
        font-size: 20px;
        font-weight: bold;
    }
</style>