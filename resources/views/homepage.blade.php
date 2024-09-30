<x-layout>

      @if (session()->has('logout'))
          {{session('logout')}}
      @endif
      <!-- Hero Section -->
      <div class="jumbotron text-center bg-primary text-white">
        <h1>Welcome to E-Shop</h1>
        <p>Your one-stop shop for all your needs!</p>
        <a href="#" class="btn btn-light btn-lg">Shop Now</a>
      </div>
    
      <!-- Featured Products Section -->
      <div class="container mt-5">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div class="row">
          <!-- Product 1 -->
          @foreach ($products as $product)
              
          <div class="col-md-4">
            <div class="card mb-4">
              <img src="/storage/public/avatars/{{$product->image}}" class="card-img-top" alt="Product 1" style="width: -webkit-fill-available;height: 300px">
              <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p>{{$product->category->name}}</p>
                <p class="card-text">$29.99</p>
                <a href="#" class="btn btn-primary" onclick="document.getElementById('add-to-cart-form-{{ $product->id }}').submit();">Add to Cart</a>

                <form id="add-to-cart-form-{{ $product->id }}" action="/add-to-cart/{{ $product->id }}" method="POST" style="display: none;">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Add to Cart"/>
                </form>
                
                <a href="/single_product/{{$product->id}}" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
          @endforeach
          <!-- Product 3 -->
        </div>
      </div>
    

</x-layout>