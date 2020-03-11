<template>
    <div class="content-col">
        <div class="content content-products">
            <div class="content-header content-header--nav">
                <ul class="product-nav product-categories">
                    <li v-for="category in categories" :key="category.id">
                    <span @click.prevent="setActiveCategory(category.slug)"
                          :class="{active: activeCategory == category}">
                    {{category.title}}
                        </span>
                    </li>
                </ul>
            </div>

            <div class="content-body">
                <ul class="product-nav product-items" v-if="activeCategory">
                    <li v-for="product in products" :key="product.id" @mouseenter="setPreview(product)">
                        <router-link :to="{path: `catalog/${product.slug}`, params: product.slug}">
                            <div class="image"
                                 :style="{ backgroundImage: 'url(' + product.gallery['src'] + ')' }"></div>
                            <h5 :data-text="product.title">{{product.title}}</h5>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
        <simple-preview :product="product" :preview="preview"></simple-preview>
    </div>
</template>
<script>
    import SimplePreview from '../components/SimplePreview';
    import debounce from 'debounce';

    export default {
        data() {
            return {
                activeCategory: {},
                categories: [],
                products: [],
                product: [],
                preview: '',
            }
        },

        components: {
            SimplePreview
        },

        created() {
            this.getAllCategories();
        },

        methods: {
            setActiveCategory(category) {
                let elements = document.querySelectorAll('.product-categories li span');
                elements.forEach(item => {
                    item.classList.remove('active');
                });
                event.target.classList.add('active');
                this.activeCategory = category;
                this.getProducts(category);
            },

            getAllCategories() {
                axios
                    .get('/categories')
                    .then(({data}) => {
                        this.categories = data.categories;
                        this.products = data.items;
                        this.preview = data.items[0].gallery['src'];
                    })
                    .then(() => this.activeCategory = this.categories[0])
                    .then(() => this.product = this.products[0]);

            },

            setPreview: debounce(function (product) {
                this.product = product;
                this.preview = product.gallery['src'];
            }, 500),

            getProducts(category) {
                axios
                    .get(`/categories/${category}`)
                    .then(({data}) => {
                        this.products = data.items;
                        this.product = data.items[0];
                    })
            },
        }
    }
</script>