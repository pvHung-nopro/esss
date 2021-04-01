<template>
     <div class="flex">
       <div>
              <router-link to="/web/home">Home</router-link>
       </div>
          <div>
              <router-link to="/web/login">login</router-link>
       </div>
          <div>
              <router-link to="/web/dashboard">dashboard</router-link>
       </div>

         <router-view></router-view>
     </div>
</template>

<script>
    export default {
        name: 'App'
    }
</script>

