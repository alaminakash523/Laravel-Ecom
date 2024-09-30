<x-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Shopping Cart</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Cart Item 1 -->
                    @foreach ($cartProducts as $product)
                        
                    <tr>
                        <td>{{$product->product->name}}</td>
                        <td>${{$product->product->price}}</td>
                        <td>
                            <input type="number" class="form-control w-50" value="1" min="1" onchange="updateSubtotal(this)">
                        </td>
                        <td class="subtotal">${{$product->product->price}}</td>
                        <td>
                            <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-from-cart-{{ $product->id }}').submit();">Remove item</a>

                            <form id="delete-from-cart-{{ $product->id }}" action="/delete-from-cart/{{ $product->id }}" method="POST" style="display: none;">
                                @csrf
                                <input type="submit" class="btn btn-primary" value="Add to Cart"/>
                            </form>
                            {{-- <button class="btn btn-danger btn-sm" onclick="removeItem(this)">Remove</button> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h4>Total: <span id="total-price">${{$total}}</span></h4>
            <a class="btn btn-success btn-lg" href="/delivary-details">Proceed to Checkout</a>
        </div>
    </div>
</x-layout>