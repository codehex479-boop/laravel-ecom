@include('pages.header')

{{-- LOgout message here --}}
@if(session('logoutmsg'))
      <script>
        Swal.fire({
          title:"Logout!",
          text:@json(session('logoutmsg')),
          icon:"success",
          timer:3000,
          showConfirmButton: false,
          toast: true,
          postion: "top-end",
        });
        
      </script>
    @endif
{{-- Logout message Ends Here --}}

  <!-- Hero Banner -->
  <section class="hero">
    <div class="hero-content">
      <h1>Welcome to MyShop</h1>
      
      <p>Discover amazing products at the best prices!</p>
  {{-- Checking Functionality Login Hai Ki nahi --}}
      @auth
      <a href="/shophere" class="btn">Shop Now</a>
      @else
      <a href="/login" class="btn">Shop Now</a>
      @endif
  {{-- Checking Functionality Ends Here --}}
    </div>
  </section>

  <!-- Featured Products -->
  <section class="products">
    <div class="container">
      <h2>Featured Products</h2>
      <div class="product-grid">
        @forelse ($Categories as $category )
        <div class="product-card">
          <img src="{{asset('storage/'.$category->image)}}" alt="Product 1">
          <h3>{{$category->cat_name}}</h3>
          {{-- <p>${{$category->price}}</p> --}}
 {{-- Checking Functionality Login Hai Ki nahi --}}
          @auth
          <a href="{{url('/shop',$category->id)}}" class="btn">View</a>
          @else
          <a href="/login" class="btn">View</a>
          @endif
  {{-- Checking Functionality Ends Here --}}
        </div>
        @empty
          <h3 style="text-align: center;">No Product Found</h3>
         @endforelse

      </div>
    </div>
  </section>

  @include('pages.footer')