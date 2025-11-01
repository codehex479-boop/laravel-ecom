@include('pages.header')
{{-- success message alert --}}
 {{-- @if(session('item_added'))
      <script>
        Swal.fire({
          title:"Item Added Into Cart",
          text:@json(session('item_added')),
          icon:"success",
          timer:3000,
          showConfirmButton: false,
          toast: true,
          postion: "top-end",
        });
        
      </script>
    @endif --}}
  {{-- success message alert ends here --}}

  <!-- Cart Section -->
  <section class="cart">
    <div class="container">
      <h2>Your Shopping Cart</h2>
      
      <table class="cart-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
         <tbody>
        {{-- Forelse loop chalay hai agar cart mai Items hoga tho dikha dega varna No product Found dikhaega --}}
          @forelse($cartItems as $item) 
           <tr>
            <td>{{ $item->product->product_name }}</td>
            <td>Rs.{{ $item->product->price }}</td>
            <td><input type="number" name= "number" value="{{$item->quantity}}"></td>
            <td>Rs.{{ $item->total_price }}</td>
            <td>
             <form action="{{ route('cart.delete', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                        <i class="fa fa-trash"></i> Delete
                    </button>
             </form>
             </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" style="text-align: center; padding:30px;">No Product Found</td>
          </tr>
           @endforelse
          {{-- loop yha khatam hota hai --}}
        </tbody>
         
         
          
        
      </table>

      <!-- Cart Summary -->
      <div class="cart-summary">
        <h3>Cart Total: <span>Rs.{{$grandtotal}}</span></h3>
        <a href="/checkoutpage" class="btn">Proceed to Checkout</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
@include('pages.footer')