<template>
   
  <div class="sg-page-content">
    <div class="content-box">
      <div class="content-head-home">
        <div class="top-address left">
            <div class="container-xl">
                Account Created
            </div>
        </div>  		
      </div>
      <div class="mid-content">
        <div class="register">
          <div class="mt40 center green">
            <svg xmlns="http://www.w3.org/2000/svg" width="220" height="220" fill="#00a230" class="bi bi-check2-circle" viewBox="0 0 16 16">
            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
            </svg>
          </div>

          <h2 class="mt40 fw500 green center">Congratulations</h2>
          <h4 class="fw500 mt25 center">Your accounts has been successfully created.</h4>

          <div class="mid-content center mt40">
            <a :href="getUrl('')"><button class="my_but2">Continue</button></a>
          </div>
        </div>
      </div>
      <br><br>
    </div>
    
  </div>
</template>

<script>

export default {
  name: "account-success",
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
