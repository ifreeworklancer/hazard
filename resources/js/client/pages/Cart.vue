<template>
    <div class="content-col">
        <div class="content content-cart">
            <div class="content-header content-header--nav">
                <ul class="cart-nav">
                    <li class="cart-nav-item cart-nav-item--item">
                        item
                    </li>
                    <li class="cart-nav-item cart-nav-item--size">
                        size
                    </li>
                    <li class="cart-nav-item cart-nav-item--quantity">
                        quantity
                    </li>
                    <li class="cart-nav-item cart-nav-item--price">
                        price
                    </li>
                </ul>
            </div>
            <VuePerfectScrollbar class="content-body" :settings="settings">
                <div class="cart-item" v-for="(item, index) in basket.items" :key="item.id"
                     @mouseenter="setPreview(item.product)">
                    <div class="cart-item-value cart-item-value--title" :data-text="item.product.title">
                        {{item.product.title}}
                    </div>
                    <div class="cart-item-value-mobile">
                        <div class="cart-item-value cart-item-value--select">
                            <selected @changeSelect="changeSelect($event,item,'size')" v-if="item.size"
                                      :value="item.size"
                                      :items="item.sizes"></selected>
                            <selected @changeSelect="changeSelect($event,item,'quantity')" :value="item.quantity"
                                      :items="quantities"></selected>
                        </div>
                        <div class="cart-item-value cart-item-value--price">
                            {{item.price}}
                            eur
                        </div>
                    </div>
                    <div class="close-cart-item" @click="deleteBasketItem(item)">
                        <div class="line line--left"></div>
                        <div class="line line--right"></div>
                    </div>
                </div>
            </VuePerfectScrollbar>
            <div class="content-footer">
                <div class="cart-total">
                    <div class="cart-total-description">
                        <div class="cart-total-description__title">
                            total cost
                        </div>
                        <div class="cart-total-description__value">
                            {{basket.amount}}
                            EUR
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
        <simple-preview :product="product" :preview="preview"></simple-preview>
    </div>
</template>
<script>
    import Selected from '../components/Selected';
    import VuePerfectScrollbar from 'vue-perfect-scrollbar'
    import debounce from 'debounce';
    import SimplePreview from '../components/SimplePreview';

    export default {
        data() {
            return {
                settings: {
                    maxScrollbarLength: 90
                },
                quantities: ["1", "2", "3", "4", "5", "6", "7", "8", "9"],
                product: [],
                preview: '',
            }
        },

        components: {
            SimplePreview,
            Selected,
            VuePerfectScrollbar
        },

        methods: {
            changeSelect({value}, item, type) {
                item[type] = value;
                this.$store.dispatch('updateBasketItem', item);
            },
            setPreview: debounce(function (product) {
                this.product = product;
                this.preview = product.gallery['src'];
            }, 500),
            deleteBasketItem(item) {
                this.$store.dispatch('deleteBasketItem', item);
            }
        },

        computed: {
            basket() {
                return this.$store.state.basket;
            }
        }
    }
</script>