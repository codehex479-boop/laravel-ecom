

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Products</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
<body>

    <!-- Header -->
    <header class="admin-header">
        <h1>Admin Panel</h1>
        <nav>
            <ul>
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/admin/categories">Categories</a></li>
                <li><a href="/admin/manageproducts" class="active">Products</a></li>
                <li><a href="/admin/orders">Orders</a></li>
                <li><a href="/admin/manageusers">Users</a></li>
  {{-- Agar user Login Hai tho --}}
            @auth
                <li><a href="{{ url('/logout')}}">Logout</a></li>
         
  {{-- Agar login Nahi Hia tho --}}
             @else
                <li><a href="/login">Login</a></li>
            @endauth
          
            </ul>
        </nav>
    </header>

   {{-- LOGIN SUCCESFULLY MESSAGE --}}
    @if(session('adminlog'))
      <script>
        Swal.fire({
          title:"Login Successfully!",
          text:@json(session('adminlog')),
          icon:"success",
          timer:3000,
          showConfirmButton: false,
          toast: true,
          postion: "top-end",
        });
        
      </script>
    @endif
{{-- MESSAGE END HERE --}}
    
  <!-- Main Content -->

  <main class="dashboard">
    <h2>Dashboard Overview</h2>
    <div class="cards">
      <div class="card">
        <h3>50</h3>
        <p>Users</p>
      </div>
      <div class="card">
        <h3>120</h3>
        <p>Orders</p>
      </div>
      <div class="card">
        <h3>30</h3>
        <p>Products</p>
      </div>
      <div class="card">
        <h3>$5,200</h3>
        <p>Total Revenue</p>
      </div>
    </div>
  </main>

</body>
</html>