import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Index from './pages/index.vue'
import Login from './pages/login.vue'
import Register from './pages/register.vue'
import ForgetPassword from './pages/forget-password.vue'
import ResetPassword from './pages/reset-password.vue'


const routes = [
    { path: '/', component: Index },
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    { path: '/forget-password', component: ForgetPassword },
    { path: '/password/reset/:token', component: ResetPassword }
]
const router = new VueRouter({
    routes,
})

router.beforeEach((to, from, next) => {
    let middleware = to.matched[0].components.default.middleware;
    if (middleware == "guest") {
        if (window.loggedIn) {
            next('/')
            return;
        }
    }
    if (middleware == "auth") {
        if (!window.loggedIn) {
            next('/login')
            return;
        }
    }
    next()
})


export default router;