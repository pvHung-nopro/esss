<template>

 <div class="rand__">
    <form method="post">
        <input type="text"  name="rand" placeholder="nhập mã " v-model="rand">
        <br/>
      <p>  <button  type="submit"  @click.prevent="ok" class="btn btn-default"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng nhập</font></font></button> </p>

    </form>
    </div>
</template>
<script>
  import axios from 'axios'

    export default {
        name:'rand',
        data(){
            return{
                rand:'',
            }
        },
        methods:{
           ok(){

             if(this.$store.state.session.session == this.rand){

                   axios.post('http://127.0.0.1:8000/api/v1/register', this.$store.state.session.request)
                  .then(res =>  {
                   console.log(res)
                  }).catch((err) => {

                console.log('error!')
            })

             }else{
                 console.log('no')
             }
            // console.log(this.$store.state.session.session)
            //  axios.post('http://localhost:8000/api/v1/register')
         },
        //   mounted(){
        //       console.log(this.$store.state)
        //       console.log('hello')
        //   }
        }

}
</script>
