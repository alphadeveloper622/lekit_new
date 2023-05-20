<template>
    <div class="sg-page-content">
        <div class="content-box">
            <div class="content-head-home">
                <div class="top-address center">Delivery Address: 100 Portway, E15 3QJ London <button class="change_but">Change</button></div>
                <div class="selected-store">
                    <div class="container-xl row">
                        <div class="col-md-8 left"><strong>Store:</strong> <span class="active-store">Screwfix Bow London | Tower Hamlets</span>  <button class="change_but bold">CHANGE</button></div>
                        <div class="col-md-4 right"> <button class="nsign-but bold">STORE DETAILS</button></div>
                    </div>
                </div>
            </div>
            <div class="container-xl row product-nav">
                <div class="col-md-6 left breadcrumbs"><a href="#">Home</a> > <a href="#">All Categories</a> > <a href="#">Power Tools</a> > <a href="#">Drills</a></div>
                <div class="col-md-6 right go-back">
                    <a href="javascript:window.history.go(-1)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#333333" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg> GO BACK</a>
                </div>
            </div>
            <div class="container-xl mt25">
                <div class="product-info-box">
                    <div class="row">
                        <div class="col-md-5 prod-image">
                            <div class="product-image">
                                <img :src="getUrl('public/images/news/product.jpg')" alt="main image" />
                            </div>
                            <div class="row prod-img-grid">
                                <div class="col-md-3 col-sm-3"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></div>
                                <div class="col-md-3 col-sm-3"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></div>
                                <div class="col-md-3 col-sm-3"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></div>
                                <div class="col-md-3 col-sm-3"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></div>	      
                            </div>
                            <div class="row prod-img-grid">
                                <div class="col-md-3 col-sm-3"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></div>
                                <div class="col-md-3 col-sm-3"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></div>
                                <div class="col-md-3 col-sm-3"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></div>
                                <div class="col-md-3 col-sm-3"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></div>
                            </div>
                        </div>
                        <div class="col-md-7 prod-details">
                            <div class="prod-title"><h2>ERBAUER RH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V</h2></div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="prod-code"><strong>Code:&nbsp;</strong>965406KV</div>
                                    <div class="prod-brand"><strong>Brand:&nbsp;</strong>ERBAUER</div>
                                    <div class="prod-reviews">
                                        <strong class="black">Reviews:&nbsp;</strong> 
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
                                        &nbsp;<span class="prod-rev-count">(134)</span></a> 
                                    </div>
                                </div>
                                <div class="col-md-4 prod-share right">
                                    Share Product &nbsp; 
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#999999" class="bi bi-share-fill" viewBox="0 0 16 16">
                                        <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"></path>
                                    </svg></a>
                                </div>
                            </div>

                            <div class="prod-description justify">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </div>

                            <div class="row">
                                <div class="col-md-6 extra-info">
                                    <ul>
                                        <li>750W</li>
                                        <li>Drill, Hammer, Hammer Drill & Chisel</li>
                                        <li>Max. Impact Energy: 3J</li>
                                        <li>Anti-Vibration System</li>
                                        <li>Safety Clutch</li>
                                        <li>Nylon Gearbox</li>
                                        <li>No Brake</li>
                                        <li>Lock-On Swtich</li>
                                        <li>Varialbe Speed</li>
                                        <li>Replaceble Carbon Brushes</li>
                                    </ul>
                                </div>
                                <div class="col-md-6 prod-cost">
                                    <div class="prod-cost-box">
                                        <div class="row">
                                            <div class="col-md-9">&pound;1049.99</div>
                                            <div class="col-md-3 list-vat left">INC<br>VAT</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 cost-was center">Was &pound;249.99</div>
                                            <div class="col-md-6 cost-save left">Save &pound;100.00</div>
                                        </div>
                                    </div>

                                    <div class="prod-act center">
                                        <div class="quan-box"><button class="quan-minus">-</button> &nbsp;<input type="text" maxlength="3" class="prod-quan" placeholder="1" value="1" />&nbsp; <button class="quan-plus">+</button></div>
                                        <button class="my-but-sm">ADD TO BASKET</button>
                                    </div>

                                    <div class="prod-com"><input class="compare-inp" type="checkbox" /> COMPARE</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-xl mt40">
                <ul class="nav nav-tabs" id="details-reviews" role="tablist">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">Product Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Product Reviews</button>
                    </li>
                </ul>
                <div class="tab-content" id="my-tab-content">
                    <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="home-tab">
                        <div class="extra-details">
                            <table class="table2"><thead><tr><th colspan="2" align="left" class="table1" role="columnheader">Specification</th></tr></thead><tbody><tr><td>Brand</td><td align="center">Erbauer</td></tr><tr><td>Brushless</td><td align="center">Brushed</td></tr><tr><td>Cable Length</td><td align="center">3 m</td></tr><tr><td>Capacity Masonry</td><td align="center">26 mm</td></tr><tr><td>Capacity Steel</td><td align="center">13 mm</td></tr><tr><td>Capacity Wood</td><td align="center">30 mm</td></tr><tr><td>Carry Case/Bag Included</td><td align="center">Yes</td></tr><tr><td>Condition</td><td align="center">Brand New</td></tr><tr><td>Condition Description</td><td align="center">Unused &amp; in original factory/manufacturer condition.</td></tr><tr><td>Corded Tool Weight</td><td align="center">3.4 kg</td></tr><tr><td>Demolition Hammer Impact Energy</td><td align="center">3 J</td></tr><tr><td>Impact Rate</td><td align="center">0-5300 bpm</td></tr><tr><td>Manufacturer Guarantee</td><td align="center">3 Year Manufacturer's Guarantee (T&amp;Cs Apply)</td></tr><tr><td>Model No</td><td align="center">ERH750</td></tr><tr><td>No Load Speed</td><td align="center">0-1000 rpm</td></tr><tr><td>No. of SDS Drill Functions</td><td align="center">4-Function</td></tr><tr><td>Overload Protection</td><td align="center">No Overload Protection</td></tr><tr><td>Pack Size</td><td align="center">1</td></tr><tr><td>Pieces in Pack/Case</td><td align="center">1</td></tr><tr><td>Plug Included</td><td align="center">Includes Plug.</td></tr><tr><td>Power Output (Watts/Kw)</td><td align="center">750 W</td></tr><tr><td>Power Supply</td><td align="center">Electric</td></tr><tr><td>Power Voltage Supply</td><td align="center">220-240 V</td></tr><tr><td>Product Length</td><td align="center">367 mm</td></tr><tr><td>Product Type</td><td align="center">SDS Plus Drill</td></tr><tr><td>Repair Service Action</td><td align="center">Should the product require repair please visit a store who will arrange the repair.</td></tr><tr><td>SDS Drill Product Type</td><td align="center">SDS Plus</td></tr><tr><td>Switch Type</td><td align="center">Lock-On Switch</td></tr><tr><td>Vibration Level</td><td align="center">14 m/s²</td></tr><tr><td>Vibration System</td><td align="center">Anti-Vibration System</td></tr></tbody></table>
                            <div class="extra-data mt40">
                                <h3 class="table1" data-qaid="product-contents-header">Product Contents</h3>
                                <p data-qaid="product-contents-text">ERH750, 3 x drill bits (8, 10 and 12mm), metal depth gauge, auxiliary handle and dust cover.</p>
                            </div>

                            <div class="extra-data">
                                <h3 class="table1" data-qaid="downloads-header">Downloads</h3>
                                <div data-qaid="downloads-links">
                                    <p>
                                        <a href="#" target="_blank" class="hover" title="Download instruction manual for Erbauer ERH750 3.4kg  Electric SDS Plus Drill 220-240V" tabindex="0">
                                        <svg viewBox="0 0 11 13" fill="none" width="35" height="35" xmlns="http://www.w3.org/2000/svg" class="NGmvyw" aria-hidden="true" focusable="false"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.512 2.756c.137.139.253.32.347.546.094.225.141.442.141.65v8.346c0 .2-.064.364-.193.494a.703.703 0 0 1-.487.208H.693a.636.636 0 0 1-.488-.208.755.755 0 0 1-.205-.494V.702c0-.2.068-.364.205-.494.137-.13.3-.2.488-.208h6.418c.188 0 .398.048.629.143.23.095.41.212.539.351l2.233 2.262ZM7.33.988v2.73h2.696c-.043-.147-.095-.247-.155-.299L7.624 1.144c-.051-.06-.15-.113-.295-.156Zm2.76 11.089V4.641H7.11a.636.636 0 0 1-.488-.208.74.74 0 0 1-.205-.481V.923H.91v11.154h9.178ZM6.405 7.774c.154.121.355.256.603.403.283-.035.56-.052.834-.052.702 0 1.126.117 1.271.351.077.113.081.238.013.377 0 .009-.004.013-.013.013l-.013.026c-.025.182-.192.273-.5.273-.231 0-.505-.048-.822-.143a5.727 5.727 0 0 1-.937-.377c-1.052.113-1.99.312-2.81.598-.728 1.265-1.306 1.898-1.733 1.898a.378.378 0 0 1-.193-.052l-.18-.091-.038-.026c-.052-.052-.069-.139-.052-.26.043-.2.18-.42.411-.663a4.1 4.1 0 0 1 .937-.702c.069-.043.124-.03.167.039.009.009.013.017.013.026.248-.407.505-.884.77-1.43.325-.659.573-1.291.744-1.898a6.53 6.53 0 0 1-.218-1.157c-.034-.373-.017-.68.052-.923.051-.19.15-.286.295-.286h.154c.111 0 .197.035.257.104.085.104.107.269.064.494a.142.142 0 0 1-.026.052v.286c-.008.59-.043 1.053-.103 1.391.266.789.616 1.365 1.053 1.729Zm-4.12 2.977c.248-.113.573-.494.975-1.144-.248.19-.458.394-.629.611a2.607 2.607 0 0 0-.346.533Zm2.85-6.669c-.078.2-.086.516-.026.949a5.28 5.28 0 0 0 .05-.312c0-.017.018-.121.052-.312a.164.164 0 0 1 .039-.065c-.009 0-.013-.004-.013-.013v-.013l-.013-.013c0-.104-.03-.19-.09-.26v.039Zm-.9 4.784c.651-.26 1.331-.455 2.042-.585a.344.344 0 0 1-.09-.065l-.116-.104c-.368-.32-.672-.745-.911-1.274a9.895 9.895 0 0 1-.59 1.43c-.146.269-.257.468-.334.598Zm4.634-.117c-.11-.113-.445-.169-1-.169.359.139.654.208.885.208a.37.37 0 0 0 .128-.013l-.013-.026Z" fill="#636363"></path></svg>

                                    &nbsp; Instruction Manual</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="reviews">
                            <h2>ERBAUER RH750 3.4KG ELECTRIC SDS PLUS DRILL 220-240V REVIEWS</h2>
                            <div class="st-reviews-top">
                                <div class="row">
                                    <div class="col-md-8 st-rev-info">
                                        <h3>The are <strong class="st-rev-total">34</strong> reviews for this product.</h3>
                                        <h3>Avarage rating is:
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"  width="26" height="26" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"  width="26" height="26" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"  width="26" height="26" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            &nbsp;
                                            <strong class="st-rev-rating">4.5</strong></h3>
                                    </div>
                                    <div class="col-md-4 right"><button class="blue-but">WRITE REVIEW</button></div>
                                    </div>
                                </div>
                                <div class="st-review">
                                    <h4>Very good product and excellent features, well recommended</h4>
                                    <div class="review-stars">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>    
                                    </div>
                                    <div class="review-txt">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div>
                                    <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
                                </div>

                                <div class="st-review">
                                    <h4>Very good product and excellent features, well recommended</h4>
                                    <div class="review-stars">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    </div>
                                    <div class="review-txt">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div>
                                    <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
                                </div>

                                <div class="st-review">
                                    <h4>Very good product and excellent features, well recommended</h4>
                                    <div class="review-stars">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>    
                                    </div>
                                    <div class="review-txt">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div>
                                    <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
                                </div>

                                <div class="st-review">
                                    <h4>Very good product and excellent features, well recommended</h4>
                                    <div class="review-stars">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>    
                                    </div>
                                    <div class="review-txt">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div>
                                    <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
                                </div>

                                <div class="st-review">
                                    <h4>Very good product and excellent features, well recommended</h4>
                                    <div class="review-stars">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="19" height="19" fill="#ffb501" class="bi bi-star-fill st-review-star" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>    
                                    </div>
                                    <div class="review-txt">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div>
                                    <div class="review-author">John Doe &nbsp;<span class="review-date">(12.01.2023)</span></div>
                                </div>

                                <div class="pag-box">
                                    <div class="review-pag">
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16"><path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/></svg></a> Page 1 of 16 <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16"><path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="products-res-grid mt40">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 col-xl-3">
                                <div class="product-box">

                                    <div class="prod-img"><a href="#" class="hover"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></a></div>

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
                                                <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10">PRODUCT INFO</button></div>
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

                                    <div class="prod-img"><a href="#" class="hover"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></a></div>

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
                                                <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10">PRODUCT INFO</button></div>
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

                                    <div class="prod-img"><a href="#" class="hover"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></a></div>

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
                                                <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10">PRODUCT INFO</button></div>
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

                                    <div class="prod-img"><a href="#" class="hover"><img :src="getUrl('public/images/news/product.jpg')" alt="main image" /></a></div>

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
                                                <div class="col-md-7 tool-info center"><button class="my-but-sm2 mt10">PRODUCT INFO</button></div>
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
                </div>
                <div class="spacer mt40">&nbsp;</div>
            </div>
        </div>
    </div>
</template>

<script>

import product from "./product";
import detailsView from "../partials/details-view";

export default {
    name: "product-details",
    components: {product, detailsView},
    data() {
        return {
            hours: 0,
            minutes: 0,
            seconds: 0,
            slug:{
              product_slug: this.$route.params.slug
            }

        }

    },
    watch: {
    },
    mounted() {
    },
    computed: {

    },
    methods: {
        goBack() {
            if (window.history) {
                window.history.go(-1);
            } else {
                console.error('History object not available');
            }
        }
    }
}
</script>
