<template>
  <div class="py-10 flex flex-wrap justify-center">
    <h1 class="text-3xl w-full  text-center"> Login Page</h1>
      <div class="text-center  border rounded">
          <form class="flex flex-wrap" @submit.prevent="submit">
        <div class="py-2 w-full ">
                 <input type="email" v-model="form.email"  class="p-3 border rounded-sm shadow-md w-72"   placeholder="Your Awsome Email">
        </div>
        <div class="py-2 w-full ">
                    <input type="password"  v-model="form.password" class="p-3 border rounded-sm shadow-md w-72"  placeholder="Your Awsome Passwordl">
        </div>

        <div class="py-2 w-full ">
                <input type="submit" value="login" class="text-white w-1/2  bg-blue-500"></input>
         </div>
    </form>
    <div class="w-full">
    <router-link to="/forget-password">
       Forget Password
    </router-link>
    </div>
      </div>
    </div>
</template>
<script>
  export default  {
      middleware : "guest",
    data(){
      return {
          form : {
            email : "",
            password :"",
          }
      }
    },
    methods : {
      submit(){
         this.$http.post("/login",this.form)
               .then(response=>{
                  window.location = '/'
                })
      }
    }
  }
</script>


