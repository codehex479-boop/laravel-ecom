@include('pages.header')

  <!-- Shop Page -->
  <section class="shop">
{{-- LOGIN SUCCESFULLY MESSAGE --}}
    @if(session('success'))
      <script>
        Swal.fire({
          title:"Login Successfully!",
          text:@json(session('success')),
          icon:"success",
          timer:3000,
          showConfirmButton: false,
          toast: true,
          postion: "top-end",
        });
        
      </script>
    @endif
{{-- MESSAGE END HERE --}}
    

    <div class="container">
      <h2>Our Products</h2>
      <div class="product-grid">
        <!-- Product 1 -->
        @foreach ($products as $pro)
        {{-- loop start here --}}
        <div class="product-card">
          <img src="{{asset('storage/'.$pro->image)}}" alt="Product 1">
          <h3>{{$pro->product_name}}</h3>
          <p>Rs.{{$pro->price}}</p>
          <a href="{{url('/product',$pro->id)}}" class="btn">View</a>
        </div>
        @endforeach
        {{-- loop ends here --}}
      </div>
    </div>

            <!-- HTML -->
        <div class="pgn-container">
          <ul class="pgn-list">
            <li class="pgn-item disabled"><a href="#">&laquo; Prev</a></li>
            <li class="pgn-item"><a href="#">1</a></li>
            <li class="pgn-item active"><a href="#">2</a></li>
            <li class="pgn-item"><a href="#">3</a></li>
            <li class="pgn-item"><a href="#">4</a></li>
            <li class="pgn-item"><a href="#">Next &raquo;</a></li>
          </ul>
        </div>
  </section>

  <!-- Footer -->
 @include('pages.footer')