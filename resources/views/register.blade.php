@include('pages.header')

  <!-- Register Section -->
  <section class="auth">

    {{-- Register Success Message Show --}}
   {{-- @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
@endif --}}

{{-- message code end here --}}

    <div class="container">
      <div class="auth-box">
        <h2>Create Account</h2>
        <form action="{{ url('/register')}}" method="post">
          @csrf
          <label for="name">Full Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
          @error('name')
            <div style="color:red">{{$message}}</div>
          @enderror
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
          @error('email')
            <div style="color:red">{{$message}}</div>
          @enderror
          <label for="address">Address:</label>
          <input type="text" id="address" name="address" placeholder="address" required>

          <label for="phone">Phone Number:</label>
          <input type="text" id="phone" name="phone" placeholder="phone" required>
          @error('phone')
            <div style="color:red">{{$message}}</div>
          @enderror
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter password" required> 
          @error('password')
            <div style="color:red">{{$message}}</div>
          @enderror

          <button type="submit" name="submit" class="btn">Register</button>
        </form>
        <p>Already have an account? <a href="/login">Login</a></p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  @include('pages.footer')