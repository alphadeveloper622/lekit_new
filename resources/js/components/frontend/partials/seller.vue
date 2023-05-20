<template>
    <div>
        <ul class="products" :class="class_name ? class_name : 'grid-4'" v-if="is_shimmer">
          <single_seller v-for="(shop, i) in sellers" :key="i" :shop="shop"></single_seller>
        </ul>
        <ul class="products" :class="class_name ? class_name : 'grid-4'" v-else-if="shimmer">
            <li v-for="(seller,index) in number" :key="index">
                <div class="sg-product">
                    <div class="product-thumb">
                        <a href="javascript:void(0)"><shimmer></shimmer></a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>

import shimmer from "./shimmer";
import single_seller from "./single_seller";

export default {
    name: "seller",
    props: ['sellers', 'class_name','number','is_shimmer'],
    components: {
        shimmer,single_seller
    },
    data() {
        return {}
    },
    computed: {

    },
    methods: {
    }
}
</script>
