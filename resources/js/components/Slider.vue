<template>
    <div class="w-full h-full">
        <vueper-slides class="w-full h-full" :fixed-height="true"  :autoplay="true" :bullets="false" :arrows="false" :duration="duration" :pauseOnHover="false" :3d="false">
            <vueper-slide
                v-for="(slide, i) in images"
                :key="i"
                :image="slide.path"
            >
            </vueper-slide>
        </vueper-slides>
    </div>
</template>

<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";


//bullets: is the dots at the bottom of the slider
//arrows: is the arrows at the side of the slider
//duration: is the time between each slide
//fixed-height: is the height of the slider
//autoplay: is the slider autoplay
//pauseOnHover: is the slider pause when hover
//3d: is the slider 3d effect

export default {
    props:{
        images:{
            type:[Array,Object],
            required:true
        },
        duration:{
            type:Number,
            default:null
        }
    },
    components: { VueperSlides, VueperSlide },
};
</script>
