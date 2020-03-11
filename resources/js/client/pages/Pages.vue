<template>
    <div class="content-col">
        <div class="content content-page">
            <VuePerfectScrollbar class="content-body" :settings="settings">
                <h2 class="page-title">
                    {{pagesContent.title}}
                </h2>
                <div class="description" v-html="pagesContent.body"></div>
            </VuePerfectScrollbar>
        </div>
        <simple-preview :product="{}" :preview="previewImage"></simple-preview>
    </div>
</template>
<script>
    import SimplePreview from '../components/SimplePreview';
    import VuePerfectScrollbar from 'vue-perfect-scrollbar'

    export default {
        data() {
            return {
                pagesContent: [],
                previewImage: '',
                settings: {
                    maxScrollbarLength: 90
                }
            }
        },

        components: {
            SimplePreview,
            VuePerfectScrollbar
        },

        watch: {
            '$route'(to, from) {
                this.getPagesContent();
            }
        },

        created() {
            this.getPagesContent();
        },

        methods: {
            getPagesContent() {
                axios
                    .get(`${this.$route.fullPath}`)
                    .then(({data}) => {
                        this.pagesContent = data.page;
                        this.previewImage = data.page.gallery[0].src;
                    })
            }
        }
    }
</script>