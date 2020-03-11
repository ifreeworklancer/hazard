<template>
    <div class="content-col content-col--product" v-if="product">
        <div class="content content-product">
            <div class="content-header">
                <div class="product-header-item">
                    <h3 class="title" :data-text="product.title">
                        {{product.title}}
                    </h3>
                    <a href="#" @click.prevent="addCart(product, valueSize, valueQuantity)" class="btn btn-primary">
                        Add to card
                    </a>
                </div>
                <div class="product-header-item">
                    <div class="product-header-item__title">
                        Cost:
                    </div>
                    <div class="price">
                        {{product.price}}
                        eur
                    </div>
                </div>
                <div class="product-header-item">
                    <div class="product-header-item__title product-header-item__title--flex">
                        Size:
                        <div class="size">
                            <selected @changeSelect="changeSelectSize" v-if="valueSize" :value="valueSize"
                                      :items="product.size"></selected>
                        </div>
                    </div>
                    <div class="product-header-item__title product-header-item__title--flex">
                        Quantity:
                        <div class="quantity">
                            <selected @changeSelect="changeSelectQuantity" :value="valueQuantity"
                                      :items="quantity"></selected>
                        </div>
                    </div>
                </div>
            </div>
            <VuePerfectScrollbar class="content-body" :settings="settings">
                <div v-html="product.material"></div>

                <div v-html="product.description"></div>
            </VuePerfectScrollbar>
        </div>
        <slider-preview :title="product.title" :galleries="gallery"></slider-preview>
    </div>
</template>
<script>
    import SliderPreview from '../components/SliderPreview';
    import Selected from '../components/Selected';
    import VuePerfectScrollbar from 'vue-perfect-scrollbar'

    export default {
        data() {
            return {
                product: [],
                valueSize: '',
                valueQuantity: '1',
                gallery: [],
                quantity: ["1", "2", "3", "4", "5", "6", "7", "8", "9"],
                settings: {
                    maxScrollbarLength: 90
                }
            }
        },

        components: {
            SliderPreview,
            Selected,
            VuePerfectScrollbar
        },

        created() {
            this.getProductData(this.$route.params.product);
        },

        methods: {
            getProductData(productSlug) {
                axios
                    .get(`/products/${productSlug}`)
                    .then(({data}) => {
                        this.product = data.items;
                        this.valueSize = data.items.size[0];
                        this.gallery.push(...data.items.gallery);
                    })
            },
            changeSelectSize({value}) {
                this.valueSize = value;
            },
            changeSelectQuantity({value}) {
                this.valueQuantity = value;
            },
            addCart(product, size, quantity) {
                axios
                    .post(`/basket/${product.slug} `, {
                        size: size,
                        quantity: quantity,
                        product_id: product.id,
                        price: product.price,
                    })
                    .then(({data}) => {
                        this.$store.commit('setBasket', data);
                    })
            },
        },
    }
</script>