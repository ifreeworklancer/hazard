<template>
    <div class="content-col">
        <div class="content content-login">
            <div class="content-body">
                <form @submit.prevent="onLogin()" class="form-login">
                    <div class="form-group">
                        <label for="userLoginEmail" class="label-placeholder">login</label>
                        <div class="form-control">
                            <input type="text" id="userLoginEmail" v-model="userLoginEmail" @focus="onFocus()" @blur="onBlur()"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userLoginPassword" class="label-placeholder">password</label>
                        <div class="form-control">
                            <input type="password" id="userLoginPassword" v-model="userLoginPassword" @focus="onFocus()"
                                   @blur="onBlur()" required>
                        </div>
                    </div>
                    <button class="btn btn-primary">
                        Login
                    </button>
                </form>
                <!--<form @submit.prevent="onRegister()" class="form-login">-->
                <!--<div class="form-group">-->
                <!--<label for="userName" class="label-placeholder">Name</label>-->
                <!--<div class="form-control">-->
                <!--<input type="text" id="userName" v-model="userRegisterName" @focus="onFocus()" @blur="onBlur()"-->
                <!--required>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--<label for="userEmail" class="label-placeholder">login</label>-->
                <!--<div class="form-control">-->
                <!--<input type="text" id="userEmail" v-model="userRegisterEmail" @focus="onFocus()" @blur="onBlur()"-->
                <!--required>-->
                <!--</div>-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--<label for="userPassword" class="label-placeholder">password</label>-->
                <!--<div class="form-control">-->
                <!--<input type="password" id="userPassword" v-model="userRegisterPassword" @focus="onFocus()"-->
                <!--@blur="onBlur()" required>-->
                <!--</div>-->
                <!--</div>-->
                <!--<button class="btn btn-primary">-->
                <!--Login-->
                <!--</button>-->
                <!--</form>-->

            </div>
        </div>
        <simple-preview :product="{}" :preview="''"></simple-preview>
    </div>
</template>
<script>
    import SimplePreview from '../components/SimplePreview';
    import VuePerfectScrollbar from 'vue-perfect-scrollbar'

    export default {
        data() {
            return {
                userName: '',
                userLoginEmail: '',
                userLoginPassword: ''
            }
        },

        components: {
            SimplePreview,
            VuePerfectScrollbar
        },

        methods: {
            onLogin() {
                axios
                    .post('/api/login', {email: userEmail.value, password: userPassword.value})
                    .then(({data}) => {
                        localStorage.setItem('token', data.access_token);
                    })
                // console.log(this.userEmail + '  ' + this.userPassword);
            },
            // onRegister() {
            //     axios
            //         .post('/api/register', {name: userName.value, email: userEmail.value, password: userPassword.value})
            //         .then(({data}) => {
            //             localStorage.setItem('token', data.access_token);
            //         })
            //     // console.log(this.userEmail + '  ' + this.userPassword);
            // },
            onFocus() {
                event.target.parentNode.parentNode.classList.add('in-focus');
            },
            onBlur() {
                if (event.target.value !== "") {
                    event.target.parentNode.parentNode.classList.add('in-focus');
                } else {
                    event.target.parentNode.parentNode.classList.remove('in-focus');
                }
            }
        }
    }
</script>