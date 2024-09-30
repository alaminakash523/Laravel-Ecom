<x-layout>
<div class="container mt-5">
    <div class="row">
        <!-- Categories Sidebar -->
        <div class="col-md-3">
            <h4>Categories</h4>
            <ul class="list-group">
                <li class="list-group-item"><a href="/shop">All products</a></li>
                @foreach ($category as $item)
                <li class="list-group-item"><a href="/category/{{$item->id}}">{{$item->name}}</a></li>    
                @endforeach
                
            </ul>
        </div>

        <!-- Product Grid -->
        <div class="col-md-9">
            <div class="row">
                <!-- Product Card 1 -->
                @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img style="height: 200px; background:gray;" src="{{$product->image}}" class="card-img-top" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text text-success">${{$product->price}}</p>
                            <a href="/single_product/{{$product->id}}" class="btn btn-warning">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</x-layout>