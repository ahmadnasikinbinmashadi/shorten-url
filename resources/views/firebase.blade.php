<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.6.2/firebase-app.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/6.6.2/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.6.2/firebase-database.js"></script>

<script>
  var currentUser = [];
  $(document).ready(function() {
    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "{{ env('FIREBASE_KEY', 'AIzaSyCapDVdNuwa8tQ2_NKFCR2jDUd-XURPTMM') }}",
      authDomain: "{{ env('FIREBASE_AUTH_DOMAIN', 'testing-firebase-realtime-db.firebaseapp.com') }}",
      databaseURL: "{{ env('FIREBASE_DATABASE_URL', 'https://testing-firebase-realtime-db.firebaseio.com') }}",
      projectId: "{{ env('FIREBASE_PROJECT_ID', 'testing-firebase-realtime-db') }}",
      storageBucket: "{{ env('FIREBASE_STORAGE_BUCKET', '') }}",
      messagingSenderId: "{{ env('FIREBASE_SENDER_ID', '471194189918') }}",
      appId: "{{ env('FIREBASE_KEY', '1:471194189918:web:93c5032f18e547ebb0f4cf') }}"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    var database = firebase.database();
    var ref = firebase.database().ref();

    initApp();
      console.log(currentUser);


    // var userId = firebase.auth().currentUser.uid;
    // var userId = 1;
    // firebase.database().ref('users').once('value').then(function(snapshot) {
    //   var username = (snapshot.val()) || 'Anonymous';
    // });
  });

  function writeUserData(userId, name, email, imageUrl) {
    console.log('hello');
    firebase.database().ref('users/' + userId).set({
      username: name,
      email: email,
      profile_picture : imageUrl
    });
  }

  /**
   * initApp handles setting up UI event listeners and registering Firebase auth listeners:
   *  - firebase.auth().onAuthStateChanged: This listener is called when the user is signed in or
   *    out, and that is where we update the UI.
   */
  function initApp() {
    // Listening for auth state changes.
    // [START authstatelistener]
    firebase.auth().onAuthStateChanged(function(user) {
      if (user) {
        // User is signed in.
        var displayName = user.displayName;
        var email = user.email;
        var emailVerified = user.emailVerified;
        var photoURL = user.photoURL;
        var isAnonymous = user.isAnonymous;
        var uid = user.uid;
        var providerData = user.providerData;

        currentUser.push({
          userId: user.uid,
          userEmail: user.email
        });
      } else {
        // User is signed out.
      }
    });
    // [END authstatelistener]
  }

/*You can use equalTo() to find any child by value. In your case by name:*/
// ref.child('users').orderByChild('name').equalTo('John Doe').on("value", function(snapshot) {
//     console.log(snapshot.val());
//     snapshot.forEach(function(data) {
//         console.log(data.key);
//     });
// });

function getNameByEmail(email) {
    var db = firebase.database();
    var ref = db.ref('users').orderByChild('email').equalTo(email);
    ref.once('value', snapshot => {
       if (snapshot.exists()) {
           var name = snapshot.val();
           name = Object.values(name);
           name = name[0].name;
           console.log('User email : ' + email + ' User name: '+ name );
       } else {
          console.log('There is no user who has email like '+ email)
       }
    })

}

</script>