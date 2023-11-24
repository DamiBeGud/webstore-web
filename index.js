

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyBPkLsRoInYShgtalWq4ox6AJ1wqes-akg",
    authDomain: "onlinestore-39a00.firebaseapp.com",
    projectId: "onlinestore-39a00",
    storageBucket: "onlinestore-39a00.appspot.com",
    messagingSenderId: "938349227295",
    appId: "1:938349227295:web:4476693c260d7cf837942a"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

let file;
let imageName;
let input = document.getElementById('inputGroupFile02')
function getFile(e){
    image = e.target.files[0];
    imageName = image.name;
}

function uploadImage(){
    let storageRef = firebase.storage().ref("/images/"+imageName);
    let uploadTask = storageRef.put(image);

    uploadTask.on("state_changed", (snapshot)=>{
        console.log(snapshot);

    },(error)=>{
        console.log("Error is: " + error);
    },()=>{
        uploadTask.snapshot.ref.getDownloadURL().then(url=>{
            console.log(url);
            document.getElementById('imageURL').value = url;
        })
    })
}


function addProductToCart(e){
    console.log(e.target.id);
    const storage = localStorage.getItem('cart')
    const token = localStorage.getItem('token')
    console.log('token : ' + token)
    Storage.prototype.setObj = function(key, obj) {
        return this.setItem(key, JSON.stringify(obj))
    }
    Storage.prototype.getObj = function(key) {
        return JSON.parse(this.getItem(key))
    }
    if(storage){
        console.log(storage)
        const cart = localStorage.getObj('cart')
        cart.cart.push(e.target.id)
        console.log(cart)
        localStorage.setObj('cart', cart)
        let cartItems
        const cartString = cart.cart.forEach(element => {
            if(cartItems === undefined){
                cartItems = element
            }else{
                cartItems = cartItems + ',' + element
            }
        })
            document.getElementById('cart' + e.target.id).value = cartItems
            document.getElementById('token' + e.target.id).value = token
            document.getElementById('cartButton' + e.target.id).click()    
    }else{
        const cart = {
            cart:[]
        }
        cart.cart.push(e.target.id)
        localStorage.setObj('cart', cart)

        document.getElementById('cart' + e.target.id).value = e.target.id
        document.getElementById('token' + e.target.id).value = token
        document.getElementById('cartButton' + e.target.id).click()  

    }
}
