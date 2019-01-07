export default {
	state: {
 		loading: false,
		users: [],
		categories: [],
		subcategories: [],
		posts: []
	},
	getters: {
		isLoading(state){
			return state.loading;
		},
		users(state){
			return state.users;
		},
		categories(state){
			return state.categories;
		},
		subcategories(state){
			return state.subcategories;
		},
		posts(state){
			return state.posts;
		}
	},
	mutations: {
		updateUsers(state,payload){
			state.users = payload;
		},
		updateCategories(state,payload){
			state.categories = payload;
		},
		updateSubCategories(state,payload){
			state.subcategories = payload;
		},
		updatePosts(state,payload){
			state.posts = payload;
		}	
	},
	actions: {
		getUsers(context){
			axios.get('/api/users').then(response=>{
				context.commit('updateUsers',response.data.users.data);
			})
		},
		getCategories(context){
			axios.get('/api/category').then(response=>{
				// console.log(response.data.categories)
				context.commit('updateCategories',response.data.categories);
			})
		},
		getSubCategories(context){
			axios.get('/api/subcategory').then(response=>{
				context.commit('updateSubCategories',response.data.subcategories);
			})
		},
		getPosts(context){
			axios.get('/api/posts').then(response=>{
				console.log(response.data)
				context.commit('updatePosts',response.data.posts);
			})
		},
		getPendingPosts(context){
			axios.get('/api/pending/posts').then(response=>{
				console.log(response.data)
				context.commit('updatePosts',response.data.posts);
			})
		},
		getApprovedPosts(context){
			axios.get('/api/approved/posts').then(response=>{
				console.log(response.data)
				context.commit('updatePosts',response.data.posts);
			})
		}

	}
}