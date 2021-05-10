<template>
   <div>
       <nav class="bg-red-600 p-4 flex justify-between  text-white text-xl">
           <h1>Home</h1>
         <div>
          <a class="px-3"  href="">Login</a>
           <a class="px-3"  href="">Register</a>
         </div>
       </nav>
   </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
