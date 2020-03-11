<template>
    <router-link
            v-if="preview"
            :to="`catalog/${product.slug}`"
            :style="{ backgroundImage: 'url(' + preview + ')' }"
            class="previews previews-simple">
        <div class="previews-content">
            <h3 class="title">
                {{product.title}}
            </h3>
        </div>
    </router-link>
    <router-link
            v-else
            to="/"
            style="background-image:url('http://hazard/storage/26/noimage.png');"
            class="previews previews-simple">
        <div class="previews-content">
            <h3 class="title">
                {{product.title}}
            </h3>
        </div>
    </router-link>
</template>
<script>

    export default {
        props: ['product', 'preview'],
    }
</script>