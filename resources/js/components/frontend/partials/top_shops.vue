<template>
    <div class="topshops-box">
        <div class="container-xl topshops center">
            <div class="topshop"><img :src="getUrl('public/images/news/shop1.jpg')" alt="top shop" /></div>
            <div class="topshop"><img :src="getUrl('public/images/news/shop2.jpg')" alt="top shop" /></div>
            <div class="topshop"><img :src="getUrl('public/images/news/shop3.jpg')" alt="top shop" /></div>
            <div class="topshop"><img :src="getUrl('public/images/news/shop4.jpg')" alt="top shop" /></div>
            <div class="topshop"><img :src="getUrl('public/images/news/shop5.jpg')" alt="top shop" /></div>
        </div>
    </div>
</template>

<script>

export default {
  name: "top_shops",
  data() {
    return {

    }
  },

  created() {
    
  },

}
</script>