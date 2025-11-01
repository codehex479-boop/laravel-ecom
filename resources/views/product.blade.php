@include('pages.header')
  <!-- Product Detail -->

  {{-- //alert suucess message Show Hoga --}}
  @if(session('success'))
      <script>
        Swal.fire({
          icon:'success',
          title: 'success!',
          text:@json(session('success')),
          showConfigruation: true,
          toast: true,
          postion: "top-end",
        });
      </script>
      @endif

      
    {{-- //success MESSAGE CODE END HERE --}}

  <section class="product-detail">
    <div class="container">
      @foreach($products as $product)
     <form action="{{url('/cart',$product->id)}}" method="Post">
      @csrf
      <div class="product-wrapper">
 <!-- Product Image -->
            <div class="product-image">
              <img src="{{asset('storage/'.$product->image)}}" alt="Product Image">
            </div>

            @php
              $incart = \App\Models\Cart::Where('user_id',auth()->id())
                        ->where('product_id',$product->id)
                        ->exists();
            @endphp
  <!-- Product Info -->
            <div class="product-info">
              <h2>{{$product->product_name}}</h2>
              <p>Description - {{$product->desc}}</p>

              <label for="quantity">Quantity:</label>
              <input type="number" id="quantity" name="quantity" value="1" min="1">

              <br><br>
              <button type="submit"class="btn">{{$incart ? 'UnCart' : 'Add To Cart'}}</button>
            </div>
       </div>
       </form>
      @endforeach
    </div>

    
  </section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('.btn').click(function() {
    // e.preventDefault();
    let btn = $(this);
    let productId = btn.data('id');

    $.ajax({
        url: '/cart/' + productId,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(res) {
            if (res.status === 'added') {
                btn.text('UnCart');
            } else {
                btn.text('Add to Cart');
            }
        }
    });
});
</script>

  <!-- Footer -->
  @include('pages.footer')