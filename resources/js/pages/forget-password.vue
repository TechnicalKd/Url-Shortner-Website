<template>
    <div>
        <div class="py-10 flex flex-wrap justify-center">
    <h1 class="text-3xl w-full  text-center"> Send Password Reset Link</h1>
      <div class="text-center  border rounded">
          <form class="flex flex-wrap" @submit.prevent="submit">
        <div class="py-2 w-full ">
                 <input type="email" v-model="form.email"  class="p-3 border rounded-sm shadow-md w-72"   placeholder="Your Awsome Email">
        </div>

        <div class="py-2 w-full ">
                <input type="submit" value="Send Password Forget Link" class="text-white w-1/2 border rounded  bg-blue-500"></input>
         </div>
    </form>
      </div>
    </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            form : {
                email : ""
            }
        };
    },
    methods: {
        submit(){
            axios.post('password/email',this.form)
            .then(response=>{
                this.$notify({
                message: response.data.message})
            })
        }
    },
};
</script>

<style>

</style>
