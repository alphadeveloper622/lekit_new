<template>
   
  <div class="sg-page-content">
    <div class="content-box">
      <div class="content-head-home">
        <div class="top-address left">
          <div class="container-xl">
              Sign in or Register
          </div>
        </div>  		
      </div>

      <div class="mid-content">
        <div class="row">
          <div class="col-md-7 br1 signin">
            <form class="login-form" name="login-form" @submit.prevent="login">
              <h3 class="blue fw500">Existing Customers:</h3>
              <div class="row mt40">
                <div class="col-md-3"><h5 class="blue">Email:</h5></div>
                <div class="col-md-9"><input type="text" placeholder="" v-model="form.email"/></div>
              </div>
              <div class="row mt25">
                <div class="col-md-3"><h5 class="blue">Password:</h5></div>
                <div class="col-md-9">
                    <input type="password" placeholder="" v-model="form.password" />
                    <div class="forgotten">
                      <router-link :to="{name:'reset.password'}">
                        Forgotten password?
                      </router-link>
                    </div>
                </div>
              </div>
              <br/>
              <loading_button v-if="loading" :class_name="'my_but2s'"></loading_button>
              <button  v-else class="my_but2">Sign In</button>

              <h5 class="mt43">Or sign in with social networks:</h5>
              <div class="row mt25">
                <div class="col-md-4 center"><button class="my_but4" @click="loginWithSocial('google')">Google</button></div>
                <div class="col-md-4 center"><button class="my_but4" @click="loginWithSocial('fb')">Facebook</button></div>
                <div class="col-md-4 center"><button class="my_but4" @click="loginWithSocial('twitter')">Twitter</button></div>
              </div>
            </form>
          </div>
          
          <div class="col-md-5 pl30">
            <h3 class="blue fw500">New Lekit customer?</h3>
            <div class="row mt25">
              <div class="col-md-12 my_txt justify">
                If you have never shopped with Lekit 
                before you will need a web account.
                <br><br>
                Creating an account is easy and 
                only takes a few minutes.
                <br>
                <button class="my_but2 mt43"><router-link :to="{ name : 'register' }">Register Now</router-link></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mid-content gbg">
        <div class="row">
          <div class="col-md-8">
            <h3 class="blue fw500">Need some help?</h3>
            <div class=" my_txt justify mt15">
              <p><strong>Trouble loggin in? Concerns whith your order?</strong></p>
              <p>Please visit our FAQ’s page where you will find lots of self-help guides that may answer your question. If what you need is not here, our UK call centre is open 24 hours a day 7 days a week to assist you with any questions or queries you may have.</p>
            </div>
            <div class="row">
              <div class="col-md-6 mt5 black">
                <strong>Call us anytime on:</strong><br>
                0780 9671 303
              </div>
              <div class="col-md-6 mt5 black online-chat">
                <strong>Or use our online chat support:</strong>
                <a href="#">Request online chat</a>
              </div>
            </div>
          </div>
          <div class="col-md-4"><img class="responsive" :src="getUrl('public/images/news/support.png')" alt="Drill product" /></div>
        </div>
      </div>
      <br><br>
    </div>
  </div>
</template>

<script>
import telePhone from "../partials/telephone";
import {getAuth, signInWithPopup, GoogleAuthProvider, FacebookAuthProvider, TwitterAuthProvider} from "firebase/auth";

export default {
  name: "sign_in",
  components: {
    telePhone
  },
  data() {
    return {
      form: {
        email: '',
        password: '',
        _token: this.token,
        remember: 0,
        captcha: '',
      },
      phoneForm: {
        phone: '',
        otp: '',
      },
      otp_field: false,
      loading: false,
      optionTo: 'phone',
      buttonText: 'Sign In',
      social_login_active: false
    }
  },
  mounted() {
    if (this.authUser) {
      //this.$router.go(-1);
    }
    if (this.settings.is_recaptcha_activated == 1) {
      this.captcha();
    }
    this.loginOptions();
  },
  watch: {
    lang() {
      this.loginOptions();
    }
  },
  computed: {
    loginRedirect() {
      return this.$store.getters.getLoginRedirection;
    }
  },

  methods: {
    login(direct_login) {
      debugger;
      let form = this.form;
      let url = this.getUrl('login');
      if (direct_login == 'direct_login') {
        this.form.captcha = '1';
      } else {
        if (this.settings.is_recaptcha_activated == 1 && this.optionTo == 'phone') {
          let captcha = window.captcha;

          if (captcha) {
            this.form.captcha = captcha;
          } else {
            return toastr.warning(this.lang.verify_google_recaptcha, this.lang.Warning + ' !!');
          }
        }
      }

      const axiosWithCredentials = axios.create({
        withCredentials: false
      });
      this.$store.commit('getCountCompare', true);

      if (direct_login != 'direct_login') {
        if (this.optionTo == 'phone') {
          form = this.form;
        } else if (this.optionTo == 'email' && !this.otp_field) {
          if (!this.settings.disable_otp)
          {
            url = this.getUrl('get-otp');
          }
          form = this.phoneForm;
        } else if (this.otp_field) {
          url = this.getUrl('submit-otp');
          form = this.phoneForm;
        }
      }

      this.loading = true;

      axiosWithCredentials.post(url, form).then((response) => {
        this.loading = false;
        if (response.data.error) {
          toastr.error(response.data.error, this.lang.Error + ' !!');
        }

        if (response.data.success) {

          window.captcha = '';
          this.errors = [];

          if (this.optionTo == 'email' && !this.otp_field && direct_login != 'direct_login' && !this.settings.disable_otp) {
            this.otp_field = true;
            this.buttonText = this.lang.sign_in;
          } else {
            if (this.loginRedirect) {
              this.$router.push({name: this.loginRedirect});
            } else {
              let user = response.data.user;
              if (user.user_type == 'customer') {
                this.$router.push({name: 'dashboard'});
                /*this.$store.dispatch("activeCurrency", response.data.active_currency);
                this.$store.dispatch("activeLanguage", response.data.active_language);
                this.langKeywords();*/
              } else if (user.user_type == 'admin' || user.user_type == 'staff') {
                this.loading = true;
                document.location.href = this.getUrl('admin/dashboard');
              } else if (user.user_type == 'seller') {
                this.loading = true;
                document.location.href = this.getUrl('seller/dashboard');
              }
            }

            this.$store.dispatch('carts', response.data.carts);
            this.$store.dispatch('user', response.data.user);
            this.$store.dispatch('compareList', response.data.compare_list);
            this.$store.dispatch('wishlists', response.data.wishlists);
          }
        }
      }).catch((error) => {
        this.loading = false;
        if (error.response && error.response.status == 422) {
          this.errors = error.response.data.errors;
        }
      });
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
    loginOptions(optionTo) {
      this.errors = [];
      if (optionTo) {
        if (optionTo == 'phone') {
          if (this.settings.disable_otp)
          {
            this.buttonText = this.lang.sign_in;
          }
          else{
            this.buttonText = this.lang.get_oTP;
          }
          this.optionTo = 'email';
        } else {
          this.buttonText = this.lang.sign_in;
          this.optionTo = 'phone';
        }
      } else {
        if (this.addons.includes('otp_system')) {
          this.optionTo = 'email';
          if (this.settings.disable_otp)
          {
            this.buttonText = this.lang.sign_in;
          }
          else{
            this.buttonText = this.lang.get_oTP;
          }
        } else {
          this.buttonText = this.lang.sign_in;
          this.optionTo = 'phone';
        }
      }

    },
    captcha() {
      const script = document.createElement("script")
      script.src = "https://www.google.com/recaptcha/api.js";
      document.body.appendChild(script);
    },
    copyLoginInfo(email) {
      this.form.email = email;
      this.form.password = '123456';
      this.login('direct_login');
    },
    getNumber(number) {
      this.phoneForm.phone = number;
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
    langKeywords() {
      let url = this.getUrl('language/keywords');
      axios.get(url).then((response) => {
        if (response.data.error) {
          toastr.info(response.data.error, this.lang.Info + ' !!');
        } else {
          this.$store.commit('setLangKeywords', response.data.lang);
          let language = response.data.language;
          if (language.text_direction == 'rtl') {
            document.body.setAttribute('dir', 'rtl');
            this.settings.text_direction = 'rtl';
          }
        }
      })
    },
  },
}
</script>
