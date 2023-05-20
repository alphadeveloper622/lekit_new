<template>
<div class="content-box">


<div class="content-head-home">

        <div class="top-address center">Delivery Address: 100 Portway, E15 3QJ London <button class="change_but">Change</button></div>

        <div class="top-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d464.79455748560906!2d0.013330466159278203!3d51.53696989001553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a792c4057c5d%3A0xe90495c7aaf4c692!2sSouth%20Lodge%2C%20Portway%2C%20London%20E15%203QJ!5e0!3m2!1sen!2suk!4v1679763386428!5m2!1sen!2suk" width="100%"  style="border:0;height:auto;min-height:550px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        
        <div class="selected-store">
                <div class="container-xl row">
                    <div class="col-md-8 left"><strong>Store:</strong> <span class="active-store">Screwfix Bow London | Tower Hamlets</span>  <button class="change_but bold">CHANGE</button></div>
                    <div class="col-md-4 right"> <button class="nsign-but bold">STORE DETAILS</button></div>
                </div>
        </div>
    
</div>




        <div class="container-xl row store-toolbar">
            <div class="col-md-4 left">

<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-sliders2 hover" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M10.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4H1.5a.5.5 0 0 1 0-1H10V1.5a.5.5 0 0 1 .5-.5ZM12 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-6.5 2A.5.5 0 0 1 6 6v1.5h8.5a.5.5 0 0 1 0 1H6V10a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5ZM1 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 1 8Zm9.5 2a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V13H1.5a.5.5 0 0 1 0-1H10v-1.5a.5.5 0 0 1 .5-.5Zm1.5 2.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
</svg>

<button class="my-but">ALL CATEGORIES</button>

                  <span class="product-count">&nbsp;(27 584 products)</span>
            </div>
            <div class="col-md-4 center">
                   Search: <input class="my-input" placeholder="Product name or code" />
            </div>
            <div class="col-md-4 right">
                   Sort by: <select class="my-select"><option value="">Closest Distance</option></select> &nbsp;

                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-justify hover" viewBox="0 0 16 16" @click="navRow">
                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                </svg>


                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-grid-3x3-gap-fill my-active hover" viewBox="0 0 16 16" @click="navGrid">
                <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z"/>
                </svg>

            </div>	
        </div>




    <div class="container-xl row product-nav">
            <div class="col-md-4 left breadcrumbs"><a href="#">Home</a> > <a href="#">All Categories</a> > <a href="#">Power Tools</a> > <a href="#">Drills</a></div>
            <div class="col-md-4 center page-res">Results per page: <a href="#" class="active">&nbsp;20</a> <a href="#">&nbsp;60</a> <a href="#">&nbsp;100</a></div>
            <div class="col-md-4 right go-back"><a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#333333" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
<path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
</svg> GO BACK</a></div>
    </div>




<div class="products-res-grid">

   <div class="container-xl">





       <div class="row">




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>






       </div>






                <div class="row">




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>




       </div>




                <div class="row">




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



       </div>



                <div class="row">




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



       </div>




       <div class="row">




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>




            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>



            <div class="col-md-4 col-lg-3 col-xl-3">

                    <div class="product-box">

                        <div class="prod-img"><router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link></div>

                        <div class="prod-info center"><a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a></div>

                        <div class="prod-rev center hover"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>

                               <div class="prod-cost">
                                       <div class="row">
                                               <div class="col-md-9">&pound;1049.99</div>
                                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                       </div>
                                       <div class="row">
                                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                       </div>
                               </div>


                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-comp center"><div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div></div>
                                       <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10"><router-link :to="{name:'product.details.test'}">PRODUCT INFO</router-link></button></div>
                               </div>

                               <div class="row prod-tools">
                                       <div class="col-md-5 tool-quan center">
                                               <div class="quan-box">
                                                   <button class="quan-minus">-</button>
                                                   &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp;
                                                   <button class="quan-plus">+</button>
                                               </div>
                                       </div>
                                       <div class="col-md-7 tool-add center">
                                               <button class="my-but-sm">ADD TO BASKET</button>
                                       </div>
                               </div>

                    </div>

            </div>






       </div>

<!--

           <div class="product-box row odd">

               <div class="col-md-2 prod-img">
                   <router-link :to="{name:'product.details.test'}"><img :src="getUrl('public/images/news/product.jpg')" alt="Drill product" /></router-link>
               </div>
           
               <div class="col-md-6 prod-info left">
                   <a href="#"><h3>ERBAUER ERH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h3></a>
                   <div class="row">
                       <div class="col-md-6 left prod-detail">
                           <div class="prod-cod"><strong class="black">Code:</strong> 965401456KV</div>
                           <div class="prod-brand"><strong class="black">Brand:</strong> ERBAUER</div>
                           <div class="prod-rev"><strong class="black">Reviews:</strong>&nbsp; 
                               <a href="#">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                          </svg>
                               &nbsp;<span class="prod-rev-count">(134)</span></a></div>
                           <div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div>
                       </div>
                       <div class="col-md-6 left prod-detail">
                           <div class="prod-ext">2 x 5.h Li-ion Batteries</div>
                           <div class="prod-ext">75min Charge Time</div>
                           <div class="prod-ext">Max Torque: 65Nm</div>
                       </div>
                   </div>
               </div>
               
               <div class="col-md-2 prod-cost">
                       <div class="row">
                               <div class="col-md-9">&pound;1049.99</div>
                               <div class="col-md-3 list-vat left">INC<br>VAT</div>
                       </div>
                       <div class="row">
                               <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                               <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                       </div>
               </div>
               
               <div class="col-md-2 prod-act center">
                   <div class="quan-box"><button class="quan-minus">-</button> &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp; <button class="quan-plus">+</button></div>
                   <button class="my-but-sm">ADD TO BASKET</button>
                   <button class="my-but-sm2 mt10">PRODUCT INFO</button>
               </div>

          </div>
        -->






   </div>




      <div class="container-xl row product-nav mt10">
            <div class="col-md-4 left page-res">Results per page: <a href="#" class="active">&nbsp;20</a> <a href="#">&nbsp;60</a> <a href="#">&nbsp;100</a></div>
            <div class="col-md-4 center pagi">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#387ac8" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                      </svg>
                  &nbsp;Page 1 of 16&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#387ac8" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                      </svg>
            </div>
            <div class="col-md-4 right go-back"><a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#333333" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
              </svg> GO BACK</a>
            </div>
    </div> 	
               
      

</div>


<div class="center load-more">
        <a href="#"><button class="blue-but">LOAD MORE PRODUCTS</button></a>
  </div>

</div>
</template>

<script>

export default {
    name: "product-list-grid",
    components: {
    },
    data() {
        return {
        };
    },

    mounted() {
    },
    computed: {
    },
    methods: {
        navGrid(){
            this.$router.push({name: 'product.list.grid'});
        },
        navRow(){
            this.$router.push({name: 'product.list.row'});
        }
    },
};
</script>
    