<template>
	<section class="sg-seller-product best-shop item-space-rmv" v-if="lengthCounter(countShop) > 0">
		<div class="container">
			<div class="title" :class="{ 'title-bg' : addons.includes('ishopet') }">
				<h1>{{ lang.brand_shops }}</h1>
			</div>
			<div :class="{ 'slider-arrows' : addons.includes('ishopet') }">
				<VueSlickCarousel class="global-list" v-bind="slick_settings" :rtl="settings.text_direction == 'rtl'">
					<single_seller class="slider_div" v-for="(shop, i) in express_shop" :key="i" :shop="shop"></single_seller>
				</VueSlickCarousel>
			</div>
		</div>
		<!-- /.container -->
	</section>
	<!-- /.sg-brand-shop -->
	<section class="sg-brand-shop pt-0" v-else-if="show_shimmer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6" v-for="(shop, i) in 4" :key="i">
					<div class="brand-list">
						<div class="brand-shop">
							<shimmer class="pa-0" :height="300"></shimmer>
						</div>
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
	name: "express_shop",
	components: { shimmer, VueSlickCarousel,single_seller },
	props: ["express_shop"],
	data() {
		return {
			checkListing: true,
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
						breakpoint: 1191,
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
							slidesToScroll: 1,
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
	mounted() {
		this.checkHomeComponent("express_sellers");
	},
	watch: {
		homeResponse() {
			this.checkHomeComponent("express_sellers");
		},
	},
	computed: {
		userShop() {
			return this.$store.getters.getShopFollwer;
		},
		countShop() {
			if (this.express_shop && this.express_shop.length > 0) {
				return this.express_shop;
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
