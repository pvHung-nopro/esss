<template>

<form methods="post">
                <input type="text" placeholder="Name" name="name" v-model="registers.name">
                <input type="email" placeholder="Email Address" name="email" v-model="registers.email">
                <input type="password" placeholder="Password" name="password" v-model="registers.password">
                <input type="password" placeholder="Password confim" name="passwordConfim" v-model="registers.passwordConfim">
                <!-- <input type="text"  name="rand" placeholder="nhập mã " v-model="registers.rand"> -->
                <button   class="btn btn-default" @click.prevent="register">Signup</button>
            </form>
</template>

<script>
  import axios from 'axios'

    export default {
        name:'register',
          data(){
              return{
                registers:{
                    name: '',
                    email: '',
                    password: '',
                    passwordConfim:'',

                },
              }
          },
          methods:{

          register(){
           axios.post('http://127.0.0.1:8000/api/v1/register',this.registers)
            .then(res =>  {
                    if(res.data.status == true){
                        alert('đăng kí thành công!')
                         window.location.reload();
                    }
            })
            .catch((err) => {
                console.log('error!')
                 alert('thông tin bạn nhập không hợp lệ !')
            });
            },


          }

    }
</script>
