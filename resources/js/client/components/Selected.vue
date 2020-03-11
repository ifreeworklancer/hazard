<template>
    <div class="selected" :class="{'active': open}">
        <div class="selected-value" @click="open = !open">{{valueSelected}}</div>
        <ul class="selected-list">
            <li class="selected-list__item" v-for="item in items" @click="changeSelect(item)">
                {{item}}
            </li>
        </ul>
    </div>
</template>
<script>

    export default {
        data() {
            return {
                valueSelected: '',
                open: false
            }
        },

        props: {
            value: String,
            items: Array
        },

        created() {
            this.valueSelected = this.value;
        },

        mounted() {
            this.closeSelected();
        },

        methods: {
            changeSelect(value) {
                this.valueSelected = value;
                this.open = false;
                this.$emit('changeSelect', {
                    value: value,
                })
            },
            closeSelected() {
                document.addEventListener('click', e => {
                    if (!(this.$el === e.target || this.$el.contains(e.target))) {
                        this.open = false;
                    }
                })
            }
        }
    }
</script>