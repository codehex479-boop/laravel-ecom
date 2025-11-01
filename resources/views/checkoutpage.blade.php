@include('pages.header')

  <!-- Checkout Section -->
  <section class="checkout">
    <div class="container">
      <h2>Checkout</h2>

      <form action="/successpage" method="get" class="checkout-form">
        <!-- Billing Details -->
        <h3>Billing Details</h3>
        <label for="name">Full Name:</label>
        <input type="text" id="name" placeholder="Enter your full name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" placeholder="Enter your email" required>

        <label for="address">Address:</label>
        <input type="text" id="address" placeholder="Enter your address" required>

        <label for="city">City:</label>
        <input type="text" id="city" placeholder="Enter your city" required>

        <label for="zip">ZIP Code:</label>
        <input type="text" id="zip" placeholder="Enter ZIP code" required>

        <!-- Payment Details -->

        <div style="margin-bottom: 20px;">
            <h5 style="font-weight: bold; margin-bottom: 10px;">Payment Method</h5>

            <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
                <label style="border: 2px solid #ddd; border-radius: 10px; padding: 10px 20px; 
                              display: flex; align-items: center; gap: 10px; cursor: pointer;
                              transition: 0.3s;">
                    <input type="radio" name="payment_method" value="cod" required
                          style="accent-color: #e85c0d; transform: scale(1.2);">
                    <span style="font-size: 16px; font-weight: 500;">Cash on Delivery</span>
                </label>

                <label style="border: 2px solid #ddd; border-radius: 10px; padding: 10px 20px; 
                              display: flex; align-items: center; gap: 10px; cursor: pointer;
                              transition: 0.3s;">
                    <input type="radio" name="payment_method" value="online" required
                          style="accent-color: #e85c0d; transform: scale(1.2);">
                    <span style="font-size: 16px; font-weight: 500;">Online Payment</span>
                </label>
            </div>
        </div>



        {{-- <h3>Payment Details</h3>
        <label for="card">Card Number:</label>
        <input type="text" id="card" placeholder="xxxx-xxxx-xxxx-xxxx" required>

        <label for="expiry">Expiry Date:</label>
        <input type="month" id="expiry" required>

        <label for="cvv">CVV:</label>
        <input type="password" id="cvv" maxlength="3" required> --}}

        <!-- Place Order -->
        <button type="submit" class="btn">Place Order</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  @include('pages.footer')