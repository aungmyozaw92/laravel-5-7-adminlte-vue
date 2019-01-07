<template>
  <div>
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Update Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.Dashboard'}" >Home</router-link></li>
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.Category'}" >Category List</router-link></li>
                <li class="breadcrumb-item active">Category Update Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title mb-0">Category Update Form</h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                  <form class="form-horizontal">
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 control-label mt-2">Name</label>

                        <div class="col-sm-8">
                          <input type="text" v-model="name" class="form-control " :class="{ 'is-invalid': errors.name }" id="name" placeholder="Name">
                          <span v-if="errors.name" class="invalid-feedback" role="alert">{{errors.name[0]}}</span>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="type" class="col-sm-2 control-label mt-2">Order</label>

                        <div class="col-sm-4">
                          <input type="number" v-model.number="is_ordering" class="form-control" :class="{ 'is-invalid': errors.is_ordering }" id="is_ordering" placeholder="Enter Number">
                          <span v-if="errors.is_ordering" class="invalid-feedback" role="alert">{{errors.is_ordering[0]}}</span>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="col-sm-4">
                          <button type="button" v-on:click="UpdateCategory()" class="btn btn-outline-success btn-flat mr-5 float-right">Submit</button>
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
  export default{
    props: ['id'],
    data() {
      return {
        name: '',
        is_ordering:'',
        errors: []
      }
    },
    mounted() {
      axios.get('/api/category/'+this.id).then(response=>{
        var category = response.data
        this.name = category.name,
        this.is_ordering = category.is_ordering
      }).catch(error=>{
        console.log(error)
      })
    },
    methods: {
      UpdateCategory() {
        axios.put('/api/category/'+this.id, {
          name: this.name,
          is_ordering: this.is_ordering
        }).then(response=>{
          this.$router.push('/admin/category');
        }).catch(error=>{
          console.log(error.response)
          if (error.response.status = 422) {
            this.errors = error.response.data.errors
          }
        })
      }
    }
  }
</script>
