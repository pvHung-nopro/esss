<template>
<div>
    <!-- <div v-if="loading">
        <div class="spinner-border" role="status">
       <span class="sr-only">Loading...</span>
</div> -->

<div>
 <form   method="post" >
    <!-- {{email}} -->
                <input type="email" id="email" placeholder="Email Address" v-model="credentials.email">
                <input type="password" id="password" placeholder="Password" v-model="credentials.password">
                <span>
                    <input type="checkbox" class="checkbox">
                    Keep me signed in
                </span>
                <button type="submit" @click.prevent="login" class="btn btn-default">Login</button>
            </form>
</div>
</div>
</template>


<script>
   import axios from 'axios'
    export default {
        name: 'Login',
        data(){
            return {
                credentials: {
                    email: '',
                    password: ''
                },
                loading: true,

            }
        },
        mounted(){
             if(this.$store.state.token !== ''){
                 axios.post('http://127.0.0.1:8000/api/v1/checkToken',{token : this.$store.state.token})
                  .then(
                    response => {
                        // console.log(response.data)
                        if(response){
                           this.loading = false
                           this.$router.push('/web/dashboard')

                        }
                    })
                   .catch(error => {
                        this.loading = false
                        this.$store.commit('clearToken')
                    })
             }else{
                 console.log('no')
             }
        },
        methods:{

            login(){
                axios.post('http://127.0.0.1:8000/api/v1/login',this.credentials)
                .then(
                    response => {
                        // console.log(response.data)
                        if(response.data.success == true){
                            console.log(response.data)
                           this.$store.commit('setToken',response.data.token)
                        }
                    })
                   .catch(error => {
                        console.log('error!')
                    })
            }
        }
    }
</script>

