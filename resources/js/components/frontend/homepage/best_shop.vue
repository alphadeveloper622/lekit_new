<template>
	<section class="sg-seller-product best-shop item-space-rmv" v-if="lengthCounter(countShop) > 0">
		<div class="container">
			<div class="title" :class="{ 'title-bg' : addons.includes('ishopet') }">
				<h1>{{ lang.best_shop }}</h1>
			</div>
			<div :class="{ 'slider-arrows' : addons.includes('ishopet') }">
				<VueSlickCarousel class="global-list" v-bind="slick_settings" :rtl="settings.text_direction == 'rtl'">
					<single_seller class="slider_div" v-for="(shop, i) in best_shop" :key="i" :shop="shop"></single_seller>
				</VueSlickCarousel>
			</div>
    </div><!-- /.container -->
  </section><!-- /.shop-setion -->
	<section class="sg-seller-product best-shop" v-else-if="show_shimmer">
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
	name: "best_shop",
	components: { shimmer, VueSlickCarousel, single_seller },
	props: ["best_shop"],
	data: () => ({
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
	}),
	mounted() {
		this.checkHomeComponent("campaign");
	},
	watch: {
		homeResponse() {
			this.checkHomeComponent("campaign");
		},
	},
	computed: {
		countShop() {
			if (this.best_shop && this.best_shop.length > 0) {
				return this.best_shop;
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
