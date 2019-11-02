<template>
    <div id="carouselWrapper">
        <v-carousel
            hide-delimiters
            hide-delimiter-background
            cycle
        >
            <v-carousel-item
                v-for="(image,i) in data"
                :key="i"
                :src="`http://localhost:8000/img/${image.src_dir}/${image.src}`"
                :aspect-ratio="16/9"
                reverse-transition="fade-transition"
                transition="fade-transition"
            ></v-carousel-item>
        </v-carousel>
    </div>
</template>

<script>
    export default {
        name: "CarouselSimple",
        props: ['data']
    }
</script>

<style scoped>
     #carouselWrapper {
         width: 100%;
         margin-bottom: 30px;
         position: relative;
     }

    .slideButtonWrapper button {
        color: white;
        text-shadow: 2px 2px #000;
        font-size: 20px;
        font-weight: bold;
    }
</style>