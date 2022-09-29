import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter)

// Importiamo le rotte alle nostre pagine

import AboutPage from './pages/AboutPage';
import ContactsPage from './pages/ContactsPage';
import HomePage from './pages/HomePage';
import SinglePost from './pages/SinglePost';

const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path: '/home',
            name: 'home',
            component: HomePage
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsPage
        }, {
            path: '/about',
            name: 'about',
            component: AboutPage
        }, 
         {
            path: '/posts/:id',
            name: 'posts.show',
            component: SinglePost
        }, 
    ]
})
export default router
