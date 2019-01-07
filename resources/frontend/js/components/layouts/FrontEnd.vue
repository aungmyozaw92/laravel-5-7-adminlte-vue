<template>
    <div>
        <Header/>
           <Slider/>
                <div class="container main-content-wrapper sidebar-right">
            

                <div class="main-content">
                    <router-view></router-view>
                </div>
                <Sidebar/>
                
                
            </div>



            <div class="banner banner-footer">
                <a href="#"><img alt="" src="front/img/placeholders/banner-970x90.png"></a>
            </div>
            <Footer/>
    </div>
</template>

<script>
    import Header from './Header.vue';
    import Footer from './Footer.vue';
    import Slider from './Slider.vue';
    import Sidebar from './Sidebar.vue';
    export default {
        name: 'front-end',
        computed: {
        },
        components: {
            Header,
            Footer,
            Slider,
            Sidebar
        }
    }
</script>