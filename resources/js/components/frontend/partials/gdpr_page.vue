<template>
  <div class="form-checkbox custom-gdpr" v-if="agreements.length > 0">
    <div class="form-group">
      <input type="checkbox" id="tnc" value="2"
             v-model="agreement"
             class="form-check-input">
      <label for="tnc">
        <div>{{ lang.agreement }}
        <span class="agreement" v-for="(agreement,index) in agreements" :key="index">
                        <a v-if="urlCheck(agreement.link)" :href="agreement.link">{{ agreement.title }}</a>
                        <router-link v-else :to="'page/'+agreement.link">{{ agreement.title }}</router-link>
                        <a href="javascript:void(0)" class="separator"
                           v-if="index+2 < agreements.length">,</a>
                        <a href="javascript:void(0)" class="separator"
                           v-else-if="index+1 < agreements.length">&</a>
                      </span>
        </div>
      </label>
    </div>
  </div>
</template>

<script>

export default {
  props: ['agreements'],
  name: "gdpr_page",
  data() {
    return {
      agreement: '',
    }
  },
  methods: {
    checkAgreements() {
      return !(this.agreements.length > 0 && !this.agreement);
    }
  },
}
</script>

<style scoped>

</style>