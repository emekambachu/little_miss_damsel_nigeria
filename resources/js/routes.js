import { createWebHistory, createRouter } from "vue-router";
import NotFound from './components/NotFound';
import AdminDashboard from './components/Admin/AdminDashboard';
import AdminContestants from "./components/Admin/Contestants/AdminContestants";
import AdminContestantForm from "./components/Admin/Contestants/AdminContestantForm";
import AdminPayments from "./components/Admin/Payments/AdminPayments";


const routes = [
    {
        // for urls that don't exist
        path: "/:catchAll(.*)",
        name: "NotFound",
        component: NotFound,
        meta: {
            requiresAuth: false
        }
    },

    {
        path: '/admin/dashboard',
        name: "AdminDashboard",
        component: AdminDashboard,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/contestants',
        name: "AdminContestants",
        component: AdminContestants,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/contestant/add',
        name: "AdminAddContestant",
        component: AdminContestantForm,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/contestant/:id/edit',
        name: "AdminEditContestant",
        component: AdminContestantForm,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/payments',
        name: "AdminPayments",
        component: AdminPayments,
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/authenticate').then(() => {
                next()
            }).catch(() => {
                window.location.href = '/login';
            });
        }
    },

    {
        path: '/admin/logout',
        name: "AdminLogout",
        beforeEnter: (to, from, next) => {
            axios.get('/api/admin/logout').then(() => {
                window.location.href = '/login';
            });
        }
    },

    // {
    //     path: '/account/dashboard',
    //     name: "AccountDashboard",
    //     component: Dashboard,
    //     beforeEnter: (to, from, next) => {
    //         axios.get('/api/authenticated').then(() => {
    //             next()
    //         }).catch(() => {
    //             return next({ name: 'Login' })
    //         });
    //     }
    // },
];

const router = createRouter({
    linkExactActiveClass: 'text-dark font-weight-bold',
    history: createWebHistory(),
    routes,
});

export default router;
