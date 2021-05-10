<template>
   <div>
   		<app-header></app-header>

   		<app-footer></app-footer>

   </div>
</template>

<script>
import AppHeader from './components/pages/header.vue'
import AppFooter from './components/pages/footer.vue'
    export default {
		component : {
				AppHeader,
				AppFooter,
		}
    }
</script>
