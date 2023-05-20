<template>
  <div class="sg-page-content">
    <section class="sg-breadcumb-section"
             :style="'background-image: url('+settings.affiliate_program_banner+')'">
      <div class="container">
        <div class="breadcumb-content"></div>
      </div><!-- /.container -->
    </section>

    <section class="about-section">
      <div class="container text-center display-4 mt-4">
        <router-link
            :to="{
										name: 'affiliate.register',
									}"
        >
          {{ lang.sign_up }}
        </router-link>
        <div class="page-title mt-4">
          <h1>Affiliate Agreement</h1>
        </div>
        <div v-html="settings.affiliate_terms_condition"></div>
      </div><!-- /.container -->
    </section><!-- /.about-section -->
<!--    <section class="shimmer-section" v-else-if="shimmer">-->
<!--      <shimmer class="shimmer-rds" :height="412"></shimmer>-->
<!--    </section>-->
  </div>
</template>

<script>
import shimmer from "../../partials/shimmer";

export default {
  name: "affiliate_program",
  data() {
    return {
      activeClass: "",
      skip: 1,
      show_load_more: true,
      active: 0,
      loading: false,
      page: 1,
      activeNav: "products",
      product_next_page_url: false,
      brand_next_page_url: false,
      shop_next_page_url: false,
      url: "",
      fetched_campaign: '',
      checkListing: true,
      is_shimmer: false,
    }
  },
  computed: {
    baseUrl() {
      return this.$store.getters.getBaseUrl;
    },
    shimmer() {
      return this.$store.state.module.shimmer
    },
  },
  methods: {
    campaignProducts() {
      let requestData = {
        slug: this.$route.params.slug,
      };
      this.activeNav = 'products'

      let url = this.baseUrl + '/home/campaign-products';

      if (this.lengthCounter(this.products) > 0) {
        this.product_next_page_url = this.products.next_page_url;
        let found = this.$store.getters.getCampaignStore.filter(val => val.slug == this.$route.params.slug);
        if (found){
          this.fetched_campaign = found[0];
        }
        return this.products;
      }

      axios.get(url, {params: requestData}).then((response) => {
        if (response.data.error) {
          toastr.error(response.data.error, this.lang.Error + ' !!');
        }
        this.fetched_campaign = response.data.campaign;
        this.$store.commit('setCampaignStore', response.data.campaign);


        this.product_next_page_url = response.data.products.next_page_url;
        let data = {
          slug: this.$route.params.slug,
          products: response.data.products
        };
        this.$store.commit('getCampaignProducts', data);
      })
    },
  }
}
</script>
