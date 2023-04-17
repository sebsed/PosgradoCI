<template>
    <div id="slider-section-box">
        <div id="slider-container">
            <slides
            :images="imgs_array">
            </slides>
        </div>
    </div>
</template>

<script>

import Slides from './Slides.vue'

export default {
  components: { Slides },
  data(){
      return{
          imgs_array:[],
      }
  },
  methods:{
      getCarouselImages(){
          axios.get('/admin/carrusel/imgs')
          .then( res => this.imgs_array = res.data)
          .catch(err =>  console.error(err))
      }
  },
  created(){
      this.getCarouselImages();
  }
}
</script>

<style>
    @import './MainSliderStyles.css';
</style>