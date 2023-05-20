<template>
  <section class="sg-seller-product top-shop item-space-rmv" v-if="lengthCounter(countShop) > 0">
    <div class="container">
      <div class="title" :class="{ 'title-bg' : addons.includes('ishopet') }">
        <h1>{{ lang.top_shop }}</h1>
      </div>
      <div :class="{ 'slider-arrows' : addons.includes('ishopet') }">
        <VueSlickCarousel v-bind="slick_settings" :rtl="settings.text_direction == 'rtl'">
          <single_seller class="slider_div" v-for="(shop, i) in sellers" :key="i" :shop="shop"></single_seller>
        </VueSlickCarousel>
      </div>
    </div><!-- /.container -->
  </section><!-- /.sg-store-section -->
  <section class="sg-seller-product top-shop" v-else-if="show_shimmer">
    <div class="container">
      <div class="d-flex">
        <div class="sg-product" v-for="(shop, i) in 4">
          <div class="product-thumb">
            <a href="#">
              <shimmer :height="197"></shimmer>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import shimmer from "../partials/shimmer";
import VueSlickCarousel from "vue-slick-carousel";
import single_seller from "../partials/single_seller";

export default {
  name: "top_shop",
  components: {shimmer, VueSlickCarousel, single_seller},
  props: ["sellers"],
  data() {
    return {
      slick_settings: {
        dots: false,
        edgeFriction: 0.35,
        infinite: true,
        arrows: true,
        autoplay: false,
        adaptiveHeight: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 320,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      },
      show_shimmer: true,
    };
  },
  computed: {
    userShop() {
      return this.$store.getters.getShopFollwer;
    },
    countShop() {
      if (this.sellers && this.sellers.length > 0) {
        return this.sellers;
      } else {
        return [];
      }
    },
  },
  mounted() {
    this.checkHomeComponent("top_sellers");
  },
  watch: {
    homeResponse() {
      this.checkHomeComponent("top_sellers");
    },
  },
  methods: {
    checkHomeComponent(component_name) {
      let component = this.homeResponse.find((data) => data == component_name);

      if (component) {
        return (this.show_shimmer = false);
      }
    },
  },
};
</script>
