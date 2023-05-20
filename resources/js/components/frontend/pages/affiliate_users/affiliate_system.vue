<template>
  <div class="sg-page-content">
    <section class="edit-profile">
      <div class="container">
        <div class="row">
          <user_sidebar :current="current"></user_sidebar>
          <div class="col-lg-9 pl-lg-5">
            <div class="sg-shipping">
              <div class="title">
                <h1>Affiliate System</h1>
              </div>
            </div>
            <div class="row" v-if="is_shimmer">
              <div class="col-md-6">
                <div class="card text-center profile-card d-flex justify-center profile-card-white-outline-dashed">
                  <div class="profile-card-title text-black mb-3">{{ lang.total_balance }}</div>
                  <h3 class="text-black">{{ priceFormat(authUser.balance) }}</h3>
                </div>
              </div>
              <div class="col-md-6">
                <a href="#" data-bs-target="#recharge_wallet" data-bs-toggle="modal">
                  <div
                      class="card text-center profile-card d-flex justify-center profile-card-white-outline-dashed">
                    <div class="profile-card-title mb-3">{{ lang.recharge_wallet }}</div>
                    <h3><i class="mdi mdi-plus"></i></h3>
                  </div>
                </a>
              </div>
            </div>
            <div class="row" v-if="is_shimmer">
              <div class="col-md-3">
                <div class="card text-center profile-card d-flex justify-center profile-card-white-outline-dashed">
                  <div class="profile-card-title text-black mb-3">Number Of Click</div>
                  <h3 class="text-black">{{affiliate_states.no_of_click}}</h3>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center profile-card d-flex justify-center profile-card-white-outline-dashed">
                  <div class="profile-card-title text-black mb-3">Number Of Item</div>
                  <h3 class="text-black">{{affiliate_states.no_of_order_item}}</h3>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center profile-card d-flex justify-center profile-card-white-outline-dashed">
                  <div class="profile-card-title text-black mb-3">Number Of Delivered</div>
                  <h3 class="text-black">{{affiliate_states.no_of_delivered}}</h3>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center profile-card d-flex justify-center profile-card-white-outline-dashed">
                  <div class="profile-card-title text-black mb-3">Number Of Cancel</div>
                  <h3 class="text-black">{{affiliate_states.no_of_cancel}}</h3>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="form-box-content p-3">
                  <h6>Affiliate Link</h6>
                    <div class="form-group">
                      <textarea  class="form-control affiliate_link" readonly type="text" >{{affiliate_link}}</textarea>
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" :id="'testing-code_'+affiliate_link" :value="affiliate_link">
                    </div>
                    <button type=button id="ref-cpurl-btn" class="btn btn-primary float-right" data-attrcpy="Copied" @click="copyToClipboard" >Copy Url</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" v-else-if="shimmer">
              <div class="col-md-6 mb-3" v-for="(num,i) in 2">
                <shimmer :height="100"></shimmer>
              </div>
            </div>
            <div class="row" v-if="is_shimmer">
              <div class="col-md-12 overflow-y-auto">
                <div class="sg-table">
                  <div class="justify-content-between title b-0 mb-2 mt-3">
                    <h1>MarketPlace Links</h1>
                  </div>
                  <table class="table dashboard-table">
                    <thead>
                    <tr>
                      <th class="text-end" scope="col">#</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Commissions</th>
                      <th scope="col">Link</th>
                      <th scope="col">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(product,index) in affiliate_products.data" :key="index">
                      <td class="text-end">{{ ++index }}</td>
                      <th scope="row">
                        <div class="product">
                          <a href="javascript:void(0)">
                        <span class="product-thumb">
                          <img :src="product.image_40x40" :alt="product.product_name"
                               class="img-fluid">
                        </span>
                            <div class="text">
                              <p>{{ product.product_name }}</p>
                            </div>
                          </a>
                        </div><!-- /.product -->
                      </th>
                      <td>You will get {{ product.affiliate_amount }}% Per Sale</td>
                      <td>{{ url }}/product/{{product.slug}}?referral_code={{authUser.referral_code}}</td>
                      <td>
                        <div class="add-to-cart mb-2 mt-2">
                          <a href="javascript:void(0)"
                             @click="copyProductUrl(getUrl('product/') + product.slug + '?referral_code=' + authUser.referral_code)" class="btn ">Copy Url</a>
                          <div class="form-group">
                            <input type="hidden" class="form-control" :id="'testing-product-url_'+getUrl('product/') + product.slug + '?referral_code=' + authUser.referral_code" :value="getUrl('product/') + product.slug + '?referral_code=' + authUser.referral_code">
                          </div>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-12 text-center show-more mt-3" v-if="next_page_url && !loading">
                  <a href="javascript:void(0)" @click="loadWallets()" class="btn btn-primary">{{ lang.show_more }}</a>
                </div>
                <div class="col-md-12 text-center show-more mt-3" v-show="loading">
                  <a href="javascript:void(0)" class="btn btn-primary"><img width="20" :src="getUrl('public/images/default/preloader.gif')"
                                                                alt="preloader">{{
                      this.lang.loading
                    }}</a>
                </div>
              </div>
            </div>
            <div class="row" v-else-if="shimmer">
              <div class="col-md-12 mb-3 overflow-y-auto" v-for="(num,i) in 6">
                <shimmer :height="50"></shimmer>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import user_sidebar from "../../partials/user_sidebar";
import shimmer from "../../partials/shimmer";


export default {
  name: "affiliate_system",
  components: {
    user_sidebar, shimmer
  },
  data() {
    return {
      current: 'affiliate_system',
      page: 1,
      next_page_url: false,
      amount: 0,
      offline_methods: [],
      indian_currency: {},
      xof: '',
      form: {
        total: ''
      },
      loading: false,
      is_shimmer: false,

      trx_id :"",
      code :"",
      wallet_recharge :"wallet_recharge",
      payment_component_load:false,
      affiliate_products:[],
      affiliate_states:[],
      affiliate_link : '',
      product_link : ''

    }
  },
  created() {
    if (this.settings.wallet_system != 1) {
      this.$router.push({name: 'home'});
    }
  },
  mounted() {
      this.loadWallets();
      this.affiliate_link = this.getUrl('register') + '?referral_code=' + this.authUser.referral_code
  },
  computed: {
    wallets() {
      return this.$store.getters.getWalletRecharges;
    },
    shimmer() {
      return this.$store.state.module.shimmer
    },
    reference() {
      let text = "";
      let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for (let i = 0; i < 10; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

      return text;
    }
  },
  methods: {
    loadWallets() {
      let url = this.getUrl('user/affiliate-links?page=' + this.page);
      console.log(url)
      if (this.page > 1) {
        this.loading = true;
      }
      this.$Progress.start();

      axios.get(url).then((response) => {
        this.loading = false;
        this.is_shimmer = true;
        if (response.data.error) {
          toastr.error(response.data.error, this.lang.Error + ' !!');
        } else {
          this.affiliate_products = response.data.products
          this.affiliate_states = response.data.affiliate_states
          this.next_page_url = response.data.recharges.next_page_url;
          this.page++;
          this.$Progress.finish();
        }
      });
    },
    copyToClipboard () {
      var copyText = document.getElementById('testing-code_'+this.affiliate_link);

      if (copyText)
      {
        copyText.setAttribute('type','text');
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        // navigator.clipboard.writeText(copyText.value);
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
        copyText.setAttribute('type','hidden');
        window.getSelection().removeAllRanges();
      }

    },
    copyProductUrl(slug){
      console.log(slug)
      var copyText = document.getElementById('testing-product-url_'+slug);

      if (copyText)
      {
        copyText.setAttribute('type','text');
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        // navigator.clipboard.writeText(copyText.value);
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
        copyText.setAttribute('type','hidden');
        window.getSelection().removeAllRanges();
      }
    }
  }
}
</script>
