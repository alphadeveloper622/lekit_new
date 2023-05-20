<template>
  <div class="content-box">
    <div class="content-head-home">
      <!---------- MAIN SLIDER / DELIVERY ADDRESS --------->
      <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="main-search">
          <h2>START SHOPPING</h2>

          <div class="input-group">
            <input class="form-control border-end-0 border rounded-pill" type="text" id="delivery-address"
              v-model="searchKey" placeholder="Insert your delivery address"
              @keyup.enter="setDeliveryAddress">
            <span class="input-group-append lekit-search-icon" @click="setDeliveryAddress">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                  d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
              </svg>
            </span>
          </div>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="8000">
            <img :src="getUrl('public/images/news/lekit_slide1.jpg')" class="d-block w-100" alt="Slide 1">
          </div>
          <div class="carousel-item" data-bs-interval="8000">
            <img :src="getUrl('public/images/news/lekit_slide2.jpg')" class="d-block w-100" alt="Slide 2">
          </div>
          <div class="carousel-item" data-bs-interval="8000">
            <img :src="getUrl('public/images/news/lekit_slide3.jpg')" class="d-block w-100" alt="Slide 3">
          </div>
          <div class="carousel-item" data-bs-interval="8000">
            <img :src="getUrl('public/images/news/lekit_slide4.jpg')" class="d-block w-100" alt="Slide 4">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="video-box">
      <div class="container-xl">
        <iframe src="https://www.youtube.com/embed/QlPkrGA1SBk" title="YouTube video player" frameborder="0"
          allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

    <div class="lekit-features container-xl">
      <h2 class="blue">Fast Results in Few Simple Steps</h2>
      <div class="row">
        <div class="col-md-3 center">
          <img :src="getUrl('public/images/news/feature1.png')" alt="Locate Nearest Store" />
          <h4>Locate Nearest Store</h4>
          <p class="features">
          <ul>
            <li>Browse our store database</li>
            <li>Look for the clostest open store</li>
            <li>See store profile & ratings</li>
          </ul>
          </p>
        </div>

        <div class="col-md-3 center">
          <img :src="getUrl('public/images/news/feature2.png')" alt="Find Your Products" />
          <h4>Find Your Products</h4>
          <p class="features">
          <ul>
            <li>Browse thousands of products</li>
            <li>Tools to search & filter products</li>
            <li>See product details & photos</li>
          </ul>
          </p>
        </div>

        <div class="col-md-3 center">
          <img :src="getUrl('public/images/news/feature3.png')" alt="Proceed With Checkout" />
          <h4>Proceed With Checkout</h4>
          <p class="features">
          <ul>
            <li>Select products & quantities</li>
            <li>Find available drivers</li>
            <li>Pay online to initiate delivery</li>
          </ul>
          </p>
        </div>

        <div class="col-md-3 center">
          <img :src="getUrl('public/images/news/feature4.png')" alt="Locate Nearest Sotre" />
          <h4>Track Your Delivery</h4>
          <p class="features">
          <ul>
            <li>Monitor delivery progress live</li>
            <li>See estimated delivery time</li>
            <li>Get ready for your collection</li>
          </ul>
          </p>
        </div>
      </div>
    </div>

    <div class="home-info-box">
      <div class="home-info container-xl row">
        <div class="col-md-6 home-txt">
          <h2 class="blue">Welcome to Lekit</h2>
          <p class="justify">
            LEKIT is your new instant delivery service for your all hardware needs. Whether you are a small tradesman or a
            mid-size business or even a large company our top inovative delivery service is simply a must for you. LEKIT
            is class leading live delivery service using the latest technology on the market. Our main aim is simple and
            fast system that provides you with an instant access to milions of products from hardware and construction
            industry. Our system is designed and built to minimise time and effort spending looking for particular
            products, locating nearest stores, checking their availabiity and mainly providing the fastest delivery time
            possible. This has been achieved by years of research in current market environment, collecting real data from
            the industry and focusing on using the latest technology. Providing system that is fast, reliable and easy to
            use is our key to go ahead and take over our competitors. Where other sites and system rely on people on the
            phone and behind the computers our system is fully automated one.
            <br /><br />
            Do not waste any more time waiting in queues, being stuck in heavy London traffic or burried in endless online
            checkout systems. Lekit is here to make everything simple and intuitive right on this platform.
          </p>
        </div>
        <div class="col-md-6 home-img"></div>
      </div>
    </div>

    <div class="news-box">
      <div class="news container-xl">
        <h2 class="blue">Latest News</h2>
        <div class="row">
          <div class="col-md-4">
            <img class="center" :src="getUrl('public/images/news/lekit_home2.jpg')" alt="news #1" />
            <h3 class="center">Screw Fix just added more stores to our platform</h3>
            <p class="justify">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
              scrambled it to make a type specimen book.
            </p>
            <div class="center">
              <button class="mybut">FIND OUT MORE</button>
            </div>
          </div>

          <div class="col-md-4">
            <img class="center" :src="getUrl('public/images/news/lekit_home3.jpg')" alt="news #1" />
            <h3 class="center">New Driver App version 2.0 just been released</h3>
            <p class="justify">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
              scrambled it to make a type specimen book.
            </p>
            <div class="center">
              <button class="mybut">FIND OUT MORE</button>
            </div>
          </div>


          <div class="col-md-4">
            <img class="center" :src="getUrl('public/images/news/lekit_home4.jpg')" alt="news #1" />
            <h3 class="center">Lekit signed up deal with 2 more store brands last month</h3>
            <p class="justify">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
              scrambled it to make a type specimen book.
            </p>
            <div class="center">
              <button class="mybut">FIND OUT MORE</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
</template>

<script>


export default {
  name: "home.vue",
  data() {
    return {
      searchKey: '',
    }
  },
  components: {
    
  },
  mounted() {
    var autocomplete = new google.maps.places.Autocomplete(
      document.getElementById("delivery-address"),
    );
    autocomplete.setComponentRestrictions({
      country: ["uk"],
    });
  },
  methods: {
    setDeliveryAddress() {
      this.$store.commit("setDeliveryAddress", document.getElementById("delivery-address").value);
      this.routerNavigator('stores');
    },
  }
}
</script>
