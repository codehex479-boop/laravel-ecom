<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini E-Commerce Store | Home</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="container">
      <div class="logo">NIRBHAY's CAFE</div>
      <nav>
        <ul class="nav-links">
          <li><a href="/">Home</a></li>
          <li><a href="/shophere">Shop</a></li>
          <li><a href="/cart">Cart</a></li>
  {{-- Agar user Login Hai tho --}}
          @auth
               <li><a href="{{ url('/logout')}}">Logout</a></li>
         
  {{-- Agar login Nahi Hia tho --}}
          @else
            <li><a href="/login">Login</a></li>
          @endauth
          
        </ul>
      </nav>
    </div>
    
  </header>
