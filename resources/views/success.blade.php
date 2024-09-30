<x-layout>
    <div class="container text-center mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-success">Payment Successful!</h2>
                <i class="fa fa-check-circle text-success" style="font-size: 80px;"></i>
                <p class="card-text mt-3">Thank you for your payment. Your transaction was completed successfully.</p>
                <div class="alert alert-info mt-4" role="alert">
                    Transaction ID: #{{$paymentID}}
                </div>
                <a href="/" class="btn btn-primary mt-4">Return to Home</a>
                {{-- <a href="/orders" class="btn btn-secondary mt-2">View Your Orders</a> --}}
            </div>
        </div>
    </div>
</x-layout>