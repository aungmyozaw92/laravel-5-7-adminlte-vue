
export const routes = [

	{ name: 'Admin.Dashboard', path: '/admin/home', component: require('./components/Dashboard.vue') },

    { name: 'Admin.Developer', path: '/admin/developer', component: require('./components/Developer.vue') },

    { name: 'Admin.Profile', path: '/admin/profile', component: require('./components/Profile.vue') },

    { name: 'Admin.User', path: '/admin/users', component: require('./components/backend/users/Lists.vue') },

    { name: 'Admin.UserEdit', path: '/admin/users/:id/edit', component: require('./components/backend/users/Edit.vue') , props: true },

    { name: 'Admin.UserAdd', path: '/admin/users/create', component: require('./components/backend/users/Add.vue') },

    { name: 'Admin.Category', path: '/admin/category', component: require('./components/backend/category/Lists.vue') },

    { name: 'Admin.CategoryEdit', path: '/admin/category/:id/edit', component: require('./components/backend/category/Edit.vue') , props: true },

    { name: 'Admin.CategoryAdd', path: '/admin/category/create', component: require('./components/backend/category/Add.vue') },

    { name: 'Admin.SubCategory', path: '/admin/subcategory', component: require('./components/backend/subcategory/Lists.vue') },

    { name: 'Admin.SubCategoryEdit', path: '/admin/subcategory/:id/edit', component: require('./components/backend/subcategory/Edit.vue') , props: true },

    { name: 'Admin.SubCategoryAdd', path: '/admin/subcategory/create', component: require('./components/backend/subcategory/Add.vue') },

    { name: 'Admin.Post', path: '/admin/posts', component: require('./components/backend/post/Lists.vue') },

    { name: 'Admin.PostEdit', path: '/admin/posts/:id/edit', component: require('./components/backend/post/Edit.vue') , props: true },

    { name: 'Admin.PostAdd', path: '/admin/posts/create', component: require('./components/backend/post/Add.vue') },

    { name: 'Admin.PostDetail', path: '/admin/posts/:id', component: require('./components/backend/post/Detail.vue'), props: true },

    { name: 'Admin.PostPending', path: '/admin/pending/posts', component: require('./components/backend/post/Pending.vue') },

    { name: 'Admin.PostApproved', path: '/admin/approved/posts', component: require('./components/backend/post/Approved.vue') },
]