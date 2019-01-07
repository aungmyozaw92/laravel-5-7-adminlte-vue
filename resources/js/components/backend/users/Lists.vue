<template>
  <div>
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">General Form</li>
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
                  <h3 class="card-title mb-0">User Lists</h3>
                </div>
                <div class="card-tools mt-3 mb-2 float-right">
                    <router-link :to="{name: 'Admin.UserAdd'}" class="btn btn-outline-primary btn-flat float-right mr-3"  >
                      <i class="fas fa-plus"></i> Add New</router-link>
                  </div>
                <!-- /.card-header -->
                <div class="card-body table-reponsive ">
                  <table class="table table-hover table-bordered ">
                    <tbody>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Action</th>
                      </tr>
                      <tr v-for="user in users" :key="user.id">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.type}}</td>
                        <td>
                           <router-link :to="{name: 'Admin.UserEdit',params: {id: user.id}}" class="btn btn-outline-success btn-flat">View
                          </router-link>
                            <router-link :to="{name: 'Admin.UserEdit',params: {id: user.id}}" class="btn btn-outline-primary btn-flat">Edit
                          </router-link>
                            <button type="button" class="btn btn-outline-danger btn-flat">Delete</button>
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
           this.$store.dispatch('getUsers');
        },
        computed: {
           users(){
              return this.$store.getters.users;
           }
        }
  }
</script>
