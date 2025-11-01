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
    <h2>Manage Orders</h2>

    <!-- Orders Table -->
    <section class="table-section">
      <table>
        <thead>
          <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example Orders -->
          <tr>
            <td>#1001</td>
            <td>Rahul Sharma</td>
            <td>$250.00</td>
            <td><span class="status pending">Pending</span></td>
            <td>2025-09-04</td>
            <td>
              <select>
                <option value="pending" selected>Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
              </select>
              <button class="update-btn">Update</button>
            </td>
          </tr>
          <tr>
            <td>#1002</td>
            <td>Pooja Verma</td>
            <td>$120.00</td>
            <td><span class="status completed">Completed</span></td>
            <td>2025-09-03</td>
            <td>
              <select>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed" selected>Completed</option>
                <option value="cancelled">Cancelled</option>
              </select>
              <button class="update-btn">Update</button>
            </td>
          </tr>
          <tr>
            <td>#1003</td>
            <td>Amit Patel</td>
            <td>$75.00</td>
            <td><span class="status processing">Processing</span></td>
            <td>2025-09-02</td>
            <td>
              <select>
                <option value="pending">Pending</option>
                <option value="processing" selected>Processing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
              </select>
              <button class="update-btn">Update</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

</body>
</html>