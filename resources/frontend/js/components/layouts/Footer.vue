<template>
	<div class="container-flud footer">
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-xs-12 widget-default widget-footer">
                    <div class="logo-1">
                        <a href="#">Magellan<span>News</span></a>
                        <p>magazine HTML template</p>
                    </div>
                    <div class="about">
                        <p>Vindicate viral incentivize synergize evolve content brand facilitate collaborative widgets; syndicate. Embrace holistic user-centric facilitate schemas robust repurpose grow channels innovative viral rss-capable, user-centred, e-business, "synergistic reintermediate." Clicks-and-mortar.</p>
                    </div>
                    <div class="social">
                        <a href="#"><i class="fa fa-facebook-square"></i></a>
                        <a href="#"><i class="fa fa-twitter-square"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-google-plus-square"></i></a>
                        <a href="#"><i class="fa fa-youtube-square"></i></a>
                        <a href="#"><i class="fa fa-vimeo-square"></i></a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 widget-default widget-footer">
                    <div class="title-default">
                        <span>Latest posts</span>
                    </div>
                    <div class="post-block post-image-60">
                        <div class="row" v-for="post in posts">
                            <div class="col-md-12">
                                <div class="post">
                                    <div class="overlay-wrapper text-overlay image-fx">
                                        <div class="content">
                                            <div>
                                                <div class="tags">
                                                    <div class="trending">
                                                        <a href="">
                                                            {{post.category.name}}
                                                        </a>
                                                    </div>  
                                                    
                                                    <div>
                                                        <a href="">
                                                        Local Sport</a>
                                                    </div>
                                                </div>
                                                <a href="" class="btn btn-default btn-dark">Read more</a>
                                            </div>
                                        </div>
                                        <div class="overlay image-fx" v-bind:style="{ 'background-image': 'url(/images/' + post.image + ')' }"></div>
                                    </div>
                                    <div class="image image-fx">
                                        <a href=""><img alt="" :src="`/images/${post.image}`"></a>
                                    </div>
                                    <div class="title">
                                        <h3><a href="">{{post.title}}</a></h3>
                                        <div class="legend">
                                            <a href="#" class="time">{{post.created_at | date}}</a>
                                            <a href="#" class="fa fa-eye">{{post.view_count}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 widget-default widget-footer">
                    <div class="title-default">
                        <span>Categories</span>
                    </div>
                    <div class="categories">
                        <ul>
                         
                            <li v-for="cat in categories">
                                <a href="">{{cat.name}}</a><span>{{cat.posts.length}}</span>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 copyright">
                    Copyright 2015 <a href="https://planetshine.net">Planetshine</a>. All rights reserved. Powered by Bootstrap 3.3  <a href="#">Buy Magellan template at ThemeForest</a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
  export default {
    mounted() {
           this.$store.dispatch('getCategories');
           this.$store.dispatch('getPostByCount');
        },
        computed: {
           categories(){
              return this.$store.getters.categories;
           },
           posts(){
              return this.$store.getters.posts_by_count;
           }
        },
  }
</script>