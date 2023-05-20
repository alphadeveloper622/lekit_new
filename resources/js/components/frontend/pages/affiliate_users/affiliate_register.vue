<template>
  <div class="sg-page-content">
    <section class="ragister-account text-center">
      <div class="container">
        <div class="account-content">
          <div class="thumb">
            <img :src="settings.affiliate_sing_up_banner" loading="lazy" :alt="form.user_type" class="img-fluid img-fit"/>
          </div>
          <div class="form-content">
            <h1>{{ lang.sign_up }} </h1>
            <p v-if="otp">{{ lang.enter_to_complete_registration }}</p>
            <p v-else>{{ lang.sign_to_continue_shopping }}</p>
            <h5 class="registration_heading" v-if="form.user_type == 'seller'">{{ lang.personal_info }}</h5>
            <form class="ragister-form" name="ragister-form" @submit.prevent="register">
              <div>
                <div class="form-group">
                  <span class="mdi mdi-name mdi-account-outline"></span>
                  <input type="text" v-model="form.first_name" class="form-control"
                         :class="{ 'error_border' : errors.first_name }"
                         :placeholder="lang.first_name"/>
                </div>
                <span class="validation_error" v-if="errors.first_name">{{
                    errors.first_name[0]
                  }}</span>
                <div class="form-group">
                  <span class="mdi mdi-name mdi-account-outline"></span>
                  <input type="text" v-model="form.last_name" class="form-control"
                         :class="{ 'error_border' : errors.last_name }"
                         :placeholder="lang.last_name"/>
                </div>
                <span class="validation_error" v-if="errors.last_name">{{ errors.last_name[0] }}</span>
                <div class="form-group">
                  <span class="mdi mdi-name mdi-email-outline"></span>
                  <input type="email" v-model="form.email" class="form-control mb-0"
                         :class="{ 'error_border mb-0' : errors.email }" :placeholder="lang.email"/>
                </div>
                <span class="validation_error"
                      v-if="errors.email">{{ errors.email[0] }}</span>

                <div class="mt-4">
                  <telePhone @phone_no="getNumber" :phone_error="errors.phone ? errors.phone[0] : null"></telePhone>
                  <span class="validation_error" v-if="errors.phone">{{ errors.phone[0] }}</span>
                </div>
                <div class="form-group"
                     :class="{ 'mt-4' : !addons.includes('otp_system') }">
                  <span class="mdi mdi-name mdi-lock-outline"></span>
                  <input type="password" v-model="form.password" class="form-control"
                         :class="{ 'error_border' : errors.password }" :placeholder="lang.Password"/>
                </div>
                <span class="validation_error"
                      v-if="errors.password">{{ errors.password[0] }}</span>
                <div class="form-group mt-4">
                  <span class="mdi mdi-name mdi-lock-outline"></span>
                  <input type="password" v-model="form.password_confirmation" class="form-control"
                         :class="{ 'error_border' : errors.password_confirmation }" :placeholder="lang.password_confirmation"/>
                </div>
                <span class="validation_error"
                      v-if="errors.password_confirmation">{{ errors.password_confirmation[0] }}</span>
              </div>
              <button type="submit" class="btn" v-if="!loading">
                {{ lang.sign_up }}
              </button>
              <loading_button v-if="loading" :class_name="'btn'"></loading_button>
            </form>
            <!-- /.contact-form -->
          </div>
        </div>
        <!-- /.account-content -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.ragister-account -->
  </div>

</template>

<script>
import telePhone from "../../partials/telephone";


export default {
  name: "register",
  components: {
    telePhone,
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
        user_type: 'affiliate-register',
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

  computed: {
    loginRedirect() {
      return this.$store.getters.getLoginRedirection;
    }
  },
  methods: {
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

      this.loading = true;
      let url = this.getUrl('register');

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
            this.$router.push({name: 'login'});
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
    getNumber(number) {
      this.form.phone = number;
    }
  },
}
</script>
