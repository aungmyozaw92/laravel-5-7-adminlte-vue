<template>
	<div class="sidebar">

		<div class="row">
			<div class="banner">
				<a href="#"><img alt="" src="front/img/placeholders/banner-300x300.png"></a>
			</div>
		</div>

		<div class="row">
			<div class="widget-sidebar post-block">
				<div class="title-default">
					<span>Hot articles</span>
					<a href="#" class="more">View all</a>
				</div>
				<div class="post-block post-image-60">
					<div class="row" v-for="hot in hot_posts">
						<div class="col-md-12">
							<div class="post">
								<div class="overlay-wrapper text-overlay image-fx">
									<div class="content">
										<div>
											<div class="tags">
												<div class="trending">
													<a href="#">{{hot.category.name}}</a>
												</div> 
												<div>
													<a href="#">{{hot.sub_category.name}}</a>
												</div> 
											</div>
											<a href="#" class="btn btn-default btn-dark">Read more</a>
										</div>
									</div>
									<div class="overlay" v-bind:style="{ 'background-image': 'url(/images/' + hot.image + ')' }"></div>
								</div>
								<div class="image image-fx">
									<a href="#"><img alt="" :src="`/images/${hot.image}`"></a>
								</div>
								<div class="title">
									<h3><a href="#">{{hot.title}}<span class="hot">Hot</span></a></h3>
									<div class="legend">
										<a href="#" class="time">{{hot.created_at | date}}</a>
										<a href="#" class="comments">{{hot.view_count}}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
				<div class="post-block">
					<div class="title-default">
						<span>Latest reviews</span>
						<a href="#" class="more">View all</a>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="post-featured image-fx" v-bind:style="{ 'background-image': 'url(/images/' + review_posts[0].image + ')' }">
								<div class="overlay-wrapper">
									<div class="title">
										<div class="tags">
											<div class="trending"><a href="#">{{review_posts[0].category.name}}</a></div>
											<div><a href="#">{{review_posts[0].sub_category.name}}</a></div>
											
										</div>
										<h3><a href="#">{{review_posts[0].title}}</a></h3>
										<div class="legend">
											<a href="#" class="time">{{review_posts[0].create_at | date}}</a>
											<a href="#" class="comments">{{review_posts[0].view_count}}</a>
										</div>
										<a href="#" class="btn btn-default btn-dark">Read more</a>
									</div>
									<div class="overlay image-fx" v-bind:style="{ 'background-image': 'url(/images/' + review_posts[0].image + ')' }"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="post-block post-image-90">
								<div class="row" v-for="(review,index) in review_posts" v-if="index>0">
									<div class="col-md-12">
										<div class="post">
											<div class="overlay-wrapper text-overlay image-fx">
												<div class="content">
													<div>
														<div class="tags">
															<div class="trending"><a href="#">{{review.category.name}}</a></div>
															<div><a href="#">{{review.sub_category.name}}</a></div>
														</div>
														<a href="#" class="btn btn-default btn-dark">Read more</a>
													</div>
												</div>
												<div class="overlay" v-bind:style="{ 'background-image': 'url(/images/' + review.image + ')' }"></div>
											</div>
											<div class="image image-fx">
												<a href="#"><img alt="" :src="`/images/${review.image}`"></a>
											</div>
											<div class="title">
												<h3><a href="#">{{review.title}}</a></h3>
												<div class="legend">
													<a href="#" class="time">{{review.create_at | date}}</a>
													<a href="#" class="comments">{{review.view_count}}</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
		</div>

		<!-- <div class="row">
				<div class="widget-sidebar post-block article-carousel">
					<div class="title-default">
						<span>Article carousel</span>
					</div>
					<div id="article-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
						<div class="controls left">
							<a href="#article-carousel" data-slide="prev" class="btn btn-default btn-dark"><i class="fa fa-caret-left"></i></a>
							<a href="#article-carousel" data-slide="next" class="btn btn-default btn-dark"><i class="fa fa-caret-right"></i></a>
							<ol class="carousel-indicators">
								<li data-target="#article-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#article-carousel" data-slide-to="1"></li>
								<li data-target="#article-carousel" data-slide-to="2"></li>
							</ol>
						</div>
						<div class="carousel-inner">
							<div class="slide item active">
								<div class="post-featured image-fx" style="background-image: url(front/img/photos/photo-21.jpg);">
									<div class="overlay-wrapper">
										<div class="title">
											<div class="tags">
												<div class="trending"><a href="#">Trending</a></div>
												<div><a href="#">Travel</a></div>
												<div>
													<a href="#" class="show-more"><i class="fa fa-plus-square"></i></a>
													<div class="more-dropdown">
														<div><a href="#">Lifestyle</a></div>
														<div><a href="#">Nature</a></div>
														<div><a href="#">Sports</a></div>
														<div><a href="#">Transportation</a></div>
													</div>
												</div>
											</div>
											<h3><a href="#">Phasellus volutpat eros lorem id bibendum resta dios</a></h3>
											<div class="legend">
												<a href="#" class="time">12 July, 2015</a>
												<a href="#" class="comments">3</a>
											</div>
										</div>
										<div class="overlay image-fx" style="background-image: url(front/img/photos/photo-5.jpg);"></div>
									</div>
								</div>
							</div>
							<div class="slide item">
								<div class="post-featured image-fx" style="background-image: url(front/img/photos/photo-6.jpg);">
									<div class="overlay-wrapper">
										<div class="title">
											<div class="tags">
												<div><a href="#">Lifestyle</a></div>
											</div>
											<h3><a href="#">Incentivize enable repur pose channels monetize everyday teamwork</a></h3>
											<div class="legend">
												<a href="#" class="time">12 July, 2015</a>
												<a href="#" class="comments">3</a>
											</div>
										</div>
										<div class="overlay image-fx" style="background-image: url(front/img/photos/photo-6.jpg);"></div>
									</div>
								</div>
							</div>
							<div class="slide item">
								<div class="post-featured image-fx" style="background-image: url(front/img/photos/photo-15.jpg);">
									<div class="overlay-wrapper">
										<div class="title">
											<div class="tags">
												<div><a href="#">Lifestyle</a></div>
											</div>
											<h3><a href="#">Incentivize enable repurpose, "out-of-the-box channels monetize</a></h3>
											<div class="legend">
												<a href="#" class="time">12 July, 2015</a>
												<a href="#" class="comments">3</a>
											</div>
										</div>
										<div class="overlay image-fx" style="background-image: url(front/img/photos/photo-15.jpg);"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>

		<div class="row">
				<div class="widget-sidebar post-block widget-archive">
					<div class="title-default">
						<span>Archive</span>
					</div>
					<div class="archive">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div>
									<span><a href="#">August, 2015</a></span>
									<span class="posts">31</span>
									<span class="comments">125</span>
									<span class="photos">354</span>
								</div>
								<div>
									<span><a href="#">September, 2015</a></span>
									<span class="posts">54</span>
									<span class="comments">215</span>
									<span class="photos">160</span>
								</div>
								<div>
									<span><a href="#">November, 2015</a></span>
									<span class="posts">49</span>
									<span class="comments">378</span>
									<span class="photos">145</span>
								</div>
								<div>
									<span><a href="#">December, 2015</a></span>
									<span class="posts">21</span>
									<span class="comments">112</span>
									<span class="photos">102</span>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div> -->

		<div class="row">
				<div class="banner">
					<a href="#"><img alt="" src="front/img/placeholders/banner-300x300.png"></a>
				</div>
		</div>

		<div class="row">
				<div class="widget-sidebar post-block widget-tags">
					<div class="title-default">
						<span>Tag cloud</span>
						<a href="#" class="more">View all</a>
					</div>
					<div class="tags">
						<a href="#">cycling<span>12</span></a>
						<a href="#">technology<span>64</span></a>
						<a href="#">tea<span>9</span></a>
						<a href="#">fashion show<span>19</span></a>
						<a href="#">football<span>22</span></a>
						<a href="#">travel<span>35</span></a>
						<a href="#">hockey<span>7</span></a>
						<a href="#">sports<span>25</span></a>
						<a href="#">lifestyle<span>18</span></a>
						<a href="#">community<span>36</span></a>
					</div>
				</div>
		</div>

	</div>
</template>
<script>
  export default {
    mounted() {
           this.$store.dispatch('getPostByHot');
           this.$store.dispatch('getPostByReview');
        },
        computed: {
           hot_posts(){
              return this.$store.getters.hot_posts;
           },
           review_posts(){
              return this.$store.getters.review_posts;
           }
        },
  }
</script>