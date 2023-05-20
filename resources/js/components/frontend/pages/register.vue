<template>

  <div class="sg-page-content">
    <div class="content-box">
      <div class="content-head-home">
        <div class="top-address left">
          <div class="container-xl">
              Register
          </div>
        </div>  		
      </div>

      <div class="mid-content brd1">
        <form class="ragister-form register" name="ragister-form" @submit.prevent="register">
          <h3 class="blue fw500">Create new Lekit account:</h3>
          <div class="info-required">* this information is required</div>

          <div class="row mt43">
            <div class="col-md-2"><h5 class="blue">Account: <span class="required">*</span></h5></div>
            <div class="col-md-10">
              <select name="type" id="acc_type" @change="isCompany()">
                <option value="Customer">Customer</option>
                <option value="Tradesman">Tradesman</option>
                <option value="Company">Company</option>
              </select>
            </div>
          </div>

          <div id="extra_company">
            <div class="row mt25">
              <div class="col-md-2"><h5 class="blue">Company: <span class="required">*</span></h5></div>
              <div class="col-md-10"><input name="company" type="text" placeholder="Company name" /></div>
            </div>
          </div>

          <div class="row mt43">
            <div class="col-md-2"><h5 class="blue">Title: <span class="required">*</span></h5></div>
            <div class="col-md-10">
              <select name="title">
                <option>Mr</option>
                <option>Mrs</option>
                <option>Miss</option>
              </select>
            </div>
          </div>

          <div class="row mt25">
            <div class="col-md-2"><h5 class="blue">First name:  <span class="required">*</span></h5></div>
            <div class="col-md-10"><input v-model="form.first_name" type="text" placeholder="" /></div>
          </div>

          <div class="row mt25">
            <div class="col-md-2"><h5 class="blue">Last name: <span class="required">*</span></h5></div>
            <div class="col-md-10"><input name="lname" v-model="form.last_name" type="text" placeholder="" /></div>
          </div>

          <div class="row mt25">
            <div class="col-md-2"><h5 class="blue">Email:  <span class="required">*</span></h5></div>
            <div class="col-md-10"><input name="email" type="email" v-model="form.email" placeholder="" /></div>
            <span class="validation_error" v-if="errors.email">{{ errors.email[0] }}</span>
          </div>

          <div class="row mt25">
            <div class="col-md-2"><h5 class="blue">Profession:</h5></div>
            <div class="col-md-10">
              <select name="profession">
                <option>Please select</option>
                <option>Builder/Multi Trade</option>
                <option>Landscape/Garden Maintenance</option>
                <option>DIY</option>
                <option>Other Trade</option>
                <option>Other Business</option>
                <option>Plumbing/Heating Engineer</option>
                <option>Electrician</option>
                <option>Joiner/Carpenter</option>
                <option>Maintenance</option>
                <option>Decorator</option>
                <option>Plasterer</option>
                <option>Kitchen Fitter</option>
                <option>Bathroom Fitter</option>
              </select>
            </div>
          </div>

          <div class="row mt25">
            <div class="col-md-2"><h5 class="blue">Postcode:  <span class="required">*</span></h5></div>
            <div class="col-md-10">
              <input class="postcode" name="postcode" type="text" placeholder="" />
              <div class="row mt15">
                <div class="col-md-4"><button class="my_but3" @click="findAddress">Find address</button></div>
                <div class="col-md-4"><button class="my_but3" id="type-address" @click="TypeAddress">Type in address</button></div>
              </div>
            </div>
          </div>

          <div class="extra-fields mt43" id="myTOG">
            <div class="row mt25">
              <div class="col-md-2"><h5 class="blue">Address:  <span class="required">*</span></h5></div>
              <div class="col-md-10"><input name="address" type="text" placeholder="" /></div>
            </div>
            <div class="row mt25">
              <div class="col-md-2"><h5 class="blue">Second line:</h5></div>
              <div class="col-md-10"><input name="address2" type="text" placeholder="" /></div>
            </div>
            <div class="row mt25">
              <div class="col-md-2"><h5 class="blue">Town/city:  <span class="required">*</span></h5></div>
              <div class="col-md-10"><input name="city" type="text" placeholder="" /></div>
            </div>
            <div class="row mt25">
              <div class="col-md-2"><h5 class="blue">County:</h5></div>
              <div class="col-md-10"><input name="county" type="text" placeholder="" /></div>
            </div>
            <div class="row mt25">
              <div class="col-md-2"><h5 class="blue">Postcode:  <span class="required">*</span></h5></div>
              <div class="col-md-10"><input name="postcode" type="text" placeholder="" /></div>
            </div>
          </div>
        
          <div class="mid-content gbg pb25">
            <p class="my_txt justify">
              Make your password stronger by using a mixture of uppercase &
  lowercase characters,<br>
  numbers and symbols (like ! or $).
            </p>

            <div class="row mt40">
              <div class="col-md-4"><h5 class="blue">Password:  <span class="required">*</span></h5></div>
              <div class="col-md-8">
                  <input type="password" v-model="form.password" name="pw" placeholder="" />
              </div>
            </div>
            <div class="row mt25">
              <div class="col-md-4"><h5 class="blue">Confirm password:  <span class="required">*</span></h5></div>
              <div class="col-md-8">
                  <input name="cpw" type="password" v-model="form.password_confirmation" placeholder="" />
              </div>
            </div>
          </div>

          <div class="mid-content mt40">
            <h3 class="blue fw500">Special Offers:</h3>
            <p class="my_txt2 justify mt25">Lekit would like to send you exclusive offers, vouchers, free gifts, deals and information about products and events.
  If you don't want to receive any of the below from us then please select 'NO'.</p>
            <div class="row mt40 offers">
              <div class="col-md-4">Email: <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked=""></div>
              </div>
              <div class="col-md-4">Phone:  <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked=""></div></div>
            </div>

            <div class="row mt25 offers">
              <div class="col-md-4">SMS:  <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked=""></div></div>
              <div class="col-md-4">Post:  <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked=""></div></div>
            </div>

            <p class="my_txt2 justify mt40  register-link">Your data is important to us, so we'll never share or sell it for another's benefit, for example any third party marketing. For Lekit Limited's full contact details and for further details of how we process your personal information, please see our <a href="#">Privacy Policy</a>. To update your settings at any point in the future, you can do this in your account settings. To update your app permissions, you can do this from the 'More' menu in the app. You can also contact us via the <a href="#">Privacy Policy.</a></p>
          </div>

          <div class="mid-content2">
            <p class="my_txt2 register-link">By clicking register, you agree to our <a href="#">Terms & Conditions.</a></p>
            <button class="my_but2">Register Now</button>
          </div>
        </form>
      </div>
      <br><br>  
    </div>  
  </div>

</template>

<script>


export default {
  name: "register",
  components: {

  },
  data() {
    return {
      form: {
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        password_confirmation: '',
        phone: '',
        address: '',
        phone_no: '',
        otp: '',
        // user_type: this.$route.params.type,
        // referral_code: this.$route.query.referral_code
      },
      optionTo: 'phone',
      social_login_active: false,
      loading: false,
      buttonText: 'Get OTP',
      phone_no: '',
      minute: 1,
      second: 60,
      otp: '',
      agreement: '',
      country_code: []
    }
  },
  watch: {
    $route(from, to) {
      this.form.user_type = from.params.type;
    }
  },

  mounted() {
    this.loginOptions();
  },
  computed: {
    loginRedirect() {
      return this.$store.getters.getLoginRedirection;
    }
  },
  methods: {
    findAddress(event){
      event.preventDefault();
    },
    TypeAddress(event) {
      event.preventDefault();
      var x = document.getElementById("myTOG");
      var y = document.getElementById("type-address");
      if (x.style.display !== "block") {
        x.style.display = "block";
        y.style.background = "#32549e";
        y.style.color = "white";
      } else {
        x.style.display = "none";
          y.style.background = "#e0e0e0";
        y.style.color = "#333";
      }
    },
    isCompany() {
      var q = document.getElementById("acc_type");
      var z =  q.options[ q.selectedIndex ].value;
      var p = document.getElementById("extra_company");
      if (z == "Tradesman" || z == "Company") {
            p.style.display = "block";
      } else {
        p.style.display = "none";
      }
    },
    countDownTimer() {
      this.minute = 1;
      this.second = 60;
      setInterval(() => {
        this.second--;
        if (this.second == 0) {
          this.minute--;
          this.second = 60;
          if (this.minute == 0) {
            this.minute = 0;
          }
        }
      }, 1000);
    },
    register() {
      debugger;
      // if (!this.$refs.customer_agreement.checkAgreements()) {
      //   return toastr.info(this.lang.accept_terms, this.lang.Error + ' !!');
      // }
      this.loading = true;
      let url = this.getUrl('register');
      this.form.real_otp = this.otp;
      if (this.form.real_otp != this.otp) {
        toastr.error(this.lang.OTP_doesnt_match, this.lang.Error + ' !!');
      }
      axios.post(url, this.form).then((response) => {
        this.loading = false;
        if (response.data.error) {
          this.$Progress.fail();
          toastr.error(response.data.error, this.lang.Error + ' !!');
        }
        if (response.data.success) {
          if (response.data.type == 1) {
            this.$store.dispatch('user', response.data.auth_user);
            this.$router.push({name: 'dashboard'});
          } else {
            this.$store.dispatch('user', response.data.auth_user);
            this.$router.push({name: 'account.success'});
          }

          this.errors = [];
          toastr.success(response.data.success, this.lang.Success + ' !!');
        }
      })
          .catch((error) => {
            this.loading = false;
            this.$Progress.fail();
            if (error.response && error.response.status == 422) {
              this.errors = error.response.data.errors;
            }
          })
    },
    socialLogin(form) {
      this.social_login_active = true;
      let url = this.getUrl('social-login');
      axios.post(url, form).then((response) => {
        this.loading = false;
        this.social_login_active = false;
        if (response.data.success) {
          this.errors = [];
          if (this.loginRedirect) {
            this.$router.push({name: this.loginRedirect});
          } else {
            this.$router.push({name: 'dashboard'});

            this.$store.dispatch('carts', response.data.carts);
            this.$store.dispatch('user', response.data.user);
            this.$store.dispatch('compareList', response.data.compare_list);
            this.$store.dispatch('wishlists', response.data.wishlists);
          }
        } else {
          toastr.error(response.data.error, this.lang.Error + ' !!');
        }
      }).catch((error) => {
        this.loading = false;
        this.social_login_active = false;
        toastr.error('Something Went Wrong, Please Try Again', this.lang.Error + ' !!');
      })
    },
    loginWithSocial(type) {
      let provider = '';
      if (type == 'fb') {
        provider = new FacebookAuthProvider();
        provider.addScope('user_birthday');
        provider.addScope('user_gender');
        provider.addScope('public_profile');
      } else if(type == 'google') {
        provider = new GoogleAuthProvider();
        provider.addScope('profile');
        provider.addScope('email');
      }
      else if(type == 'twitter') {
        provider = new TwitterAuthProvider();
      }

      const auth = getAuth();

      signInWithPopup(auth, provider)
          .then((result) => {
            let raw_user = JSON.parse(result._tokenResponse.rawUserInfo);

            let credential = '';
            let picture = '';

            if (type == 'fb') {
              credential = FacebookAuthProvider.credentialFromResult(result);
              picture = raw_user.picture ? raw_user.picture.data.url : '';
            } else if(type == 'google') {
              credential = GoogleAuthProvider.credentialFromResult(result);
              picture = raw_user.picture ? raw_user.picture : '';
            }
            else if(type == 'twitter')
            {
              credential = TwitterAuthProvider.credentialFromResult(result);
              picture = raw_user.picture ? raw_user.picture : '';
            }

            const token = credential.accessToken;
            // The signed-in user info.
            const user = result.user;

            let form = {
              name: raw_user.name ? raw_user.name : '',
              email: raw_user.email ? raw_user.email : '',
              phone: raw_user.phoneNumber ? raw_user.phoneNumber : '',
              uid: user.uid,
              dob: raw_user.birthday,
              gender: raw_user.gender,
              image: picture,
            };

            this.socialLogin(form);

          }).catch((error) => {
        // Handle Errors here.
        const errorCode = error.code;
        const errorMessage = error.message;
        // The email of the user's account used.
        const email = error.customData.email;
        // The AuthCredential type that was used.
        const credential = GoogleAuthProvider.credentialFromError(error);
        // ...
      });
    },
    loginOptions(optionTo) {
      if (optionTo) {
        if (optionTo == 'phone') {
          if (this.settings.disable_otp) {
            this.otp = true;
          }
          this.buttonText = 'Get OTP';
          this.optionTo = 'email';
        } else {
          this.buttonText = 'Sign Up';
          this.optionTo = 'phone';
        }
      } else {
        if (this.addons.includes('otp_system')) {
          this.optionTo = 'email';
          if (this.settings.disable_otp) {
            this.otp = true;
          }
          this.buttonText = 'Get OTP';
        } else {
          this.buttonText = 'Sign Up';
          this.optionTo = 'phone';
        }
      }
    },
    registerByPhone() {
      this.form.email = null;
      if (!this.$refs.customer_agreement.checkAgreements()) {
        return toastr.info(this.lang.accept_terms, this.lang.Error + ' !!');
      }
      let url = this.getUrl('register/by-phone');

      this.loading = true;
      axios.post(url, this.form).then((response) => {
        this.loading = false;
        if (response.data.error) {
          toastr.error(response.data.error, this.lang.Error + ' !!');
        } else {
          toastr.success(response.data.data, this.lang.Success + ' !!');
          this.errors = [];
          this.otp = true;
          this.countDownTimer();
        }
      }).catch((error) => {
        this.loading = false;
        this.$Progress.fail();
        if (error.response && error.response.status == 422) {
          this.errors = error.response.data.errors;
        }
      });
    },
    getNumber(number) {
      this.form.phone = number;
    }
  },
}
</script>
