import { createRouter, createWebHashHistory } from 'vue-router';
import Result from './components/Result';
//import Home from './components/Test';

const routes = [
    //{ path:'/', name: 'Home', component: Home },
    { path:'/result', name: 'Result', component: Result }
    
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router; 