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
  <!-- Main Content -->


   {{-- Category ADDED MESSAGE --}}
    @if(session('product_success'))
      <script>
        Swal.fire({
          title:"Product Added!",
          text:@json(session('product_success')),
          icon:"success",
          timer:3000,
          showConfirmButton: false,
          toast: true,
          postion: "top-end",
        });
        
      </script>
    @endif
  {{-- MESSAGE END HERE --}}


  <main class="admin-main">
    <h2>Manage Products</h2>

    <!-- Add Product Form -->
    <section class="form-section">
      <h3>Add New Product</h3>
      <form action="{{url('/admin/manageproducts')}}" method="Post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="product_name" placeholder="Product Name" required>
        {{-- error msg --}}
         @error('product_name')
            <div style="color:red">{{$message}}</div>
          @enderror

          {{-- end here --}}
        <textarea placeholder="Description" name="product_desc" ></textarea>
         {{-- error msg --}}
         @error('product_desc')
            <div style="color:red">{{$message}}</div>
          @enderror

          {{-- end here --}}

        <input type="number" name="product_price" placeholder="Price" required>
         {{-- error msg --}}
         @error('product_price')
            <div style="color:red">{{$message}}</div>
          @enderror

          {{-- end here --}}
        <input type="number" name="product_stock" placeholder="Stock Quantity" required>
         {{-- error msg --}}
         @error('product_stock')
            <div style="color:red">{{$message}}</div>
          @enderror

          {{-- end here --}}
        <select name="product_category" required>
          <option value="">-- Select Category --</option>
       {{-- data fetching foreach loop --}}
          @foreach ($categories as $category)
            <option value={{$category->id}}>{{$category->cat_name}}</option>
          @endforeach
        {{-- loop end here --}}
        </select>
         {{-- error msg --}}
         @error('product_category')
            <div style="color:red">{{$message}}</div>
          @enderror

          {{-- end here --}}
        <input type="file" name="product_img" accept="image/*">
         @error('product_img')
            <div style="color:red">{{$message}}</div>
          @enderror
        <button type="submit">Add Product</button>
      </form>
    </section>

    <!-- Product List Table -->
    <section class="table-section">
      <h3>All Products</h3>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example row -->
          @foreach ($products as $pro )
         <tr>
            <td>{{$pro->id}}</td>
            <td>{{$pro->product_name}}</td>
            <td>{{$pro->category->cat_name}}</td>
            <td>{{$pro->price}}</td>
            <td>{{$pro->stock}}</td>
            {{-- <td><img src="https://picsum.photos/50/50?random=2" alt="Product"></td> --}}
            <td><img src="{{asset('storage/'.$pro->image)}}" alt="Product"></td>
            <td>
              <a href="#" class="btn"><button class="edit-btn">Edit</button></a>
              <a href="{{url('/admin/manageproducts',$pro->id)}}" class="btn"><button class="delete-btn">Delete</button></a>
            </td>
          </tr>
           @endforeach
        </tbody>
      </table>
    </section>
  </main>

</body>
</html>