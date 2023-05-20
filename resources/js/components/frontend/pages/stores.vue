<template>
    <div class="content-box">
        <div class="content-head-home">
            <div class="top-address center">Delivery Address: {{ deliveryAddress }} <button class="change_but"
                    @click="openModal">Change</button></div>
            <div class="top-map">
                <iframe :src="'https://maps.google.com/maps?q=' + deliveryAddress + '&t=&z=13&ie=UTF8&iwloc=&output=embed'"
                    width="100%" style="border:0;height:auto;min-height:550px" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="blue-sep"></div>

        <div class="container-xl row store-toolbar">
            <div class="col-md-4 left">

                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-search hover" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-sliders2 hover" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4H1.5a.5.5 0 0 1 0-1H10V1.5a.5.5 0 0 1 .5-.5ZM12 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-6.5 2A.5.5 0 0 1 6 6v1.5h8.5a.5.5 0 0 1 0 1H6V10a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5ZM1 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 1 8Zm9.5 2a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V13H1.5a.5.5 0 0 1 0-1H10v-1.5a.5.5 0 0 1 .5-.5Zm1.5 2.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z" />
                </svg>

                <span class="store-count">There are 25 stores around</span>
            </div>
            <div class="col-md-4 center">
                Category: <select class="my-select">
                    <option value="">All Products</option>
                </select>
            </div>
            <div class="col-md-4 right">
                Sort by: <select class="my-select">
                    <option value="">Closest Distance</option>
                </select> &nbsp;

                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor"
                    class="bi bi-justify hover" :class="{ myactive: is_shimmer }" @click="is_shimmer = true"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                </svg>


                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                    class="bi bi-grid-3x3-gap-fill hover" :class="{ myactive: !is_shimmer }" @click="is_shimmer = false"
                    viewBox="0 0 16 16">
                    <path
                        d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z" />
                </svg>
            </div>
        </div>

        <div class="store-results-rows" v-if="is_shimmer">
            <div class="container-xl">
                <div v-for="(store, index) in stores" :key="index" class="store-box row odd">
                    <div class="col-md-6 st-row-left">
                        <div class="row">
                            <div class="col-md-1 st-row-count align-middle">{{ index + 1 }}.</div>
                            <div class="col-md-6 st-row-img"><a href="#"><img class="hover"
                                        :src="getUrl('public/images/news/screwfix_img.jpg')" alt="" /></a></div>
                            <div class="col-md-5 st-row-dist">
                                <div class="st-distance"><span class="st-bigger">1.2</span> miles away | <span
                                        class="st-bigger">45</span> min<br> Estimated Delivery Time</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 st-row-right">
                        <div class="row">
                            <div class="col-md-7 st-row-info">
                                <div class="st-title"><a href="#">{{ store.store_profile.store_name }}</a></div>
                                <div class="st-cat"><strong>Category:&nbsp;</strong>Hardware & Accessories</div>
                                <div class="st-loc"><strong>Location:&nbsp;</strong>Maplin st | Bow | Tower Hamlets
                                </div>
                                <div class="st-hours"><strong>Opening Times:&nbsp;</strong>7am to 7pm &bull; <span
                                        class="st-status green">OPEN NOW</span></div>
                                <div class="st-rev"><strong>Reviews:&nbsp;</strong>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        &nbsp;<span class="st-rev-count">(10)</span></a>
                                </div>
                            </div>

                            <div class="col-md-5 st-row-but">
                                <div class="st-save2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#999999"
                                        class="bi bi-star-fill hover" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                </div>
                                <router-link class="" :to="{ name: 'product.list.row' }"><button class="st-but-products">SHOW PRODUCTS</button></router-link>
                                <a :href="getUrl('store/' + store.store_profile.slug)"
                                    @click.prevent="routerNavigator('store', store.store_profile.slug)"><button
                                        class="st-but-details">STORE DETAILS</button></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="store-results-grid" v-else>
            <div class="container-xl">
                <div class="row">
                    <div v-for="(store, index) in stores" :key="index" class="col-md-4 col-lg-3 col-xl-3">
                        <div class="store-box">
                            <div class="st-img"><a href="#"><img class="hover"
                                        :src="getUrl('public/images/news/screwfix_img.jpg')" alt="" /></a>
                            </div>
                            <div class="desc-box">
                                <div class="st-title"><a href="#">{{ store.store_profile.store_name }}</a></div>
                                <div class="st-cat"><strong>Category:&nbsp;</strong>Hardware & Accessories</div>
                                <div class="st-loc"><strong>Location:&nbsp;</strong>Maplin st | Bow | Tower Hamlets
                                </div>
                                <div class="st-hours"><strong>Opening Times:&nbsp;</strong>7am to 7pm &bull; <span
                                        class="st-status green">OPEN NOW</span></div>
                                <div class="st-rev"><strong>Reviews:&nbsp;</strong>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501"
                                            class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        &nbsp;<span class="st-rev-count">(10)</span></a>
                                </div>
                            </div>
                            <div class="st-but row">
                                <div class="col-md-6"><button class="st-but-products">SHOW PRODUCTS</button></div>
                                <div class="col-md-6"><button class="st-but-details">STORE DETAILS</button></div>
                            </div>
                            <div class="st-distance"><span class="st-bigger">1.2</span> miles away | <span
                                    class="st-bigger">45</span> min Est. Delivery Time</div>
                            <div class="st-save">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#999999"
                                    class="bi bi-star-fill hover" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="center load-more">
            <a href="#"><button class="blue-but">LOAD MORE STORES</button></a>
        </div>

        <!--------------------------  END OF CONTENT - STORES RESULTS  ----------------------------->
        <modal_change_delivery_address></modal_change_delivery_address>
    </div>
</template>

<script>

import modal_change_delivery_address from "../partials/modal_change_delivery_address";

export default {
    name: "stores",
    data() {
        return {
            loading: false,
            is_shimmer: false,
        }
    },
    components: {
        modal_change_delivery_address
    },
    mounted() {
        if (this.lengthCounter(this.stores) == 0) {
            this.loadStores();
        }
        if (this.lengthCounter(this.stores) > 0) {
            this.is_shimmer = true;
        }
    },
    computed: {
        baseUrl() {
            return this.$store.getters.getBaseUrl;
        },
        shimmer() {
            return this.$store.state.module.shimmer;
        },
        stores() {
            return this.$store.getters.getAllStores;
        },
        deliveryAddress() {
            return this.$store.getters.getDeliveryAddress;
        },
    },
    methods: {
        loadStores() {
            let url = this.baseUrl + "/home/stores";
            this.$Progress.start();
            this.loading = true;
            axios
                .get(url)
                .then((response) => {
                    this.is_shimmer = true;
                    this.loading = false;
                    if (response.data.error) {
                        this.$Progress.fail();
                        toastr.error(response.data.error, this.lang.Error + " !!");
                    } else {
                        console.log(response.data.stores)
                        this.$store.commit("getAllStores", response.data.stores);
                        // this.next_page_url = response.data.sellers.next_page_url;
                        // this.filter.page++;
                        this.$Progress.finish();
                    }
                })
                .catch((error) => {
                    this.loading = false;
                    this.is_shimmer = true;
                    this.$Progress.fail();

                    toastr.error(error.response.statusText, this.lang.Error + " !!");
                });
        },
        openModal() {
            $('#modal_delivery_address').modal('show');
        }
    },
}
</script>
