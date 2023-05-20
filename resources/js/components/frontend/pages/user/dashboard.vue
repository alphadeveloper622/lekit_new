<style>
.account-menu {
  padding: 25px;
}

.mb40 {
  margin-bottom:40px;
}

.account-content .row {
  padding:0px;
}

.account-content .col-md-4 {
  padding: 2px 4px 8px 8px !important;
}

.account-content .account-box {
background:#f5f5f5;
  min-height:200px;
  border: 1px solid #cecece;
  margin:0px;
  padding:15px;
  cursor:pointer;
  height:100%;
}

.account-box:hover {
  opacity:0.65;
}

.gbg2 {
  background: #f5f5f5;
}

.mt10 {
  margin-top:10px !important;
}

.account-menu ul {
  list-style: square;
  color:#999;
  font-size:1.1em;
  line-height:2.25em;
  margin:25px 0;
}

.account-menu a:link,
.account-menu a:visited,
.account-menu a:active {
  text-decoration: none;
  font-weight:400 !important;
  color:#32549e !important;
  cursor:pointer;
}

.account-menu li:hover a {
   color:#000;
   font-weight:500 !important;
}

.account-menu ul li:hover {
   cursor:pointer;
}
</style>

<template>
  <div class="sg-page-content">
    <div class="content-box">
      <div class="content-head-home">
        <div class="top-address left">
            <div class="container-xl">
                My Account
            </div>
        </div>  		
      </div>
      <div class="container-xl row mt40 mb40">

        <div class="col-md-3 account-menu gbg2">
          
          <h4 class="fw500 blue">MAIN MENU</h4>

          <ul>
            <li><a href="#">Live Orders</a></li>
            <li><a href="#">Order History</a></li>
            <li><a href="#">Previous Purchases</a></li>
            <li><a href="#">Saved Items</a></li>
            <li><a href="#">Finances</a></li>
            <li><a href="#">Payment Cards</a></li>
            <li><a href="#">Personal Details</a></li>
            <li><a href="#">Security & Settings</a></li>
            <li><a href="#">Help & Support</a></li>
            <li><a href="#">Address Book</a></li>
            <li><a href="javascript:void(0)" @click="logout">Logout</a></li>
          </ul>

        </div>



        <div class="col-md-9 account-content">
          <div class="row">
            <div class="col-md-4">
              <div class="account-box center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-truck" viewBox="0 0 16 16">
                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
                <h3 class="orange mt10 fw500">Live Orders</h3>
                <p class="my_txt mt10">Any deliveries that are in delivery process right now.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="account-box center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-cart-check" viewBox="0 0 16 16">
                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                      </svg>
                <h3 class="orange mt10 fw500">Order History</h3>
                <p class="my_txt mt10">See all your previous purchases with Lekit.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="account-box center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-box-seam" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                  </svg>
                <h3 class="orange mt10 fw500">Previous Purchases</h3>
                <p class="my_txt mt10">Browse all products you previously purchased.</p>
              </div>
            </div>
          </div>

            <div class="row">
            <div class="col-md-4">
              <div class="account-box center">
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                  </svg>
                <h3 class="orange mt10 fw500">Saved Items</h3>
                <p class="my_txt mt10">Keep an eye on your desired products from all Lekit stores.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="account-box center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-currency-pound" viewBox="0 0 16 16">
                      <path d="M4 8.585h1.969c.115.465.186.939.186 1.43 0 1.385-.736 2.496-2.075 2.771V14H12v-1.24H6.492v-.129c.825-.525 1.135-1.446 1.135-2.694 0-.465-.07-.913-.168-1.352h3.29v-.972H7.22c-.186-.723-.372-1.455-.372-2.247 0-1.274 1.047-2.066 2.58-2.066a5.32 5.32 0 0 1 2.103.465V2.456A5.629 5.629 0 0 0 9.348 2C6.865 2 5.322 3.291 5.322 5.366c0 .775.195 1.515.399 2.247H4v.972z"/>
                    </svg>
                <h3 class="orange mt10 fw500">Finances</h3>
                <p class="my_txt mt10">Have your finances under control, check your balance.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="account-box center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-credit-card-2-back" viewBox="0 0 16 16">
                    <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z"/>
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z"/>
                  </svg>
                <h3 class="orange mt10 fw500">Payment Cards</h3>
                <p class="my_txt mt10">Keep your payment cards securely saved for easy & fast purchases.</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="account-box center">
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-person-vcard" viewBox="0 0 16 16">
                  <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z"/>
                  <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z"/>
                </svg>
                            <h3 class="orange mt10 fw500">Personal Details</h3>
                <p class="my_txt mt10">Please make sure your personal details are always up to date.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="account-box center">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-shield-check" viewBox="0 0 16 16">
                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                        <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                      </svg>
                <h3 class="orange mt10 fw500">Security & Settings</h3>
                <p class="my_txt mt10">Tailor your online buying at our store to the best experience.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="account-box center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-houses" viewBox="0 0 16 16">
                    <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z"/>
                  </svg>
                <h3 class="orange mt10 fw500">Address Book</h3>
                <p class="my_txt mt10">Manage your delivery addresses accordingly.</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="account-box center">
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                  </svg>
                <h3 class="orange mt10 fw500">Help & Support</h3>
                <p class="my_txt mt10">For any issues or assistance please contact us.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="account-box center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="#9e9e9e" class="bi bi-power" viewBox="0 0 16 16">
                          <path d="M7.5 1v7h1V1h-1z"/>
                          <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                        </svg>
                        <a href="javascript:void(0)" @click="logout"><h3 class="orange mt10 fw500">Logout</h3></a>
                <p class="my_txt mt10">Leave our website safely & visit us again.</p>
              </div>
            </div>
          </div>


        </div>


      </div>
      <br><br>
    </div>
  </div>
</template>

<script>

export default {
  name: "myaccount",
  components: {
  },
  data() {
    return {
      
    }
  },
  mounted() {
    
  },
  watch: {
    
  },
  computed: {
    
  },

  methods: {
    
  },
}
</script>
