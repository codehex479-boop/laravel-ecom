 

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
    
  {{-- Category ADDED MESSAGE --}}
    @if(session('cat_success'))
      <script>
        Swal.fire({
          title:"Category Added!",
          text:@json(session('cat_success')),
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
  <main class="admin-main">
    <h2>Manage Categories</h2>

    <!-- Add Category Form -->
    <section class="form-section">
      <h3>Add New Category</h3>
      <form class="category-form" action="{{url('/admin/categories')}}" method="Post"  enctype="multipart/form-data">
        @csrf
        <input type="text" name="category_name" placeholder="Category Name" required>
        <textarea placeholder="Category Description"  name="category_desc"></textarea>
        @error('category_desc')
            <div style="color:red">{{$message}}</div>
        @enderror

         <input type="file" name="category_img" accept="image/*">
         @error('product_img')
            <div style="color:red">{{$message}}</div>
          @enderror
        <button type="submit" class="add-btn">Add Category</button>
      </form>
    </section>

    <!-- Categories Table -->
    <section class="table-section">
      <h3>All Categories</h3>
      <table>
        <thead>
          <tr>
            <th>Category ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example Categories -->
         @foreach($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->cat_name}}</td>
            <td>{{$category->cat_desc}}</td>
            <td>{{$category->created_at}}</td>
            <td><img src="{{asset('storage/'.$category->image)}}" alt="Product"></td>
            <td>
              <button class="edit-btn">Edit</button>
             <a href="{{url('/admin/categories',$category->id)}}" class="btn"><button class="delete-btn">Delete</button></a>
            </td>
          </tr>
          @endforeach
          {{-- <tr>
            <td>2</td>
            <td>Fashion</td>
            <td>Clothes, Shoes, Accessories</td>
            <td>2025-08-18</td>
            <td>
              <button class="edit-btn">Edit</button>
              <button class="delete-btn">Delete</button>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Home Appliances</td>
            <td>Kitchen, Furniture, Decor</td>
            <td>2025-08-22</td>
            <td>
              <button class="edit-btn">Edit</button>
              <button class="delete-btn">Delete</button>
            </td>
          </tr> --}}
        </tbody>
      </table>
    </section>
  </main>

</body>
</html>