// // modules/user.js
// import axios from 'axios';

// const state = {
//   user: null,
// };

// const getters = {
//   getUser: (state) => state.user,
// };

// const mutations = {
//   setUser: (state, user) => {
//     state.user = user;
//   },
// };

// const actions = {
//   fetchUserData({ commit }) {
//     // Replace this with your actual API endpoint to fetch the user data
//     // For example, if you're using Laravel, you might have an API route like '/api/user'
//     axios
//       .get('/api/user')
//       .then((response) => {
//         const user = response.data;
//         commit('setUser', user);
//       })
//       .catch((error) => {
//         console.error('Error fetching user data:', error);
//       });
//   },
// };

// export default {
//   state,
//   getters,
//   mutations,
//   actions,
// };
