<nav class="navbar navbar-expand-md navbar-light sticky-top bg-light p-3">
        <div class="container">
        <a href="/dashboard" class="navbar-brand mb-0 h1">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-4">
                <li class="nav-item "><a href="/dashboard" class="nav-link">Dashboard</a></li>
                <li class="nav-item "><a href="/dashboard/messages" class="nav-link">Messages</a></li>
                <li class="nav-item "><a href="/dashboard/products" class="nav-link">Products</a></li>
                <li class="nav-item "><a href="/dashboard/orders" class="nav-link">Orders</a></li>
                <li class="nav-item mx-1">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administration
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="/dashboard/admin" class="nav-link">Admin</a>
                    </div>
                </div>
                </li>
                <li class="nav-item mx-1"><a href="/shop" class="btn btn-primary ">Shop</a></li>
                <li class="nav-item "><button type="button" onclick="logOut()" class="btn btn-primary">Logout</button></li>
            </ul>
        </div>
    </div>
    </nav>
    <a href="/login" id="login" hidden></a>
    <script>
        function logOut(){
            localStorage.removeItem('adminToken')
            document.getElementById('login').click()
        }
    </script>
