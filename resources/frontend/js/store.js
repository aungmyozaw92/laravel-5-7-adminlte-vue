export default {
	state: {

		categories: [],
		lifestyle_posts:[],
		sport_posts:[],
		hot_posts:[],
		review_posts:[],
		posts_by_count:[]
	},
	getters: {

		categories(state){
			return state.categories;
		},
		lifestyle_posts(state){
			return state.lifestyle_posts;
		},
		sport_posts(state){
			return state.sport_posts;
		},
		hot_posts(state){
			return state.hot_posts;
		},
		review_posts(state){
			return state.review_posts;
		},
		posts_by_count(state){
			return state.posts_by_count;
		}
	},
	mutations: {
		
		updateCategories(state,payload){
			state.categories = payload;
		},

		updatePostByLifestyle(state,payload){
			state.lifestyle_posts = payload;
		},
		updatePostBySport(state,payload){
			state.sport_posts = payload;
		},

		updatePostByHot(state,payload){
			state.hot_posts = payload;
		},
		updatePostByReview(state,payload){
			state.review_posts = payload;
		},
		updatePostByCount(state,playload){
			state.posts_by_count = playload
		}
	},
	actions: {

		getCategories(context){
			axios.get('api/frontend/category').then(response=>{
				 console.log(response.data)
				context.commit('updateCategories',response.data.categories);
			})
		},

		getPostByLifestyle(context){
			axios.get('api/frontend/post_by_category/lifestyle/4').then(response=>{
				 console.log(response.data)
				context.commit('updatePostByLifestyle',response.data.posts);
			})
		},

		getPostBySport(context){
			axios.get('api/frontend/post_by_category/sports/7').then(response=>{
				 console.log(response.data)
				context.commit('updatePostBySport',response.data.posts);
			})
		},

		getPostByHot(context){
			axios.get('api/frontend/post_by_category/hot/5').then(response=>{
				 console.log(response.data)
				context.commit('updatePostByHot',response.data.posts);
			})
		},

		getPostByReview(context){
			axios.get('api/frontend/post_by_category/reviews/6').then(response=>{
				 console.log(response.data)
				context.commit('updatePostByReview',response.data.posts);
			})
		},

		getPostByCount(context){
			axios.get('api/frontend/posts/4').then(response=>{
				 console.log(response.data)
				context.commit('updatePostByCount',response.data.posts);
			})
		}

	}
}