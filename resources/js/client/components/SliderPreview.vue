<template>
    <div class="previews previews-slider">
        <slick ref="slick" :options="slickOptions" @afterChange="handleAfterChange" @init="handleInit"
        v-if="galleries.length">
            <div class="slick-item"
                 v-for="(gallery, i) in galleries"
                 :style="{ backgroundImage: 'url(' + gallery.src + ')' }"
                 :key="i"></div>
        </slick>
        <div class="slider-nav">
            <div class="btn btn-primary slider-nav-item slider-nav-item--next" @click="prevSlide">
                <svg width="29" height="15">
                    <use xlink:href="#arrow-up"></use>
                </svg>
            </div>
            <div class="btn btn-primary slider-nav-item slider-nav-item--prev" @click="nextSlide">
                <svg width="29" height="15">
                    <use xlink:href="#arrow-down"></use>
                </svg>
            </div>
        </div>
        <div class="slider-description">
            <h3 class="title">{{title}}</h3>
            <div class="slider-pagination">
                <div class="slider-pagination-item">{{currentSlide}}</div>
                <div class="slider-pagination-item">/</div>
                <div class="slider-pagination-item">{{lastSlide}}</div>
            </div>
        </div>
    </div>
</template>
<script>
    import Slick from 'vue-slick';


    export default {
        data() {
            return {
                slickOptions: {
                    slidesToShow: 1,
                    vertical: true,
                    arrows: false,
                    draggable: false
                },
                currentSlide: '1',
                lastSlide: ''
            }
        },

        props: {
            galleries: {
                type: Array,
                default() {
                    return [];
                }
            },
            title: String
        },
        methods: {
            nextSlide() {
                this.$refs.slick.next();
            },
            prevSlide() {
                this.$refs.slick.prev();
            },
            handleInit(event, slick) {
                this.lastSlide = slick.$slides.length;
            },
            handleAfterChange(event, slick, currentSlide) {
                this.currentSlide = currentSlide + 1;
            },
        },

        components: {
            Slick
        },
    }
</script>