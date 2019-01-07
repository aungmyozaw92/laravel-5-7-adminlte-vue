<template>
  <div>
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Post</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.Dashboard'}" >Home</router-link></li>
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.Post'}" >Post List</router-link></li>
                <li class="breadcrumb-item active">Post New Form</li>
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
                  <h3 class="card-title mb-0">Edit Form</h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                  <form class="form-horizontal">
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 control-label mt-2">Title</label>
                        <div class="col-sm-8">
                          <input type="text" v-model="title" class="form-control " :class="{ 'is-invalid': errors.title }" id="title" placeholder="Title">
                          <span v-if="errors.title" class="invalid-feedback" role="alert">{{errors.title[0]}}</span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="type" class="col-sm-2 control-label mt-2">Select Category</label>
                        <div class="col-sm-4">
                          <!-- <input type="s" v-model="category_id" class="form-control" :class="{ 'is-invalid': errors.category_id }" id="category_id" placeholder="Enter Number"> -->
                          <select class="form-control" v-model="category_id" v-on:change="onChange">
                            <option disabled value="">Please select one</option>
                            <option v-for="(category, id) in categories" v-bind:value="category.id">
                              {{ category.name }}
                            </option>
                          </select>
                          <span v-if="errors.category_id" class="invalid-feedback" role="alert">{{errors.category_id[0]}}</span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="type" class="col-sm-2 control-label mt-2">Select Sub Category</label>
                        <div class="col-sm-4">
                          <select class="form-control" v-model="sub_category_id" v-on:change="onChange">
                            <option disabled value="">Please select one</option>
                            <option v-for="option in options" v-bind:value="option.id">{{ option.name }}</option>
                          </select>
                          <span v-if="errors.sub_category_id" class="invalid-feedback" role="alert">{{errors.sub_category_id[0]}}</span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="type" class="col-sm-2 control-label mt-2">Description</label>
                        <div class="col-sm-10">
                          <!-- <ckeditor type="classic" v-model="description"></ckeditor> -->
                          <froala :tag="'textarea'" :config="config" v-model="description"></froala>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="type" class="col-sm-2 control-label mt-2">Upload Image</label>
        
                          <div class="col-sm-2" v-if="image">
                              <img :src="image" class="img-responsive" height="70" width="90">
                           </div>
                          <div class="col-sm-4">
                              <input type="file" v-on:change="onImageChange" class="form-control">
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-4">
                          <button type="button" :disabled="!formIsValid" v-on:click="addNewPost()" class="btn btn-outline-success btn-flat mr-5 float-right">Submit</button>
                        </div>
                        
                      </div>
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
  import VueFroala from 'vue-froala-wysiwyg';
  export default{
    props: ['id'],
    data(){
      return {
        title: '',
        description: '',
        category_id: '',
        sub_category_id: '',
        image: '',
        errors: [],
        options: [],
        config: {
          events: {
            'froalaEditor.initialized': function () {
              console.log('initialized')
            }
          }
      }

      }
    },
    mounted() {
      this.$store.dispatch('getCategories');
      axios.get('/api/posts/'+this.id).then(response=>{
        var post = response.data
        console.log(post)

         this.title=post.title,
          this.description=post.description,
          this.category_id=post.category_id,
          this.sub_category_id=post.sub_category_id,
          this.image=post.image
      }).catch(error=>{
        console.log(error)
      })
    },
    computed: {
      formIsValid () {
        return this.title !== '' && this.description !== '' && this.category_id > 0 
      },
      categories(){
        return this.$store.getters.categories;
      },
    },
    methods: {
      onChange: function(e) {
        console.log(event.srcElement.value);
        axios.get('/api/category/'+this.category_id).then(response=>{
          this.options = response.data.sub_category
        }).catch(error=>{
          console.log(error)
        }) 
        // this.options = this.options
      },

      onImageChange(e) {
        let files = e.target.files || e.dataTransfer.files;
        if (!files.length)
          return;
        this.createImage(files[0]);
      },
      createImage(file) {
        let reader = new FileReader();
        let vm = this;
        reader.onload = (e) => {
          vm.image = e.target.result;
        };
        reader.readAsDataURL(file);
      },

      addNewPost() {
        if (!this.formIsValid) {
          return
        }
        this.errors = []
        //passing data to api
        axios.put('/api/posts/'+this.id, {
          title: this.title,
          description: this.description,
          category_id: this.category_id,
          sub_category_id: this.sub_category_id,
          image: this.image,
        }).then(response=>{
          this.$router.push('/admin/posts');
        }).catch(error=>{
          if(error.response.status = 422){
            this.errors = error.response.data.errors
          }
        })
      }
    }
  }
</script>
