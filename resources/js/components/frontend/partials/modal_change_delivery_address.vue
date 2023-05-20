<template>
  <div class="modal fade" id="modal_delivery_address" tabindex="-1" role="dialog" aria-labelledby="deliveryAddressLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deliveryAddressLabel">Change Delivery Address</h5>
          <button type="button" class="close py-1 px-2" data-dismiss="modal" aria-label="Close" @click="closeModal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="address">Delivery address</label>
            <input type="text" class="form-control" id="address" aria-describedby="emailHelp"
              placeholder="Insert your delivery address" v-model="address">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" @click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" @click="saveChange" class="btn btn-primary">Save change</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "modal_change_delivery_address",
  data() {
    return {
      address: ''
    }
  },
  created() {

  },
  computed: {

  },
  methods: {
    closeModal() {
      $('#modal_delivery_address').modal('hide');
    },
    saveChange() {
      this.$store.commit("setDeliveryAddress", this.address);
      $('#modal_delivery_address').modal('hide');
    }
  }
}
</script>