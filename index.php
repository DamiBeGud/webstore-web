<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    // Shop
    '/' => 'controllers/shop/index.php',
    // '/login' => 'controllers/login.php',
    // '/register' => 'controllers/register.php',
    '/cart'=> 'controllers/shop/cart.php',
    '/cart/payment'=> 'controllers/shop/payment.php',
    '/cart/payment/success' => 'controllers/shop/paymentSuccess.php',
    '/shop' => 'controllers/shop/shop.php',
    '/shop/product' => 'controllers/shop/product.php',
    '/about' => 'controllers/shop/about.php',
    // Dashboard
    '/dashboard' => 'controllers/dashboard/dashboard.php',
    '/dashboard/products' => 'controllers/dashboard/products.php',
    '/dashboard/products/add' => 'controllers/dashboard/addProduct.php',
    '/dashboard/products/edit' => 'controllers/dashboard/editProduct.php',
    '/dashboard/orders' => 'controllers/dashboard/orders.php',
    '/dashboard/messages' => 'controllers/dashboard/messages.php',
    '/dashboard/admin' => 'controllers/dashboard/admin.php',
    '/login' => 'controllers/dashboard/login.php',
    '/register' => 'controllers/dashboard/register.php',
    //vertification
    '/login/verti'=> 'verti/loginVertification.php',
    '/dashboard/verti'=> 'verti/dashboardVertification.php',
    '/auth' => 'verti/auth.php',
    '/registration/create/token' => 'verti/registrationTokenGenerate.php',
    '/register/verti' => 'verti/registrationVertification.php',


    // '/upload/image' => 'uploads/upload.php',
    // CRUD
    '/create/product' => 'functions/postQuery.function.php',
    '/create/message' => 'functions/sendMessage.function.php',
    '/create/order' => 'functions/createOrder.function.php',


    '/delete/product' => 'functions/deleteProduct.function.php',

    // api
    '/create/token' => 'api/createToken.php',

    '/update/token' => 'api/updateToken.php',
    '/update/token/cart' => 'api/updateTokenCart.php',
    '/update/message' => 'api/updateMessage.php',
    '/update/order' => 'api/updateOrder.php',
    '/update/product' => 'api/updateProduct.php',


];

if(array_key_exists($uri,$routes)){
    require $routes[$uri];
};

    ?>