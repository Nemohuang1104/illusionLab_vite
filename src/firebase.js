// src/firebase.js
import { initializeApp } from "firebase/app";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "firebase/auth";

// Firebase 配置
const firebaseConfig = {
  apiKey: "AIzaSyAvHMDBPGTBuEg7Kb0UrP7EscEKBkhlwRc",
  authDomain: "illusionlab.firebaseapp.com",
  projectId: "illusionlab",
  storageBucket: "illusionlab.appspot.com",
  messagingSenderId: "176984315578",
  appId: "1:176984315578:web:66a039a78733052769d483",
  measurementId: "G-QB83RYDW89"
};

// 初始化 Firebase 並加上錯誤處理
try {
  firebase.initializeApp(firebaseConfig);
} catch (error) {
  console.error("Firebase initialization error", error);
}

// 初始化 Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

export { auth, GoogleAuthProvider, signInWithPopup };
