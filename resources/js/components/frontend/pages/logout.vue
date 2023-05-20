<template>
  <div class="sg-page-content">
    <div class="content-box">
      <div class="content-head-home">
        <div class="top-address left">
            <div class="container-xl">
                Logout
            </div>
        </div>  		
      </div>  
      <div class="mid-content">
        <div class="register">
          <div class="mt40 center green">
            <svg xmlns="http://www.w3.org/2000/svg" width="220" height="220" fill="#00a230" class="bi bi-power" viewBox="0 0 16 16">
            <path d="M7.5 1v7h1V1h-1z"/>
            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
            </svg>
          </div>

          <h2 class="mt40 center">You have been logged out</h2>
          <h4 class="fw500 mt25 center">Thank you</h4>

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
  name: "logout",
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
