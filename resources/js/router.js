import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter)

// Importiamo le rotte alle nostre pagine

import AboutPage from './pages/AboutPage';
import ContactsPage from './pages/ContactsPage';
import PostsHomepage from './pages/PostsHomepage';
import SinglePost from './pages/SinglePost';
import TagsPostsPage from './pages/TagsPostsPage';
import PageNotFound from './pages/errors/PageNotFound';

const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path: '/home',
            name: 'home',
            component: PostsHomepage
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
        {
            path : '/tags',
            name : 'TagsPostsPage',
            component : TagsPostsPage
        },
        {
            path:'*',
            name : 'PageNotFound',
            component : PageNotFound
        }
    ]
})
export default router
