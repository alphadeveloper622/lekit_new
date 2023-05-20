<template>
	<section class="sg-seller-product sg-feature-shop item-space-rmv" v-if="lengthCounter(countShop) > 0">
		<div class="container">
			<div class="title" :class="{ 'title-bg' : addons.includes('ishopet') }">
				<h1>{{ lang.featured_shops }}</h1>
			</div>
			<div class="sg-category-content sg-filter" :class="list_class">
				<ul class="products grid-4">
          <single_seller class="slider_div" v-for="(shop, i) in featured_shop" :key="i" :shop="shop"></single_seller>
        </ul>
			</div>
    </div><!-- /.container -->
  </section><!-- /.sg-feature-shop -->
	<section class="sg-seller-product sg-feature-shop" v-else-if="show_shimmer">
		<div class="container">
			<div class="sg-category-content shimmer sg-filter" :class="list_class">
				<ul class="products grid-2">
					<li v-for="(shop, i) in 2">
						<div class="sg-product">
							<div class="product-thumb">
								<a href="#"><shimmer :height="225"></shimmer></a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
</template>

<script>
import shimmer from "../partials/shimmer";
import single_seller from "../partials/single_seller";

export default {
	name: "featured_shop",
	components: { shimmer, single_seller },
	props: ["featured_shop"],
	watch: {
		homeResponse() {
			let component = this.homeResponse.find((data) => data == "featured_sellers");
			if (component) {
				this.show_shimmer = false;
			}
		},
	},
	data: () => ({
		list_class: "",
		slick_settings: {
			dots: false,
			edgeFriction: 0.35,
			infinite: true,
			arrows: false,
			autoplay: false,
			slidesToShow: 2,
			slidesToScroll: 4,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						initialSlide: 1,
					},
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
						initialSlide: 1,
					},
				},
				{
					breakpoint: 480,
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

	computed: {
		countShop() {
			if (this.featured_shop && this.featured_shop.length > 0) {
				return this.featured_shop;
			} else {
				return [];
			}
		},
	},
	mounted() {
		let width = window.innerWidth > 0 ? window.innerWidth : screen.width;
		if (width > 480) {
			this.list_class = "list-view-tab";
		}
	},
};
</script>
