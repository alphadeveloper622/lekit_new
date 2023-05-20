<template>
  <div class="yoori__signup--form" :class="{ 'error_border' : phone_error }">
    <div class="country__code--config" @click.stop="activeDropDown">
      <div class="country__code--config-details">
                <span class="country__code--flag">
                    <img :src="defaultCountry.flag" alt="Flag" class="img-fluid">
                </span>
        <span class="country__code--number">
                    {{ defaultCountry.code }}
                </span>
        <span class="country__dropdown"></span>
      </div>
      <ul @click.stop class="country__code--list" :class="activeClass">
        <input placeholder="Search" v-model="search_key" @keyup="countrySearch" type="text" class="country__search">
        <li v-for="(country,index) in filtered_countries" @click="getCountryCode(country)">
                        <span class="country__code--flag">
                          <img loading="lazy" :src="country.flag_icon" alt="Flag" class="img-fluid">
                        </span>
          <span class="country__name">
                          <strong>{{ country.name }}</strong>
                        </span>
          <span class="country__code--number">
                          {{ PlusCheck(country) ? country.phonecode : '+' + country.phonecode }}
                        </span>
        </li>
      </ul>
    </div> <!-- /.country__code--config -->
    <input type="tel" class="number" @keyup="$emit('phone_no', phone_no)" v-model="phone_no">
    <input type="hidden" v-model="country_id">
  </div>
</template>

<script>
export default {
  name: "telephone",
  props : ['phone_error'],

  data() {
    return {
      dropdown_active: false,
      search_key: '',
      selected_country: '',
      defaultCountry: {
        flag: '',
        code: '',
        name: ''
      },
      activeClass: 'hideShow',
      phone_no: '',
      count: 1,
      filtered_countries: [],
      country_id: [],

    }
  },

  watch: {
    phone() {
      this.phone_no = this.phone;
    }
  },
  mounted() {
    this.country();
    this.country_id = this.settings.default_country;
  },
  computed: {
    phone() {
      return this.$store.getters.getMobileNo;
    },
    countries() {
      return this.$store.getters.getCountryList;
    }
  },
  methods: {
    PlusCheck(country) {
      if (country) {
        return country.phonecode.includes("+");
      } else {
        return false
      }
    },
    getCountryCode(country) {
      this.activeClass = 'hideShow'
      this.phone_no = '';
      this.count = 1;

      if (country) {
        this.defaultCountry.flag = country.flag_icon;
      } else {
        this.defaultCountry.flag = this.getUrl('public/images/flags/bd.png');
      }

      let code = '+880'

      if (!country) {
        this.defaultCountry.code = code;
        this.defaultCountry.name = 'Bangladesh';
      } else {
        this.country_id = country.id;
        if (country.phonecode.includes("+")) {
          this.defaultCountry.code = country.phonecode;
        } else {
          this.defaultCountry.code = '+' + country.phonecode;
        }
        this.defaultCountry.name = country.name;
      }
      this.phone_no = this.defaultCountry.code;
    },
    activeDropDown() {
      if (this.activeClass == 'hideShow') {
        this.activeClass = ''
      } else {
        this.activeClass = 'hideShow'
      }
      this.$nextTick(() => {
        document.addEventListener('click', this.hideSearchDropdown)
      })
    },
    hideSearchDropdown: function () {
      this.activeClass = 'hideShow';
      document.removeEventListener('click', this.hideSearchDropdown)
    },
    countrySearch() {
      let res;
      res = this.countries.filter((d) => d.name || d.phonecode);
      this.filtered_countries = res.filter(
          (d) =>
              (d.name && d.name.toLowerCase().includes(this.search_key) || d.phonecode.includes(this.search_key))
      );
      return this.filtered_countries;
    },
    getNum() {
      this.$emit('phone_no', this.phone_no);
      this.count++
    },
    country() {
      let url = this.getUrl('get/country-list');
      if (this.countries.length > 0) {
        this.filtered_countries = this.countries;
        let country = this.countries.find(el => el.id == this.settings.default_country);
        this.getCountryCode(country);
      } else {
        axios.get(url).then((response) => {
          if (response.data.error) {
            toastr.error(response.data.error, this.lang.Error + ' !!');
          } else {
            this.$store.commit('setCountryList',response.data.countries);
            this.filtered_countries = response.data.countries;
            let country = this.countries.find(el => el.id == this.settings.default_country);
            this.getCountryCode(country);
          }
        });
      }
    },
  }
}
</script>

<style scoped>

</style>
