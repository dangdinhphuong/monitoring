const client = [
    {
        path: "/",
        component: () => import("../layouts/client.vue"),
        meta: { requiresAuth: true },
        children: [
            {
                path: "/",
                name: "home",
                component: () => import("../views/client/Home.vue")
            },
        ]
    }
];

export default client;
