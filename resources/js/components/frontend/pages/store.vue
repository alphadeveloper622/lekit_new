<style scoped>
@media only screen and (max-width: 755px) {
    .st-gal-main img {
        max-height: none !important;
  }
}

@media only screen and (max-width: 570px) {
.gal-grid img {
        max-height: none !important;
  }
}

</style>
<template>
    <div class=" content-box">
        <div class="content-head-home">
            <div class="top-address center">Delivery Address: 100 Portway, E15 3QJ London <button
                    class="change_but">Change</button></div>

            <div class="top-shop-banner">
                <img :src="store.store_profile.banner.image_1900x625 ? getUrl('public/' + store.store_profile.banner.image_1900x625) : getUrl('public/images/news/top_shop_banner.jpg')"
                    alt="Shop Name"  />
            </div>

            <div class="selected-store">
                <div class="container-xl row">
                    <div class="col-md-8 left"><strong>Store:</strong> <span class="active-store">Screwfix Bow London |
                            Tower Hamlets</span> <button class="change_but bold">CHANGE</button></div>
                    <div class="col-md-4 right"> <button class="nsign-but bold">STORE PRODUCTS</button></div>
                </div>
            </div>
        </div>

        <div class="container-xl row store-toolbar details-toolbar">
            <div class="col-md-4 left">
                <button class="nsign-but bold">ALL CATEGORIES</button>
            </div>
            <div class="col-md-4 center">
                <!-- Search: <input class="border-end-0 border rounded-pill" id="find-products" type="text" placeholder="find your products"> -->

                <div class="input-group product-search">
                    <input class="form-control border-end-0 border rounded-pill" type="text"
                        placeholder="find your product">
                    <span class="input-group-append">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#666666" class="bi bi-search"
                            viewBox="0 0 16 16" style="margin-left:-80px;position:relative;z-index:9999">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="col-md-4 right">
                <div class="st-tot-products">Store has <span class="tot-products">10 234</span> products</div>
            </div>
        </div>

        <div class="container-xl st-details-box">
            <div class="st-main-img">
                <img :src="store.store_profile.main_banner.original_image ? getUrl('public/' + store.store_profile.main_banner.original_image) : getUrl('public/images/news/main_shop_banner.jpg')"
                    alt="Store Name" />
            </div>
            <div class="st-main-info">
                <div class="row">
                    <div class="col-md-3 st-logo hover">
                        <img :src="store.store_profile.logo.original_image ? getUrl('public/' + store.store_profile.logo.original_image) : getUrl('public/images/news/shop1b.jpg')"
                            alt="store name" />
                    </div>
                    <div class="col-md-9 st-rest-info">
                        <div class="st-main-title">
                            <h1>{{ store.store_profile.store_name }}</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-5 st-main-details">
                                <div class="st-id">Store ID: {{ store.store_profile.store_code }}</div>
                                <div class="st-md-address">Address: {{ store.store_profile.address }}</div>
                                <div class="st-md-tel">Tel: <a href="tel:020 9649 9696">{{ store.store_profile.store_phone
                                }}</a></div>
                                <div class="st-md-email">Email: <a href="mail:info@screwfix-bow.co.uk">{{
                                    store.store_profile.store_email }}</a></div>
                                <div class="st-md-social">Follow:&nbsp;

                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#999999" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                        </svg></a>
                                    &nbsp;
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#999999" class="bi bi-linkedin" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                        </svg></a>
                                    &nbsp;
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#999999" class="bi bi-youtube" viewBox="0 0 16 16">
                                            <path
                                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                        </svg></a>
                                    &nbsp;
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#999999" class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg></a>
                                    &nbsp;
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#999999" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                        </svg></a>



                                </div>
                                <div class="st-md-share">Share Store &nbsp;
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#999999" class="bi bi-share-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                                        </svg></a>
                                </div>
                            </div>
                            <div class="col-md-3 st-main-distance center">
                                <div class="st-distance"><span class="st-bigger">1.2</span> miles away<br><span
                                        class="st-bigger">45</span> min Est. Delivery Time</div>
                            </div>
                            <div class="col-md-4 st-main-hours">
                                <h3>OPENING HOURS: <span class="st-status green">OPEN NOW</span></h3>
                                <div class="opening-times">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Monday:</span>
                                        <span>{{ displayOpenTime(store.store_profile.opening_hours[0]) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Tuesday:</span>
                                        <span>{{ displayOpenTime(store.store_profile.opening_hours[1]) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Wednesday:</span>
                                        <span>{{ displayOpenTime(store.store_profile.opening_hours[2]) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Thursday:</span>
                                        <span>{{ displayOpenTime(store.store_profile.opening_hours[3]) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Friday:</span>
                                        <span>{{ displayOpenTime(store.store_profile.opening_hours[4]) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Saturday:</span>
                                        <span>{{ displayOpenTime(store.store_profile.opening_hours[5]) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Sunday:</span>
                                        <span>{{ displayOpenTime(store.store_profile.opening_hours[6]) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="store-description">
                <h2>About Us</h2>
                <div class="st-description">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    <br><br>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>

            <div class="row gallery-location">
                <div class="col-md-7 st-gallery">
                    <h2>Our Gallery:</h2>
                    <div class="st-gal-main" @click="displayGalleryModal($event)" >
                        <img id="gallery-main-img" :src="gallery.length == 0? getUrl('public/images/news/feature1.png'):getUrl('public/'+gallery[0].storage+'/'+gallery[0].name)" alt="gallery main image" style="background-color: gray;object-fit: contain;max-height: 550px;"/>
                    </div>
                    <div v-if="gallery.length > 0"  class="row gal-grid">
                        <div v-for="(item, index) in gallery" class="col-md-2 col-sm-4 col-xs-6" @click="selectThumbnail($event)" ><img :src="getUrl('public/'+item.storage+'/'+item.name)" style="background-color: gray;max-height:70px; object-fit: contain;" v-bind:data-index="index" />
                        </div>
                    </div>
                    <div id="gallery-carousel-parent"  style="position: fixed;top: 0px;left: 0px;width: 100vw;height: 100vh;background: rgba(0,0,0,0.6);z-index: 10000;display:none;" @click="displayGalleryModal($event)">
                        <div id="gallery-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="width:60%;margin:auto;top:100px;z-index: 10001;">
                            <div class="carousel-inner">
                                <div v-for="(item, index) in gallery" :class="index==0? 'carousel-item active':'carousel-item'" data-bs-interval="8000" v-bind:data-index="index">
                                    <img :src="getUrl('public/'+item.storage+'/'+item.name)" class="d-block w-100 disable-gallery-toggle" alt="Slide" style="object-fit: contain;max-height: 690px;">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#gallery-carousel"
                            data-bs-slide="prev">
                                <span class="carousel-control-prev-icon disable-gallery-toggle" aria-hidden="true" id="disable-toggle"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#gallery-carousel"
                            data-bs-slide="next">
                                <span class="carousel-control-next-icon disable-gallery-toggle" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 st-location">
                    <h2>Location:</h2>
                    <div class="g-map">
                        <iframe
                            :src="'https://maps.google.com/maps?q=' + store.store_profile.latitude + ', ' + store.store_profile.longitude + '&t=&z=13&ie=UTF8&iwloc=&output=embed'"
                            width="100%" style="border:0;height:auto;min-height:550px" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="st-englarge">
                        <button class="blue-but">ENGLARGE MAP</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-xl st-details-box reviews">
            <h2>Our Reviews</h2>
            <div class="st-reviews-top">
                <div class="row">
                    <div class="col-md-8 st-rev-info">
                        <h3>The are <strong class="st-rev-total">23</strong> reviews for this store.</h3>
                        <h3>Avarage rating is:
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffb501"
                                class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffb501"
                                class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffb501"
                                class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffb501"
                                class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffb501"
                                class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            &nbsp;

                            <strong class="st-rev-rating">4.5</strong>
                        </h3>
                    </div>

                    <div class="col-md-4 right"><button class="blue-but">WRITE REVIEW</button></div>
                </div>
            </div>

            <div class="st-review">
                <h4>Very good store with friendly staff, well recommended</h4>
                <div class="review-stars">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                </div>
                <div class="review-txt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
            </div>



            <div class="st-review">
                <h4>Very good store with friendly staff, well recommended</h4>
                <div class="review-stars">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                </div>
                <div class="review-txt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
            </div>



            <div class="st-review">
                <h4>Very good store with friendly staff, well recommended</h4>
                <div class="review-stars">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                </div>
                <div class="review-txt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
            </div>



            <div class="st-review">
                <h4>Very good store with friendly staff, well recommended</h4>
                <div class="review-stars">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                </div>
                <div class="review-txt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
            </div>


            <div class="st-review">
                <h4>Very good store with friendly staff, well recommended</h4>
                <div class="review-stars">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501"
                        class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                </div>
                <div class="review-txt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
            </div>

            <div class="pag-box">
                <div class="review-pag"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                            fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                            <path
                                d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                        </svg></a> Page 1 of 16 <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                            fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                        </svg></a></div>
            </div>

        </div>

        <!--------------------------  END OF CONTENT - STORES RESULTS  ----------------------------->

        
    </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel';

export default {
    name: "store",
    data() {
        return {
            gallery: [],
            loading: false,
        }
    },
    components: {
        VueSlickCarousel
    },
    mounted() {
        if (!this.store) {
            this.loadStores();
        }else{
            this.loadGallery();
            document.title = this.store.store_profile.store_name;
        }
    },
    computed: {
        baseUrl() {
            return this.$store.getters.getBaseUrl;
        },
        store() {
            let stores = this.$store.getters.getAllStores;
            for (let i = 0; i < stores.length; i++) {
                if (stores[i].store_profile.slug == this.$route.params.slug) {
                    document.title = stores[i].store_profile.store_name;
                    return stores[i];
                }
            }
            return false;
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
        loadGallery(){
            let url = this.baseUrl + "/home/test/"+this.store.store_profile.store_code;
            this.$Progress.start();
            this.loading = true;
            axios
                .get(url)
                .then((response) => {
                    debugger;
                    this.is_shimmer = true;
                    this.loading = false;
                    if (response.data.error) {
                        this.$Progress.fail();
                        toastr.error(response.data.error, this.lang.Error + " !!");
                    } else {
                        console.log(response.data.gallery)
                        this.gallery=response.data.gallery;
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
        displayOpenTime(val) {
            return val['is_closed'] == 0 ? 'Closed' : val['open'] + ' - ' + val['close'];
        },
        displayGalleryModal(event) {
            if(!event.target.className.includes('disable-gallery-toggle'))
                $("#gallery-carousel-parent").toggle();
        }
        ,
        selectThumbnail(event) {
            //carousel-inner
            const clickedElement = event.target;
            const dataIdx = event.target.getAttribute('data-index');
            const imgElement = clickedElement.closest('img');

            const myImage = document.querySelector('#gallery-main-img');
            const carouselInner = document.querySelector('.carousel-inner');
            const activeCarouselInner = document.querySelector('.carousel-item.active');
            
            if (imgElement) {
            const src = imgElement.getAttribute('src');
            myImage.setAttribute('src', src);
            if(activeCarouselInner)
                activeCarouselInner.classList.remove('active');
            const element = carouselInner.querySelector(`[data-index="${dataIdx}"]`);
            if(element)
                element.classList.add('active');
            }
        }
    },
}
</script>