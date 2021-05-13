<template>
   <div>
       <nav class="bg-red-600 p-4 flex justify-between  text-white text-xl">
           <h1>Home</h1>
         <div v-if="loggedIn" class="flex">
             <p class="px-3"> Hi,{{ user.name}}</p> 
            <a  href="" @click.prevent="logout">Logout</a>
         </div>
         <div v-else>
          <router-link  class="px-3"  to="/login">Login</router-link>
           <router-link  class="px-3"  to="/register">Register</router-link>
         </div>
       </nav>
   </div>
</template>

<script>
    export default {
        data(){ 
            return { 
                loggedIn  : window.loggedIn,
                user: window.user
            }
        },
        methods : { 
            logout(){
                this.$http.post('logout')
                .then(response=>{
                    window.location = '/'
                })
            }
        }
    }
</script>
