<x-adminlayout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Product</h2>
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <form action="/update-product/{{$product->id}}" method="POST" enctype="multipart/form-data">
                    <!-- Include CSRF token for security (required for Laravel) -->
                    @csrf

                    <!-- Product Name -->
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}" required>
                    </div>

                    <!-- Product Description -->
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        {{-- <textarea class="form-control" id="productDescription" name="description" rows="4" required>{{ $product->description }}</textarea> --}}
                        <textarea class="form-control" id="productDescription" name="description" rows="4" required>{{ $product->description }}</textarea>
                    </div>

                    <!-- Product Price -->
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="price">Product Price ($)</label>
                        <input type="number" class="form-control" id="productPrice" name="price" value="{{ $product->price }}" step="0.01" required>
                    </div>

                    <!-- Product Category -->
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="category_id">Product Category</label>
                        <select class="form-control" id="productCategory" name="category_id" required>
                            @foreach ($category as $item)
                                <option value="{{$item->id}}" {{$product->category_id == $item->id?'selected':""}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Product Image -->
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" class="form-control-file" id="productImage" name="image">
                        <small class="form-text text-muted">Current Image: {{ $product->image }}</small>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-block">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</x-adminlayout>