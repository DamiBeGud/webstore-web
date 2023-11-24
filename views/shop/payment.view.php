<div class="conteiner p-5">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill" id="cartProducts">0</span>
        </h4>
        <?php require "views/partials/paymentRecipt.partial.php";?>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" action="/create/order" method="post" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" name="first_name" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" name="last_name" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>


            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" name="country" required>
                <option value="">Choose...</option>
                <option>Germany</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" name="zip" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <input type="text" name="products" id="productsString"hidden/>
          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>

            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control"  placeholder="" required>

            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" placeholder="" required>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" placeholder="" required>
            </div>
          </div>
<?php 
    $token = $_GET["token"];
?>
            <input type="text" name="token" value="<?=$token?>" hidden/>
            <input type="text" name="total_amount" value="<?=$total?>" id="totalAmount" hidden/>
          <hr class="my-4">
          <div class="d-flex gap-1">
              <a href="/cart?token=<?=$token?>" class="w-100 btn btn-primary btn-lg">Back To Cart</a>
              <button class="w-100 btn btn-primary btn-lg" type="submit" onclick="cleanCart()">Pay</button>
          </div>
        </form>
      </div>
    </div>
    </div>
    <script>

    Storage.prototype.setObj = function(key, obj) {
        return this.setItem(key, JSON.stringify(obj))
    }
    cartLength = cart ? cart.cart.length : 0
    document.getElementById("cartProducts").innerText = cartLength
    let cartItems
    cart.cart.forEach(element => {
            if(cartItems === undefined){
                cartItems = element
            }else{
                cartItems = cartItems + ',' + element
            }
        })
    document.getElementById('productsString').setAttribute('value', cartItems)
    console.log(cartItems)

        function cleanCart(){
            localStorage.setObj('cart',{cart:[]})

        }
    </script>



