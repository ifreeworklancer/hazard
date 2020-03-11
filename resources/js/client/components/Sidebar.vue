<template>
    <div class="sidebar-col">
        <div class="sidebar">
            <div class="menu-mask" @click="CloseMenu()"></div>
            <div class="menu">
                <div class="close-menu" @click="CloseMenu()">
                    <div class="line line--left"></div>
                    <div class="line line--right"></div>
                </div>
                <div class="logo">
                    <img src="../../../images/logo.png" alt="logo">
                </div>
                <div class="nav">
                    <ul class="nav-list">
                        <li>
                            <router-link @click.native="CloseMenu()" to='/' exact>all product</router-link>
                        </li>
                        <li>
                            <router-link @click.native="CloseMenu()" to='/cart'>
                                cart <span v-if="basket.items.length !== 0" class="card-number">+{{basket.items.length}}</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link @click.native="CloseMenu()" to='/login'>login</router-link>
                        </li>
                        <li>
                            <router-link @click.native="CloseMenu()" to="/quality">
                                quality
                            </router-link>
                        </li>
                        <li>
                            <router-link @click.native="CloseMenu()" to="/privacy-policy">
                                privacy policy
                            </router-link>
                        </li>
                        <li>
                            <router-link @click.native="CloseMenu()" to='/shipping'>shipping</router-link>
                        </li>
                        <li>
                            <router-link @click.native="CloseMenu()" to='/contact'>contact</router-link>
                        </li>
                    </ul>
                    <div class="copyright">
                        2019 All right reserve
                    </div>
                </div>
            </div>
            <div class="mobile-nav">
                <div class="open-menu" @click="OpenMenu()">
                    <div class="line line--top"></div>
                    <div class="line line--middle"></div>
                    <div class="line line--bottom"></div>
                </div>
                <router-link to="/" class="logo">
                    <img src="../../../images/logo.png" alt="logo">
                </router-link>
                <router-link to='/cart' class="mobile-nav-card">
                    <svg width="31" height="38">
                        <use xlink:href="#card-icon"></use>
                    </svg>
                    <span class="card-number" v-if="basket.items.length !== 0">
                        +{{basket.items.length}}
                    </span>
                </router-link >
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        methods: {
            OpenMenu() {
                let menu = document.querySelector('.menu');
                let menuMask = document.querySelector('.menu-mask');
                menu.classList.add('active');
                menuMask.classList.add('active');
            },

            CloseMenu() {
                let menu = document.querySelector('.menu');
                let menuMask = document.querySelector('.menu-mask');
                menu.classList.remove('active');
                menuMask.classList.remove('active');
            }
        },

        computed: {
            basket() {
                return this.$store.state.basket;
            }
        }
    }
</script>