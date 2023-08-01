<template>
    <div class="content-header">
      <!-- ... (existing content-header) ... -->
    </div>
  
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <input type="file" class="d-none">
                  <img class="profile-user-img img-circle" :src="profilePicture" alt="User profile picture">
                </div>
  
                <!-- Use Vue.js data binding for the user's name and email -->
                <h3 class="profile-username text-center">{{ userName }}</h3>
                <p class="text-muted text-center">{{ userEmail }}</p>
              </div>
            </div>
          </div>
  
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab"><i class="fa fa-user mr-1"></i> Edit Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#changePassword" data-toggle="tab"><i class="fa fa-key mr-1"></i> Change
                      Password</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="profile">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input v-model="newName" type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input v-model="newEmail" type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button @click="saveChanges" type="button" class="btn btn-success"><i class="fa fa-save mr-1"></i> Save Changes</button>
                        </div>
                      </div>
                    </form>
                  </div>
  
                  <div class="tab-pane" id="changePassword">
                    <!-- ... (existing form for changing password) ... -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const userName = ref('');
  const userEmail = ref('');
  const profilePicture = ref('/noimage.png'); // Set a default profile picture URL
  
  const newName = ref('');
  const newEmail = ref('');
  
  const fetchUserProfile = () => {
    axios.get('/api/users') // Assuming this route fetches the user's profile data
      .then((response) => {
        const user = response.data; // Assuming the user data is returned as an object
        userName.value = user.name;
        userEmail.value = user.email;
        if (user.profile_picture_url) {
          profilePicture.value = user.profile_picture_url;
        }
      })
      .catch((error) => {
        console.error(error);
      });
  };
  
  const saveChanges = () => {
    // Make a request to the backend to update the user's profile with newName and newEmail
    axios.put('/api/users', {
      name: newName.value,
      email: newEmail.value,
    })
    .then((response) => {
      // Update the userName and userEmail with the updated data from the backend
      userName.value = response.data.name;
      userEmail.value = response.data.email;
      // Display a success message or perform any other actions on success
    })
    .catch((error) => {
      console.error(error);
      // Display an error message or perform any other actions on error
    });
  };
  
  onMounted(() => {
    fetchUserProfile();
  });
  </script>
  