<template>
    <div>
        <div class="container mega-menu-wrapper">
            <div class="mega-menu" data-spy="affix">
                <a class="togglemenu" href="#">Active section</a>
                 <div class="container">
                    <ul class="nav">
                        <li class="logo-2">
                            <a href="">Magellan</a>
                        </li>
                        <li><a href=""><i class="fa fa-home"></i></a></li>
                        <li v-for="(category, index) in categories" :key="category.id" v-bind:class="{'menu-item menu-item-type-custom menu-item-object-custom menu-item-522 dropdown full-width':(category.slug === 'lifestyle') ,'menu-item menu-item-type-taxonomy menu-item-object-category menu-item-411 dropdown full-width':(category.slug === 'sports')}" >
                            <a v-if="category.slug == 'lifestyle'" title="Categories" href="" data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle disabled parent" aria-haspopup="true">
                                    <span>{{category.name}}</span>
                            </a>
                            <a v-else-if="category.slug == 'sports'" title="Lifestyle" href="http://planetshine.net/demo/magellan/news/category/lifestyle/" data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle disabled parent" aria-haspopup="true"><span>Sports</span>
                            </a>
                            <a v-else href="">{{category.name}}</a>
                            <ul v-if="category.slug == 'lifestyle'" class="mega-menu-item">
                                <li class="">     
                                    <div id="magellan_dropdown_post_list_with_sidemenu-2" class="constellation-widget section magellan_dropdown_post_list_with_sidemenu">
                                        <div class="container post-block post-image-90">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul>
                                                        <li v-for="sub in category.sub_category"><a href="/">{{sub.name}}</a></li>
                                                    </ul>                 
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="post-featured  image-fx" v-bind:style="{ 'background-image': 'url(/images/' + lifestyle_posts[0].image + ')' }" style="height: 310px;">
                                                                <div class="overlay-wrapper" style="bottom: -47px;">
                                                                    <div class="title">
                                                                        <div class="tags">
                                                                            <div>
                                                                                <div class="trending">
                                                                                    <a href="#">Featured</a>
                                                                                </div>
                                                                                <div>
                                                                                    <a href="" title="Technology" class="tag-default">{{lifestyle_posts[0].sub_category.name}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <h3>
                                                                            <a href="">{{lifestyle_posts[0].title}}</a>
                                                                        </h3>
                                                                        <div class="legend">
                                                                            <a href="" class="time">{{lifestyle_posts[0].created_at | date }}</a>
                                                                            <a href="" class="comments">{{lifestyle_posts[0].view_count}}</a>     
                                                                        </div>
                                                                        <a href="" class="btn btn-default btn-dark">Read more</a>
                                                                    </div>
                                                                    <div class="overlay  image-fx" v-bind:style="{ 'background-image': 'url(/images/' + lifestyle_posts[0].image + ')' }" style=" top: -165px; bottom: 47px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row" v-for="(post_cat, index) in lifestyle_posts" v-if="index>0 && index < 5">
                                                        <div class="col-md-12">
                                                            <div class="post-block post-image-90">
                                                                <div class="post">
                                                                    <div class="overlay-wrapper text-overlay  image-fx">
                                                                        <div class="content">
                                                                            <div>
                                                                                <div class="tags">
                                                                                    <div>
                                                                                        <div>
                                                                                            <a href="" title="{category.name}" class="tag-default">{{post_cat.sub_category.name}}</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="" class="btn btn-default btn-dark">Read more</a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="overlay" v-bind:style="{ 'background-image': 'url(/images/' + post_cat.image + ')' }">
                                                                        </div>
                                                                    </div>

                                                                    <div class="image  image-fx">
                                                                        <a href=""><img :src="`/images/${post_cat.image}`" alt="Moleskine parallax pitch deck latte"></a>
                                                                    </div>

                                                                    <div class="title">
                                                                        <h3>
                                                                            <a href="">{{post_cat.title}}<span class="hot">Hot</span></a>
                                                                        </h3>          
                                                                        <div class="legend">

                                                                            <a href="" class="time">{{post_cat.created_at | date }}6</a>

                                                                            <a href="" class="comments">{{post_cat.view_count}}</a>     
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
                                </li>
                            </ul>
                            
                            
                            <ul v-else-if="category.slug == 'sports'" class="mega-menu-item">
                                <li class="">        
                                    <div id="magellan_dropdown_post_list_with_heading-2" class="constellation-widget section magellan_dropdown_post_list_with_heading">        
                                        <div class="title-default">
                                            <span>Sport News</span>
                                        </div>

                                        <div class="container post-block post-image-90">
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="post-featured  image-fx" v-bind:style="{ 'background-image': 'url(/images/' + sport_posts[0].image + ')' }" style=" height: 310px;">
                                                                <div class="overlay-wrapper" style="bottom: -47px;">
                                                                    <div class="title">

                                                                        <div class="tags">
                                                                            <div>
                                                                                <div class="trending"><a href="#">Featured</a>
                                                                                </div>
                                                                                <div>
                                                                                    <a href="" title="Technology" class="tag-default">{{sport_posts[0].sub_category.name}}
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <h3>
                                                                            <a href="">{{sport_posts[0].title}}</a></h3>

                                                                            <div class="legend">
                                                            
                                                                                <a href="" class="time">{{sport_posts[0].created_at | date}}</a>
                                                                                        
                                                                                <a href="" class="comments">{{sport_posts[0].view_count}}</a>     
                                                                            </div>

                                                                            <a href="" class="btn btn-default btn-dark">Read more</a>

                                                                    </div>
                                                                    <div class="overlay  image-fx" v-bind:style="{ 'background-image': 'url(/images/' + sport_posts[0].image + ')' }" style="top: -165px; bottom: 47px;">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6" v-for="(post_cat, index) in sport_posts" v-if="index>0 && index < 6">
                                                            <div class="post-block post-image-90">
                                                                <div class="post">
                                                                    <div class="overlay-wrapper text-overlay  image-fx">
                                                                        <div class="content">
                                                                            <div>
                                                                                <div class="tags">
                                                                                    <div>
                                                                                        <div>
                                                                                            <a href="" title="Sports" class="tag-default">{{post_cat.sub_category.name}}</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <rating-stars class="">
                                                                                        <i class="stars rating s-2-5"></i>
                                                                                    </rating-stars>
                                                                                </div>
                                                                                <a href="" class="btn btn-default btn-dark">Read more</a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="overlay" v-bind:style="{ 'background-image': 'url(/images/' + post_cat.image + ')' }"></div>
                                                                    </div>

                                                                    <div class="image  image-fx">
                                                                        <a href=""><img :src="`/images/${post_cat.image}`" alt="Moleskine parallax pitch deck latte"></a>
                                                                    </div>

                                                                    <div class="title">
                                                                        <h3><a href="">{{post_cat.title}} <span class="hot">Hot</span></a></h3>          
                                                                        <div class="legend">

                                                                            <a href="" class="time">{{post_cat.created_at | date}}</a>
                                                                            
                                                                            <a href="" class="comments">{{post_cat.view_count}}</a>     
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span v-if="index==2 ||  index== 4"><br></span>
                                                         </div>

                                                    </div>                 
                                                </div>  
                                            </div>
                                            
                                        </div>

                                    </div>              
                                    
                                </li>
                            </ul>
                            
                            <ul v-else> 
                                <li v-for="sub_category in category.sub_category">
                                    <a href="">{{sub_category.name}}</a>
                                </li>
                            </ul>
                        </li>
                        
                         
                    </ul>
                </div>
            </div>
        </div>   
    </div>
</template>

<script>
  export default {
    mounted() {
           this.$store.dispatch('getCategories');
           this.$store.dispatch('getPostByLifestyle');
           this.$store.dispatch('getPostBySport');
        },
        computed: {
           categories(){
              return this.$store.getters.categories;
           },
           lifestyle_posts(){
              return this.$store.getters.lifestyle_posts;
           },
           sport_posts(){
              return this.$store.getters.sport_posts;
           }
        },
  }
</script>