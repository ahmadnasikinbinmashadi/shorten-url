// Your web app's Firebase configuration
if (typeof firebase === 'undefined') throw new Error('hosting/init-error: Firebase SDK not detected. You must include it before /__/firebase/init.js');
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