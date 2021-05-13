<template>
   <div>
   		<app-header></app-header>
           <div class="min-h-screen">
                    <!-- <index/> -->
                    <router-view></router-view>
                 </div>
   		<app-footer></app-footer>

   </div>
</template>

<script>
import AppHeader from '../pages/Header.vue'
import AppFooter from '../pages/Footer.vue'
import Index from '../pages/index.vue'

export default {
		components : {
				AppHeader,
				AppFooter,
                Index
		}
    }
</script>
