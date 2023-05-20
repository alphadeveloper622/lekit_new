<template>
	<header>
		<div class="head-top">
			<div class="container-xl row">
				<div class="col-md-4 top-txt">UK fastest hardware store delivery service...</div>
				<!-- TOP MENU -->
				<div class="col-md-8 top-nav">
					<ul>
						<li>OUR APP</li>
						<li>DRIVERS</li>
						<li>HELP & SUPPORT</li>
						<li>FAQ</li>
						<li>
							<!-- VAT Switch -->
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
									checked>
								<label class="form-check-label" for="flexSwitchCheckChecked">VAT prices</label>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="head-main">
			<div class="container-xl row">
				<div class="col-xl-8 col-lg-8  main-nav row">

					<div class="col-xl-3 col-lg-3 logo">
						<a :href="getUrl('')"><img :src="settings.light_logo"></a>
					</div>

					<!-- MAIN MENU -->
					<div class="col-xl-9 col-lg-9 navigation">
						<ul>
							<li><router-link class="" :to="{ name: 'product.list.row' }">CATALOG</router-link></li>
							<li><a :href="getUrl('stores')">OUR STORES</a></li>
							<li><router-link class="" :to="{ name: 'about' }">WHO WE ARE</router-link></li>
							<li><router-link class="" :to="{ name: 'blank' }" >CORPORATE</router-link></li>
						</ul>
					</div>
				</div>

				<div class="col-xl-4 col-lg-4  main-tools">
					<ul class="tools-nav">
						<li class="mobile-menu">
							<span class="navbar-toggler" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
									class="bi bi-list" viewBox="0 0 16 16">
									<path fill-rule="evenodd"
										d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
									<span class="text-item" title="Menu">MENU</span>
								</svg>
							</span>
						</li>

						<li data-bs-toggle="modal" data-bs-target="#search-pop">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									version="1.1" width="40" height="40" viewBox="0 0 24 24">
									<path fill="white"
										d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z">
									</path>
								</svg>
								<span class="text-item" title="Search">SEARCH</span>
							</span>
						</li>

						<!-- <li data-bs-toggle="modal" data-bs-target="#my-account"> -->
						<li>
							<span class="text-left text" v-if="authUser">
								
								<span class="loginscreen-toggler collapsed" id="user-item" data-bs-toggle="modal" data-bs-target="#my-account" v-if="authUser.user_type == 'customer'">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										version="1.1" width="40" height="40" viewBox="0 0 24 24" id="user-icon">
										<path fill="white"
											d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11A1.5,1.5 0 0,1 10.5,9.5A1.5,1.5 0 0,1 12,8A1.5,1.5 0 0,1 13.5,9.5A1.5,1.5 0 0,1 12,11Z">
										</path>
									</svg>
									<span class="text-item">ME</span>
								</span>
								
								<a class="" :href="getUrl('seller/dashboard')" v-if="authUser.user_type == 'seller'">
									<span class="loginscreen-toggler collapsed" id="user-item">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
											version="1.1" width="40" height="40" viewBox="0 0 24 24" id="user-icon">
											<path fill="white"
												d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11A1.5,1.5 0 0,1 10.5,9.5A1.5,1.5 0 0,1 12,8A1.5,1.5 0 0,1 13.5,9.5A1.5,1.5 0 0,1 12,11Z">
											</path>
										</svg>
										<span class="text-item">ME</span>
									</span>
								</a>
								<a class="" :href="getUrl('admin/dashboard')" v-if="authUser.user_type == 'admin' || authUser.user_type == 'staff'">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										version="1.1" width="40" height="40" viewBox="0 0 24 24" id="user-icon">
										<path fill="white"
											d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11A1.5,1.5 0 0,1 10.5,9.5A1.5,1.5 0 0,1 12,8A1.5,1.5 0 0,1 13.5,9.5A1.5,1.5 0 0,1 12,11Z">
										</path>
									</svg>
									<span class="text-item">ME</span>
								</a>
								
							</span>
							<span style="width: fit-content;" v-else>
								<router-link class="" :to="{ name: 'login' }">
									<span class="loginscreen-toggler collapsed" id="user-item">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
											version="1.1" width="40" height="40" viewBox="0 0 24 24" id="user-icon">
											<path fill="white"
												d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11A1.5,1.5 0 0,1 10.5,9.5A1.5,1.5 0 0,1 12,8A1.5,1.5 0 0,1 13.5,9.5A1.5,1.5 0 0,1 12,11Z">
											</path>
										</svg>
										<span class="text-item">LOGIN</span>
									</span>
								</router-link>
							</span>
						</li>


						<li data-bs-toggle="modal" data-bs-target="#shopping-bag">
							<div class="count"><span>0</span></div>
							<svg viewBox="0 0 24 24" type="cart" size="40" color="white" width="40" height="40">
								<path fill="white"
									d="M17 18a2 2 0 0 1 2 2 2 2 0 0 1-2 2 2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1V2m6 16a2 2 0 0 1 2 2 2 2 0 0 1-2 2 2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7 2.78-5H6.14l2.36 5H16Z">
								</path>
							</svg>
							<span class="text-item">BASKET</span>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- MOBILE MENU -->
		<div class="mob-menu">
			<div class="collapse" id="navbarToggleExternalContent">
				<ul>
					<li><router-link class="" :to="{ name: 'product.list.row' }">CATALOG</router-link></li>
					<li><a :href="getUrl('stores')">OUR STORES</a></li>
					<li><router-link class="" :to="{ name: 'about' }">WHO WE ARE</router-link></li>
					<li><router-link class="" :to="{ name: 'blank' }" >CORPORATE</router-link></li>
				</ul>
			</div>
		</div>

		<div id="search-pop" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Search Store & Products</h4>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body center">
                        <p style="color:black;">Before you can search for our stores or products you need to insert your delivery address first.</p>

                        <div class="pop-search">
                            <div class="input-group">
                                <input class="form-control border-end-0 border rounded-pill" type="text" id="delivery-address" placeholder="Insert your delivery address">
                                <span class="input-group-append search-icon " style="color:black;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewbox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

		<!------- MODAL - SIDE PANEL - SHOPPING BAG / RIGHT ----------------------------->
		<div class="modal fade" id="shopping-bag" tabindex="-1" aria-labelledby="shopping-bag" aria-hidden="true">
			<div class="modal-dialog modal-dialog-slideout modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel">
							<svg class="sider-svg" type="cart" size="33" color="white" width="33" height="40"  viewbox="0 0 24 24">
								<path fill="#999999" d="M17 18a2 2 0 0 1 2 2 2 2 0 0 1-2 2 2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1V2m6 16a2 2 0 0 1 2 2 2 2 0 0 1-2 2 2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7 2.78-5H6.14l2.36 5H16Z"></path>
							</svg>
							&nbsp;Shopping Bag</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p class="mt25" style="color:black">You have no products in your shopping bag.</p>
					</div>
					<div class="modal-footer text-right" style="color:black;">
						Your Total: £0.00
					</div>
				</div>
			</div>
		</div>
		<!------- MODAL - SIDE PANEL - MY ACCOUNT / LEFT ----------------------------->
		<div class="modal fade" id="my-account" tabindex="-1" aria-labelledby="my-account" aria-hidden="true">
			<div class="modal-dialog modal-dialog-slideout modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="login">
							<svg class="sider-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="33" height="33" viewbox="0 0 24 24" id="user-icon">
								<path fill="#999999" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11A1.5,1.5 0 0,1 10.5,9.5A1.5,1.5 0 0,1 12,8A1.5,1.5 0 0,1 13.5,9.5A1.5,1.5 0 0,1 12,11Z"></path>
							</svg>
							&nbsp; My Account</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body side-account">
						<ul>
							<li><router-link class="" :to="{ name: 'dashboard' }" ><div data-bs-dismiss="modal" aria-label="Close">Main Menu</div></router-link></li>
							<li><a href="#">Live Orders</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Previous Purchases</a></li>
							<li><a href="#">Saved Items</a></li>
							<li><a href="#">Finances</a></li>
							<li><a href="#">Payment Cards</a></li>
							<li><a href="#">Personal Details</a></li>
							<li><a href="#">Security &amp; Settings</a></li>
							<li><a href="#">Help &amp; Support</a></li>
							<li><a href="#">Address Book</a></li>
							<li><a href="javascript:void(0)" @click="logout">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</header>
</template>

<script>

export default {
	name: "headNav",
	data() {
		return {

		};
	},
	mounted() {
		
	},
};
</script>
