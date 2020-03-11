import Products from './pages/Products.vue';
import Cart from './pages/Cart.vue';
import Login from './pages/Login.vue';
import Pages from './pages/Pages.vue';
import Product from './pages/Product.vue';
import PageNotFound from './pages/PageNotFound.vue';

const routes = [
    {path: '/', component: Products,},
    {path: '/cart', component: Cart},
    {path: '/login', component: Login},
    {path: '/quality', component: Pages},
    {path: '/privacy-policy', component: Pages},
    {path: '/shipping', component: Pages},
    {path: '/contact', component: Pages},
    {path: '/catalog', redirect: '/'},
    {path: '/catalog/:product', component: Product},
    {path: '*', component: PageNotFound},
];

export default routes;