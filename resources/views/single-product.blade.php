<x-layout>
    <div class="container mt-5">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <img src="/storage/public/avatars/{{$product->image}}" class="img-fluid" alt="Product Image" style="width: -webkit-fill-available">
            </div>
            <!-- Product Details -->
            <div class="col-md-6">
                <h1 class="display-4">{{$product->name}}</h1>
                <p class="lead text-success">${{$product->price}}</p>
                <p class="text-muted">{!! $product->description !!}</p>
                
                <!-- Product Options -->
                <div class="form-group">
                    <label for="size">Size:</label>
                    <select class="form-control w-50" id="size">
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                    </select>
                </div>
                
                <!-- Add to Cart Button -->
                <a href="#" class="btn btn-primary" onclick="document.getElementById('add-to-cart-form-{{ $product->id }}').submit();">Add to Cart</a>

                <form id="add-to-cart-form-{{ $product->id }}" action="/add-to-cart/{{ $product->id }}" method="POST" style="display: none;">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Add to Cart"/>
                </form>
            </div>
        </div>
    </div>
</x-layout>