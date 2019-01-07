<template>
  <div>
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>SubCategory Management</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">SubCategory Lists</li>
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
                  <h3 class="card-title mb-0">SubCategory Lists</h3>
                </div>
                <div class="card-tools mt-3 mb-2 float-right">
                    <router-link :to="{name: 'Admin.SubCategoryAdd'}" class="btn btn-outline-primary btn-flat float-right mr-3"  >
                      <i class="fas fa-plus"></i> Add New</router-link>
                  </div>
                <!-- /.card-header -->
                <div class="card-body table-reponsive ">
                  <table class="table table-hover table-bordered ">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>Order</th>
                        <th>Action</th>
                      </tr>
                      <tr v-for="(sub_cat, index) in subcategories" :key="sub_cat.id">
                        <td>{{index+1}}</td>
                        <td>{{sub_cat.name}}</td>
                        <td>{{sub_cat.category}}</td>
                        <td>{{sub_cat.is_ordering}}</td>
                        <td>
                           <!-- <router-link :to="{name: 'Admin.CategoryEdit',params: {id: sub_cat.id}}" class="btn btn-outline-success btn-flat">View
                          </router-link> -->
                            <router-link :to="{name: 'Admin.SubCategoryEdit',params: {id: sub_cat.id}}" class="btn btn-outline-primary btn-flat">Edit
                          </router-link>
                            <button type="button" v-on:click="deleteSubCategory(sub_cat.id,index)" class="btn btn-outline-danger btn-flat">Delete</button>
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
           this.$store.dispatch('getSubCategories');
        },
        computed: {
           subcategories(){
              return this.$store.getters.subcategories;
           }
        },
        methods: {
          deleteSubCategory(id,index) {
            axios.delete('/api/subcategory/'+id).then(response=>{
              this.subcategories.splice(index,1)
            }).catch(error=>{
              console.log(error)
            })
          },

          }
  }
</script>
