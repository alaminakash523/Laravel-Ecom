<x-adminlayout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Product</h2>
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <form action="/create-product" method="POST" enctype="multipart/form-data">
                    <!-- Include CSRF token for security (required for Laravel) -->
                    @csrf

                    <!-- Product Name -->
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="name" required>
                    </div>

                    <!-- Product Description -->
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" id="productDescription" name="description" rows="4" required></textarea>
                    
                    </div>

                    <!-- Product Price -->
                    <div class="form-group">
                        <label for="price">Product Price ($)</label>
                        <input type="number" class="form-control" id="productPrice" name="price" step="0.01" required>
                    </div>

                    <!-- Product Category -->
                    <div class="form-group">
                        <label for="productCategory">Product Category</label>
                        <select class="form-control" id="productCategory" name="category_id" required>
                            @foreach ($category as $item)
                                <option value="{{$item->id}}" >{{$item->name}}</option>
                            @endforeach
                            {{-- {{ $product->category == 'electronics' ? 'selected' : '' }} --}}
                            <!-- Add more categories as needed -->
                        </select>
                    </div>

                    <!-- Product Image -->
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" class="form-control-file" id="productImage" name="image">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-block">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</x-adminlayout>
