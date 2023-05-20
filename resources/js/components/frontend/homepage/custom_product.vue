<template>
  <section class="products-section bg-off-white" v-if="lengthCounter(custom_products) > 0">
    <div class="container" v-if="lengthCounter(custom_products)">
      <div class="title justify-content-between">
        <h1>{{ lang.weekly_best_products }}</h1>
        <a href="javascript:void(0)"  @click.prevent="routerNavigator('all.products')">{{ lang.more_products }} <span
            class="icon mdi mdi-name mdi-arrow-right"></span></a>
      </div>
       <productCarousel :products="custom_products" :number="12" :grid_class="'grid-6'"></productCarousel>
    </div>
  </section>
  <section class="products-section bg-white" v-else-if="show_shimmer">
    <div class="container">
      <ul class="products grid-6">
        <li v-for="(product, index) in 6" :key="index">
          <div class="sg-product">
            <a href="javascript:void(0)">
              <shimmer :height="364"></shimmer>
            </a>
          </div><!-- /.sg-product -->
        </li>
      </ul>
    </div>
  </section>
</template>

<script>
import productCarousel from "../pages/product-carousel";
// import product from "../pages/product";
import shimmer from "../partials/shimmer";

export default {
  name: "custom_product.vue",
  components: {
    shimmer,
    productCarousel
  },
  props: ["custom_products"],
  data() {
    return {
      show_shimmer: true,
    };
  },
  mounted() {
    this.checkHomeComponent("custom_products");
  },
  watch: {
    homeResponse() {
      this.checkHomeComponent("custom_products");
    },
  },
  computed: {
    products() {
      if (this.best_selling_product && this.best_selling_product.length > 0) {
        return this.best_selling_product;
      } else {
        return [];
      }
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
