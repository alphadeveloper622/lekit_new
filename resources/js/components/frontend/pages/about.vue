<template>
    <div class="sg-page-content" >
        <div class="content-box">
            <div class="content-head-home">
                <div class="top-address left">
                        <div class="container-xl">
                                About Us
                        </div>
                </div>  		
            </div>
            <div class="container-xl my-content">
                <p>
                <img :src="getUrl('public/images/news/about.jpg')" alt="About Us" />
            </p>
            <br>
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import shimmer from "../partials/shimmer";

export default {
    name: "about",
    components: {
        shimmer
    },
    data(){
      return {
          slug:this.$route.params.slug
      }
    },
    watch: {
        $route() {
            if(this.page.link != this.$route.params.slug){
                this.$store.dispatch('othersPage', this.$route.params.slug);
            }
        },
        page()
        {
            document.title = this.page.title;
        }
    },
    mounted(){
        if(this.page.link != this.$route.params.slug) {
            this.$store.dispatch('othersPage', this.slug);
        }
      document.title = this.page.title;

    },
   computed:{
       page() {
           return this.$store.getters.getPageData;
       },
       shimmer(){
           return this.$store.state.module.shimmer
       }
   }
}
</script>
