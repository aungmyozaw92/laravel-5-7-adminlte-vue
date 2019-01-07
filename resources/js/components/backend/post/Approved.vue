<template>
  <div>
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Post Management</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Post Lists</li>
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
                  <h3 class="card-title mb-0">Post Lists</h3>
                </div>
                <div class="card-tools mt-3 mb-2 float-right">
                    <router-link :to="{name: 'Admin.PostAdd'}" class="btn btn-outline-primary btn-flat float-right mr-3"  >
                      <i class="fas fa-plus"></i> Add New</router-link>
                  </div>
                <!-- /.card-header -->
                <div class="card-body table-reponsive ">
                  <table class="table table-hover table-bordered ">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                      <tr v-for="(post, index) in posts" :key="post.id">
                        <td>{{index+1}}</td>
                        <td>{{post.title}}</td>
                        <td>{{post.category}}</td>
                        <td>{{post.sub_category}}</td>
                        <td>{{post.author}}</td>
                        <td> 
                            <span v-if="post.is_approved">
                              <button type="button" class="btn btn-success btn-sm btn-flat">Approved</button>
                            </span>
                            <span v-else> <button type="button" v-on:click="ApprovedPost(post.id,index)" class="btn btn-sm btn-warning btn-flat">Pending</button></span>
                        </td>
                        <td>
                           <router-link :to="{name: 'Admin.PostDetail',params: {id: post.id}}" class="btn btn-outline-success btn-flat">View
                          </router-link>
                            <router-link :to="{name: 'Admin.PostEdit',params: {id: post.id}}" class="btn btn-outline-primary btn-flat">Edit
                          </router-link>
                            <!-- <button type="button" v-on:click="deletePost(post.id,index)" class="btn btn-outline-danger btn-flat">Delete</button> -->
                            <button type="button" v-on:click="deletePost(post.id,index)" class="btn btn-outline-danger btn-flat">Delete</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
  export default {
    mounted() {
           this.$store.dispatch('getApprovedPosts');
        },
        computed: {
           posts(){
              return this.$store.getters.posts;
           }
        },
        methods: {
          deletePost(id,index) {
            this.$swal({
              title: 'Are you sure?',
              text: 'You can\'t revert your action',
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: 'Yes Delete it!',
              cancelButtonText: 'No, Keep it!',
              cancelButtonColor: '#28a745',
              showCloseButton: true,
              showLoaderOnConfirm: true
            }).then((result) => {
              if(result.value) {
                axios.delete('/api/posts/'+id).then(response=>{
                  this.posts.splice(index,1)
                   this.$swal('Deleted', 'You successfully deleted this post', 'Success')
                }).catch(error=>{
                  console.log(error)
                })
              } else {
                this.$swal('Cancelled', 'Your post is still intact', 'info')
              }
            })
          },
          ApprovedPost(id,index) {
            this.$swal({
              title: 'Are you sure?',
              text: 'You can\'t revert your action',
              type: 'Success',
              showCancelButton: true,
              confirmButtonColor: "#28a745",
              confirmButtonText: 'Yes Approved!',
              cancelButtonText: 'No',
              cancelButtonColor: '#fd7e14',
              showCloseButton: true,
              showLoaderOnConfirm: true
            }).then((result) => {
              if(result.value) {
                axios.put('/api/posts/'+id+'/approved').then(response=>{
                   this.$swal('Aprroved', 'You successfully aprroved this post', 'Success')
                   this.posts.is_approved = true
                }).catch(error=>{
                  console.log(error)
                })
              } 
            })
          }
        }
  }
</script>
