<template>
  <div>
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add New SubCategory</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.Dashboard'}" >Home</router-link></li>
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.SubCategory'}" >SubCategory List</router-link></li>
                <li class="breadcrumb-item active">SubCategory New Form</li>
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
                  <h3 class="card-title mb-0">SubCategory New Form</h3>
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
                        <label for="type" class="col-sm-2 control-label mt-2">Select Category</label>
                        <div class="col-sm-4">
                          <!-- <input type="s" v-model="category_id" class="form-control" :class="{ 'is-invalid': errors.category_id }" id="category_id" placeholder="Enter Number"> -->
                          <select class="form-control" v-model="category_id">
                            <option disabled value="">Please select one</option>
                            <option v-for="(category, id) in categories" v-bind:value="category.id">
                              {{ category.name }}
                            </option>
                          </select>
                          <span v-if="errors.category_id" class="invalid-feedback" role="alert">{{errors.category_id[0]}}</span>
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
                          <button type="button" :disabled="!formIsValid" v-on:click="addNewSubCategory()" class="btn btn-outline-success btn-flat mr-5 float-right">Submit</button>
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
    data(){
      return {
        name: '',
        category_id: '',
        is_ordering: '',
        errors: [],
      }
    },
    mounted() {
           this.$store.dispatch('getCategories');
    },
    computed: {
      formIsValid () {
        return this.name !== '' && this.category_id !== '' && this.is_ordering !== '' && this.is_ordering > 0 
      },
      categories(){
        return this.$store.getters.categories;
      }
    },
    methods: {
      addNewSubCategory() {
        if (!this.formIsValid) {
          return
        }
        this.errors = []
        //passing data to api
        
        axios.post('/api/subcategory', {
          name: this.name,
          category_id: this.category_id,
          is_ordering: this.is_ordering,

        }).then(response=>{
          this.$router.push('/admin/subcategory');
        }).catch(error=>{
          if(error.response.status = 422){
            this.errors = error.response.data.errors
          }
        })
      }
    }
  }
</script>
