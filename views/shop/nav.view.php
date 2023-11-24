<nav class="navbar navbar-expand-md navbar-light sticky-top bg-light p-3">
        <div class="container">
        <a href="/" class="navbar-brand mb-0 h1">Elegance Attire Co.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-4">
                <li class="nav-item "><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item "><a href="/shop" class="nav-link">Shop</a></li>
                <li class="nav-item "><a href="/about" class="nav-link">About</a></li>
                <a href="" type="button" class="btn btn-primary me-4 cart" id="openCartButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <span id="openCart">0</span>
                </a>
            </ul>
        </div>
    </div>
    </nav>
    <script>
    // Storage.prototype.setObj = function(key, obj) {
    //     return this.setItem(key, JSON.stringify(obj))
    // }
    Storage.prototype.getObj = function(key) {
        return JSON.parse(this.getItem(key))
    }
    let cart = localStorage.getObj("cart")
    let cartLength = cart ? cart.cart.length : 0
    document.getElementById("openCart").innerText = cartLength
    let link = document.getElementById("openCartButton")
    link.setAttribute('href', '/cart?token=' + localStorage.getItem('token'))

    // setTimeout(()=>{
    //     cartUrl = "/cart?token=" + localStorage.getItem('token') 
    // },1000)
    // console.log(cartUrl)
    </script>