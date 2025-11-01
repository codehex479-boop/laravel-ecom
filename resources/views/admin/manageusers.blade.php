<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Products</title>
    <link rel="stylesheet" href="../css/admin.css">
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
  <!-- Main Content -->
  <main class="admin-main">
    <h2>Manage Users</h2>

    <!-- Users Table -->
    <section class="table-section">
      <table>
        <thead>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example Users -->
          @foreach ($Users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->created_at}}</td>
            <td>
              <button class="delete-btn">Delete</button>
              <button class="block-btn">Block</button>
            </td>
          </tr>
             @endforeach
          {{-- <tr>
            <td>2</td>
            <td>Pooja Verma</td>
            <td>pooja@example.com</td>
            <td>9876501234</td>
            <td>User</td>
            <td>2025-08-25</td>
            <td>
              <button class="delete-btn">Delete</button>
              <button class="block-btn">Block</button>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Admin</td>
            <td>admin@example.com</td>
            <td>-</td>
            <td><strong>Admin</strong></td>
            <td>2025-08-01</td>
            <td>
              <button class="delete-btn" disabled>Delete</button>
              <button class="block-btn" disabled>Block</button>
            </td>
          </tr> --}}
        </tbody>
      </table>
    </section>
  </main>

</body>
</html>