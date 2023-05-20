<template>
	<section class="hero-slider p-0 home-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 categorie-menu-fixed">
					<sidebar_categories :slider="true" :home="0"></sidebar_categories>
				</div>
				<!-- end fixedc menu -->

				<div class="col-lg-9">
					<div v-if="sliders.length > 0" class="row">
						<div :class="addons.includes('ishopet') ? 'col-lg-9' : 'col-lg-12'">
							<VueSlickCarousel class="hero-section" :class="{ 'ishopet-hero-section' : addons.includes('ishopet') }" v-bind="slick_settings" :rtl="settings.text_direction == 'rtl'">
								<div class="hero-slide-item" v-for="(slider, i) in sliders" :key="i">
									<div class="slider__img slider_div">
										<a :href="slider.link" v-if="urlCheck(slider.link)">
											<img :src="slider.slider_bg_image" :alt="slider.link" />
										</a>
										<a href="javascript:void(0)" v-else-if="!slider.link">
											<img :src="slider.slider_bg_image" :alt="slider.link" />
										</a>
										<router-link v-else :to="slider.link"><img :src="slider.slider_bg_image" :alt="slider.link" /></router-link>
									</div>
								</div>
							</VueSlickCarousel>
						</div>
						<div :class="addons.includes('ishopet') ? 'col-lg-3' : 'col-lg-12'">
							<div class="hero-banner-section" :class="{ 'ishopet-hero-banner' : addons.includes('ishopet') }">
								<div class="banner__items">
									<div class="banner__item" v-for="(banner, index) in banners" :key="'banner' + index">
										<div class="banner-img">
											<a :href="banner.link" v-if="urlCheck(banner.link)">
												<img :src="banner.image" :alt="banner.link" />
											</a>
											<router-link v-else :to="banner.link"><img :src="banner.image" :alt="banner.link" /></router-link>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.hero-banner-section -->
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import shimmer from "../partials/shimmer";
import sidebar_categories from "../partials/sidebar_categories";

export default {
	name: "slider",
	components: { VueSlickCarousel, shimmer, sidebar_categories },
	data() {
		return {
			slick_settings: {
				dots: true,
				edgeFriction: 0.35,
				infinite: true,
				speed: 500,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				autoplay: true,
				// "fade": true,
				autoplaySpeed: 5000,
			},
		};
	},
	computed: {
		sliders() {
			return this.$store.getters.getSliders;
		},
		banners() {
			return this.$store.getters.getSliderBanners;
		},
	},
	methods: {
    toggleCategory() {
      if (this.defaultCategoryShow == false) {
        document.body.classList.add("sidebar-active");
        this.$store.dispatch("defaultCategoryShow", true);
      } else {
        document.body.classList.remove("sidebar-active");
        this.$store.dispatch("defaultCategoryShow", false);
      }
    },
  },
};
</script>
