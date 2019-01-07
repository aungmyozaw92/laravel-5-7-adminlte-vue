<template>
  <div>
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.Dashboard'}" >Home</router-link></li>
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.Post'}" >Post List</router-link></li>
                <li class="breadcrumb-item active">Post Detail</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title mb-0">Post Detail</h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                  <form class="form-horizontal">
                    <div class="card-body">
                      <h3>{{post.title}}</h3>
                      <p>Post By <small><b>{{post.user.username}}</b></small> - {{post.created_at | date }}</p>

                      <img :src="`/images/${post.image}`"/>
                      <br><br>
                      <p v-html="post.description"></p>
                    </div>
                    <!-- /.card-body -->
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
         
      </div>
    </section>
  </div>
</template>

<script>
  export default{
    props: ['id'],
    data(){
      return{
        post:{}
      }
    },
    mounted() {
            axios.get('/api/posts/'+this.id).then(response=>{
              console.log(response.data)
              return this.post = response.data
            }).catch(error=>{
              console.log(error)
            })
         },
       }
     </script>
