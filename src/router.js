import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/Home.vue';
import About from './views/About.vue';
import Offers from './views/Offers.vue';
import NewOffers from './views/NewOffers.vue';
import HotOffers from './views/HotOffers.vue';
import JolasOffers from './views/JolasOffers.vue';
import TomsOffers from './views/TomsOffers.vue';
import Offer from './views/Offer.vue';

Vue.use(Router);

export  default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
            path: '/offers',
            name: 'offers',
            component: Offers,
        },
        {
            path: '/new-offers',
            name: 'new-offers',
            component: NewOffers,
        },
        {
            path: '/hot-offers',
            name: 'hot-offers',
            component: HotOffers,
        },
        {
            path: '/jola-offers',
            name: 'jola-offers',
            component: JolasOffers,
        },
        {
            path: '/toms-offers',
            name: 'toms-offers',
            component: TomsOffers,
        },
        {
            path: '/offer/:id',
            name: 'offer',
            component: Offer,
        }
    ],
    scrollBehavior() {
        window.scrollTo(0,0);
    }
});