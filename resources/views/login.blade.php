@include('pages.header')

  <!-- Login Section -->
  <section class="auth">

    {{-- Register Success Message Show --}}
     @if(session('Register'))
      <script>
        Swal.fire({
          // title:"Register Successfully! ! Login Please",
          text:@json(session('Register')),
          icon:"success",
          timer:3000,
          showConfirmButton: false,
          toast: true,
          postion: "top-end",
        });
        
      </script>
    @endif

    {{-- message code end here --}}

    {{-- //Login error message Show Hoga --}}

      @if(session('error'))
      <script>
        Swal.fire({
          icon:'error',
          title: 'Error!',
          text:@json(session('error')),
          showConfigruation: true,
          toast: true,
          postion: "top-end",
        });
      </script>
      @endif
    {{-- //ERROR MESSAGE CODE END HERE --}}

    <div class="container">
      <div class="auth-box">
        <h2>Login</h2>
        <form action="{{ url('/login')}}" method="Post">
          @csrf
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>

          <button type="submit" class="btn">Login</button>
        </form>
        <p>Don’t have an account? <a href="/register">Register</a></p>
      </div>
    </div>
  </section>

  <!-- Footer -->
 @include('pages.footer')