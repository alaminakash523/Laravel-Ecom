<x-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Delivery Details</h2>
        <form action="/submit-delivery-details" method="POST">
            @csrf 
            
            <!-- Full Name -->
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Enter your full name" required>
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <!-- Phone Number -->
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>

            <!-- Address Line 1 -->
            <div class="form-group">
                <label for="address1">Address Line 1</label>
                <input type="text" class="form-control" id="address1" name="address_line_1" placeholder="Street address, P.O. box, etc." required>
            </div>

            <!-- Address Line 2 -->
            <div class="form-group">
                <label for="address2">Address Line 2</label>
                <input type="text" class="form-control" id="address2" name="address_line_2" placeholder="Apartment, suite, unit, building, floor, etc. (optional)">
            </div>

            <!-- City -->
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" required>
            </div>

            <!-- State/Province -->
            <div class="form-group">
                <label for="state">State/Province</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="Enter your state or province" required>
            </div>

            <!-- Postal Code -->
            <div class="form-group">
                <label for="postalCode">Postal Code</label>
                <input type="text" class="form-control" id="postalCode" name="postal_code" placeholder="Enter your postal code" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Confirm & Pay</button>
        </form>
    </div>
</x-layout>