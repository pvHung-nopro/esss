<template>
<div>
 <form   method="post" >
                <input type="email" id="email" name="email" placeholder="Email Address" v-model="form.email">
                <input type="password" id="password" name="password" placeholder="Password" v-model="form.password">
                <span>
                    <input type="checkbox" class="checkbox">
                    Keep me signed in
                </span>
                <button type="submit" class="btn btn-default" @click.prevent="login">Login</button>
            </form>
</div>
</template>


<script>
   import axios from 'axios'

    export default {
        // props: ['homeRoute'],
        name: 'login',
        data(){
            return{
                form:{
                    email:'',
                    password:'',
                },
                 loading: true,
            }
        },


               mounted(){
             if(this.$store.state.token !== ''){
                 axios.post('http://127.0.0.1:8000/api/v1/checkToken',{token : this.$store.state.token})
                  .then(
                    res => {
                        // console.log(response.data)
                        if(res){
                            console.log('ok')
                           this.loading = false
                        //    this.$router.push('/web/dashboard')
                        //    URL:to('('./all/order');
                        // console.log(this.homeRoute);
                          window.location.href  = 'http://localhost:8000/all/order' ;
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
           axios.post('http://127.0.0.1:8000/api/v1/login',this.form)
            .then(res =>  {
                console.log(res.data)
                // if(res.data.success == true){
                //     console.log('login')
                //   console.log(res.data)
                //   this.$store.commit('setToken',res.data.token)
                //    window.location.href  = 'http://localhost:8000/all/order' ;
                // }
            })
            .catch((err) => {
                console.log('error!')
            });
            }
        },


    }
</script>



