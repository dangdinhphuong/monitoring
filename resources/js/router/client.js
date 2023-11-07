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
            {
                path: "/tables",
                name: "tables",
                component: () => import("../views/client/Tables.vue")
            },{
                path: "/notes",
                name: "notes",
                component: () => import("../views/client/Notes.vue")
            },
        ]
    }
];

export default client;
