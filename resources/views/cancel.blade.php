<x-layout>
    <div class="container text-center mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-danger">Payment Failed</h2>
                <i class="fa fa-times-circle text-danger" style="font-size: 80px;"></i>
                <p class="card-text mt-3">Unfortunately, your payment could not be processed.</p>
                <div class="alert alert-warning mt-4" role="alert">
                    Reason: Payment authorization failed. Please check your payment details and try again.
                </div>
                <a href="/retry-payment" class="btn btn-primary mt-4">Retry Payment</a>
                {{-- <a href="/contact-support" class="btn btn-secondary mt-2">Contact Support</a> --}}
            </div>
        </div>
    </div>
</x-layout>