<template>
  <!-- Custom MGS Box Start======= -->
  <div class="message-box chatbox-width">
    <div class="message-title" @click="divToggler">
      <div class="title-left">
        <h2>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
            <path d="M0 1v16.981h4v5.019l7-5.019h13v-16.981h-24zm13 12h-8v-1h8v1zm6-3h-14v-1h14v1zm0-3h-14v-1h14v1z"
                  fill="#666"/>
          </svg>
          {{ lang.Message }}
        </h2>
      </div>
      <div class="title-right chatbox-hide">
        <h2>{{ settings.system_name }}</h2>
      </div>
    </div>

    <div class="user-chatbox-show chatbox-hide">
      <div class="user-chatbox">
        <div class="user-chat-list">
          <div class="user-list">
            <ul v-if="authUser && authUser.user_type == 'customer'">
              <input type="text" class="user-search-field" name="search_user" id="search_user" v-model="search" @keyup="searchUser" :placeholder="lang.search_user">
              <li v-for="(seller,index) in sellers.data" :key="index"
                  v-observe-visibility="index === sellers.data.length - 1 ? loadSellers : false">
                <a href="javascript:void(0)" @click="fetchMessages(seller,1)"
                  :class="{ 'active' : selected_user.user_id == seller.user_id }">
                  <div class="user-logo">
                    <img :src="seller.logo" :alt="seller.user_name">
                  </div>
                  <div class="user-info">
                    <h4>{{ seller.shop_name }}</h4>
                    <p v-if="seller.has_message" class="text-overflow">{{ seller.message.message }}</p>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="chatbox-form" id="chatbox-form">
          <div class="chatbox" id="chatbox">
            <div class="message-sender" :class="{ 'page_1' : message.page == 1 , 'user' : message.type == 2 }"
                v-for="(message,index) in messages" :key="index" v-if="messages.length > 0 && authUser && authUser.user_type == 'customer'">
              <div v-if="message.is_file" class="message-text">
                <a v-if="message.is_image" :href="message.file_url" :title="message.message" download>
                  <img v-if="message.file_exist" :src="message.file_url" :alt="message.message">
                  <img v-else :src="getUrl('public/images/default/no_image.jpg')" :alt="message.message">
                </a>
                <div v-else-if="message.is_video">
                  <vue-plyr v-if="message.file_exist">
                    <video>
                      <source :src="message.file_url" :type="message.file_type"/>
                    </video>
                  </vue-plyr>
                  <img v-else :src="getUrl('images/default/default-video-72x72.png')" alt="image">
                </div>
                <a v-else :href="message.file_url" :title="message.message" download>
                  <h4 class="file-preview-title name_clip">
                    {{ message.message }}
                  </h4>
                  <span class="file-size">{{ message.file_size }}</span>
                  <div class="file-proview-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                      <path d="M16 0h-14v24h20v-18l-6-6zm0 3l3 3h-3v-3zm-12 19v-20h10v6h6v14h-16z"/>
                    </svg>
                    <span>{{ lang.File }}</span>
                  </div>
                </a>
              </div>
              <div v-else class="message-text">
                <a v-if="urlCheck(message.message)" :href="message.message" target="_blank">{{ message.message }}</a>
                <p v-else>{{ message.message }}</p>
              </div>
              <div class="message-sender-img">
                <img v-if="message.type == 1" :src="authUser.profile_image" :alt="authUser.full_name">
                <img v-else :src="selected_user.logo" :alt="selected_user.user_name">
              </div>

              <span class="warning_mgs" v-if="message.is_file && !message.file_exist">{{ lang.file_not_exist }}.</span>
            </div>
            <h6 class="text-danger text-center mt-5 pt-5" v-if="messages.length == 0  && authUser && authUser.user_type == 'customer'">{{ lang.no_data_found }}</h6>
            <h6 class="text-danger text-center mt-5 pt-5" v-if="authUser && authUser.user_type == 'admin'">{{ lang.login_as_customer }}</h6>
            <h6 class="text-danger text-center mt-5 pt-5" v-if="authUser && authUser.user_type == 'seller'">{{ lang.use_seller_panel }}</h6>

            <div v-if="!authUser" class="h-100">
              <div class="message-content-login">
                <svg width="34" height="26" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 21h-24v-18h24v18zm-23-16.477v15.477h22v-15.477l-10.999 10-11.001-10zm21.089-.523h-20.176l10.088 9.171 10.088-9.171z" fill="#999"></path></svg>
                <p>{{ lang.start_conversation_msg }}</p>
                <ul class="d-flex">
                  <li><router-link :to="{ name : 'login' }">{{ lang.sign_in }}</router-link>/</li>
                  <li><router-link :to="{ name : 'register' }">{{ lang.register }}</router-link></li>
                </ul>
              </div>
            </div>
          </div>

          <div v-if="authUser && authUser.user_type == 'customer'" class="chat-form">
            <div class="chat-preview-items">
              <div class="file_div" v-for="(file,index) in files" :key="index">
                <a href="javascript:void(0)" @click="removeFile(index)" class="delete_file"><i class="mdi mdi-close-circle"></i></a>
                <p class="file_name">
                  <img :src="imagePreview(file)" alt="preview image" class="img-fluid" width="50">
                  <span v-if="file.type.split('/')[0] != 'image'" class="name_clip">{{ file.name }}</span>
                </p>
              </div>
            </div>
            <form @submit.prevent="handleMsgSend">
              <label for="file" class="media-icon">
                <input type="file" id="file" class="d-none" multiple @change="previewFile($event)">
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                     clip-rule="evenodd">
                  <path
                      d="M11.5 0c6.347 0 11.5 5.153 11.5 11.5s-5.153 11.5-11.5 11.5-11.5-5.153-11.5-11.5 5.153-11.5 11.5-11.5zm0 1c5.795 0 10.5 4.705 10.5 10.5s-4.705 10.5-10.5 10.5-10.5-4.705-10.5-10.5 4.705-10.5 10.5-10.5zm.5 10h6v1h-6v6h-1v-6h-6v-1h6v-6h1v6z"
                      fill="#999"/>
                </svg>
              </label>
              <div class="chat-input-field">
                <input type="text" v-model="form.msg" :placeholder="lang.type_message">
              </div>
              <div class="send">
                <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="22.572" height="21.604" viewBox="0 0 22.572 21.604">
                    <path id="Path_4451" data-name="Path 4451"
                          d="M21.283,1.653,2.249,7.55a1.694,1.694,0,0,0-.1,3.245l8.633,2.893a.255.255,0,0,1,.142.135L14.1,22.065a1.739,1.739,0,0,0,1.649,1.109H15.8a1.716,1.716,0,0,0,1.626-1.184l6.055-18.18a1.686,1.686,0,0,0-.39-1.694,1.761,1.761,0,0,0-1.806-.465Z"
                          transform="translate(-0.99 -1.571)" fill="#999"/>
                  </svg>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Custom MGS Box End======= -->
</template>

<script>

export default {
  name: "chat_system",
  components: {},
  data() {
    return {
      page: 1,
      last_page: 1,
      msg_page: 1,
      msg_last_page: 1,
      lastScrollTop: 0,
      refresh_no: 1,
      sellers: {
        data: []
      },
      selected_user: '',
      messages: [],
      files: [],
      form: {
        msg: '',
        chat_room_id: ''
      },
      chat_active: false,
      scroll_continue: true,
      first_page_msgs: [],
      search: '',
      customer_id: '',
      current_seller_id: '',
      last_page_msg: '',
    }
  },
  created() {
  },
  mounted() {
    let element = document.getElementById('chatbox');
    if (element)
    {
      element.addEventListener("scroll", this.handleScroll);
    }

    setInterval(() => {
      if (!$('.title-right').hasClass('chatbox-hide') && this.authUser) {
        this.fetchUser(this.selected_user);
      }
    }, 5000);
  },
  watch: {
    messages()
    {
      this.$nextTick(() => {
        this.scrollToBottom();
      })
    }
  },
  computed: {
    currentSellerId() {
      return this.$store.getters.getCurrentSellerId;
    }
  },
  methods: {
    divToggler() {
      let selector = $('.user-chatbox-show')
      selector.toggleClass('chatbox-hide');
      $('.title-right').toggleClass('chatbox-hide');
      $('.message-box').toggleClass('chatbox-width');
      this.chat_active = !selector.hasClass('chatbox-hide');
      this.fetchUser(this.selected_user);
    },
    loadSellers(isVisible) {
      if (!isVisible) {
        return true;
      }

      if (this.page >= this.last_page) {
        return true;
      }
      this.page++;
      this.fetchUser();
    },
    fetchUser(seller, scroll) {
      if (this.authUser)
      {
      let config = {
        params: {
          search: this.search,
          customer_id: this.authUser.id,
          current_seller_id: this.currentSellerId,
          page: this.page
        }
      };

      let url = this.getUrl("home/chat-sellers");

      axios.get(url,config).then((response) => {
        if (response.data.error) {
          toastr.error(response.data.error, this.lang.Error + " !!");
        } else {
          let sellers = response.data.sellers.data;
          this.last_page = response.data.sellers.last_page;

          if (!seller) {
            if (sellers.length > 0) {
              for (var i in sellers) {
                this.sellers.data.push(sellers[i]);
              }
              this.selected_user = this.sellers.data[0];
            }
          } else {
            this.chat_active = true;
            this.sellers.data = sellers;
          }

          if (this.refresh_no == 1) {
            scroll = true;
          }
          this.refreshMessages(this.selected_user, scroll);
        }
      }).catch((error) => {
        toastr.error(error.response.data.message, this.lang.Error + " !!");
      });
    }
    },
    fetchMessages(seller,scroll) {
      let that = this;
      that.form.chat_room_id = seller.chat_room_id;
      if (that.selected_user.user_id != seller.user_id) {
        that.selected_user = seller;
        that.messages = [];
        that.first_page_msgs = [];
        that.msg_page = 1;
        that.msg_last_page = 1;
        that.scroll_continue = true;
      }
      that.selected_user = seller;
      that.scroll_continue = false;
      let params = {
        user_id: seller.user_id,
        page: that.msg_page,
        chat_room_id: that.selected_user.chat_room_id
      };

      let url = that.getUrl("frontend/messages");

      axios.get(url, {params: params}).then((response) => {
        if (response.data.error) {
          toastr.error(response.data.error, that.lang.Error + " !!");
        } else {
          let messages = response.data.user_messages.data.reverse();

          for (let i = 0; i < messages.length; i++) {
            let message = messages[i];
            let find = that.messages.find(m => m.id == message.id);
            if (!find) {
              that.messages.unshift(message);
              let element = document.getElementById('chatbox');
              element.scrollTop = element.scrollHeight - (element.scrollHeight - 500);
            }
          }
          that.scroll_continue = true;
          that.msg_last_page = response.data.user_messages.last_page;
          if (response.data.user_messages.next_page_url) {
            that.msg_page++;
          } else {
            that.scroll_continue = false;
          }
          if (scroll) {
            setTimeout(function () {
              that.scrollToBottom();
            }, 500);
          }

          if (that.msg_page == that.msg_last_page) {
            this.last_page_msg = true;
          }
        }
      }).catch((error) => {
        toastr.error(error.response.data.message, that.lang.Error + " !!");
      });
    },
    refreshMessages(seller, scroll) {
      let that = this;
      if (seller) {
        that.form.chat_room_id = seller.chat_room_id;
        that.selected_user = seller;

        let form = {
          user_id: seller.user_id,
          page: 1,
          chat_room_id: that.selected_user.chat_room_id
        };

        let url = that.getUrl("frontend/messages");

        axios.get(url, {params: form}).then((response) => {
          if (response.data.error) {
            toastr.error(response.data.error, that.lang.Error + " !!");
          } else {

            let messages = response.data.user_messages.data;

            for (let i = 0; i < messages.length; i++) {
              if (!that.first_page_msgs.includes(messages[i].id)) {
                that.messages.push(messages[i]);
                that.first_page_msgs.push(messages[i].id);
              }
            }
            if (that.refresh_no == 1) {
              that.msg_last_page = response.data.user_messages.last_page;
            }
            if (scroll && that.refresh_no == 1) {
              setTimeout(function () {
                that.scrollToBottom();
              }, 500);
              that.msg_page = 2;
            }
            that.refresh_no++;
            this.page = 1;
            this.scroll_continue = true;
          }
        }).catch((error) => {
          toastr.error(error.response.data.message, that.lang.Error + " !!");
        });
      }
    },
    handleMsgSend() {
      let length = this.files.length;
      if (length > 0) {
        for (let i = 0; i < length; i++) {
          this.sendMessage(this.files[i], i);
        }
      }
      if (this.form.msg) {
        this.sendMessage();
      }
    },
    sendMessage(file, index) {
      let msg = this.form.msg;
      if (!msg && !file) {
        return false;
      }

      if (file) {
        msg = file.name;
      }

      let chat_room = this.selected_user.chat_room_id;

      let formData = new FormData();
      formData.append('msg', msg);
      formData.append('chat_room_id', chat_room);
      formData.append('receiver_id', this.selected_user.user_id);

      if (file) {
        formData.append('file_type', file.type);
        formData.append('file', file);
      }

      axios.post(this.getUrl('send-message'), formData).then(response => {
        if (response.data.error) {
          toastr.error(response.data.error, this.lang.Error + " !!");
        } else {
          this.page = 1;
          this.refresh_no = 1;
          this.msg_page = this.msg_last_page +1;
          if (!file) {
            this.form.msg = '';
          }
          if (index > -1) {
            this.files.splice(index, 1);
          }
          this.selected_user.chat_room_id = response.data.chat_room_id;

          this.fetchUser(this.selected_user, 1);
        }
      }).catch((error) => {
        toastr.error(error.response.data.message, this.lang.Error + " !!");
      });

    },
    scrollToBottom() {
      const element = document.getElementById('chatbox');
      if (element)
        element.scrollTop = element.scrollHeight;
    },
    handleScroll() {
      let that = this;

      that.lastScrollTop = 0;

      let element = document.getElementById('chatbox');
// element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
      element.addEventListener("scroll", function () { // or window.addEventListener("scroll"....
        var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
        if (st >  that.lastScrollTop) {

        } else {
          if (element.scrollTop === 0 && that.scroll_continue) {
            that.fetchMessages(that.selected_user);
          }
        }
        that.lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
      }, false);
    },
    previewFile(event) {
      let inputted_files = event.target.files;

      for (let i = 0; i < inputted_files.length; i++) {
        let file = inputted_files[i];
        this.files.push(file);
      }
      document.getElementById('file').value = '';
    },
    removeFile(index) {
      return this.files.splice(index, 1);
    },
    imagePreview(file) {
      if (file.type.split('/')[0] == 'image') {
        return URL.createObjectURL(file);
      } else {
        return this.getUrl('public/images/default/default-document-40x40.png');
      }
    },
    searchUser() {
      this.page = 1;
      let config = {
        params: {
          seller_name: this.search,
          page: this.page
        }
      };
      let url = this.getUrl("home/chat-sellers");

      axios.get(url,config).then((response) => {
        if (response.data.error) {
          toastr.error(response.data.error, this.lang.Error + " !!");
        } else {
          let sellers = response.data.sellers.data;
          this.last_page = response.data.sellers.last_page;
          this.sellers.data = sellers;
        }
      }).catch((error) => {
        toastr.error(error.response.data.message, this.lang.Error + " !!");
      });

    },
  },
  destroyed() {
  },
}
</script>
