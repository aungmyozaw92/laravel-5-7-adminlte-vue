<template>
  <div>
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add New User</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.Dashboard'}" >Home</router-link></li>
                <li class="breadcrumb-item"><router-link :to="{name: 'Admin.User'}" >User List</router-link></li>
                <li class="breadcrumb-item active">User New Form</li>
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
                  <h3 class="card-title mb-0">User New Form</h3>
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
                        <label for="email" class="col-sm-2 control-label mt-2">Email</label>

                        <div class="col-sm-8">
                          <input type="email" v-model="email" class="form-control" :class="{ 'is-invalid': errors.email }" id="email" placeholder="Email">
                          <span v-if="errors.email" class="invalid-feedback" role="alert">{{errors.email[0]}}</span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 control-label mt-2">Password</label>

                        <div class="col-sm-8">
                          <input type="password" v-model="password" class="form-control" :class="{ 'is-invalid': errors.password }" id="password" placeholder="Password">
                          <span v-if="errors.password" class="invalid-feedback" role="alert">{{errors.password[0]}}</span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="confirm_password" class="col-sm-2 control-label mt-2">Password</label>

                        <div class="col-sm-8">
                          <input type="password" v-model="confirm_password" :rules="[comparePasswords]" class="form-control" :class="{ 'is-invalid': errors.confirm_password }" id="confirm_password" placeholder="Password">
                          <span v-if="errors.confirm_password" class="invalid-feedback" role="alert">{{errors.confirm_password[0]}}</span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="type" class="col-sm-2 control-label mt-2">User Type</label>

                        <div class="col-sm-8">
                          <input type="text" v-model="type" class="form-control" :class="{ 'is-invalid': errors.type }" id="type" placeholder="User Type">
                          <span v-if="errors.type" class="invalid-feedback" role="alert">{{errors.type[0]}}</span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="text" class="col-sm-2 control-label mt-2">Bio</label>

                        <div class="col-sm-8">
                          <input type="text" v-model="bio" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-4">
                          <button type="button" :disabled="!formIsValid" v-on:click="addNewUser()" class="btn btn-outline-success btn-flat mr-5 float-right">Submit</button>
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
        type: '',
        bio: '',
        email: '',
        password: '',
        confirm_password: '',
        errors: []
      }
    },
    computed: {
      formIsValid () {
        return this.name !== '' &&
          this.email !== '' &&
          this.password !== '' &&
          this.type !== ''
      },
      comparePasswords () {
        return this.password !== this.confirm_password ? 'Password do no match !' : ''
      },
    },
    methods: {
      addNewUser() {
        if (!this.formIsValid) {
          return
        }
        this.errors = []
        //passing data to api
        
        axios.post('/api/users', {
          name: this.name,
          bio: this.bio,
          email: this.email,
          password: this.password,
          confirm_password: this.confirm_password,
          type: this.type,

        }).then(response=>{
          this.$router.push('/admin/users');
        }).catch(error=>{
          if(error.response.status = 422){
            this.errors = error.response.data.errors
          }
        })
      }
    }
  }
</script>
