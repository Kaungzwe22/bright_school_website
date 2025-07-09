@extends('frontend.head')
@section('content')
    <style>
        .register-card {
            max-width: 600px;
            margin: auto;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-weight: 600;
        }
    </style>
    <main>
        <div class="container py-5">
            <div class="card register-card p-4 bg-white">
                <h3 class="form-title text-center mb-4"><i class="bi bi-pencil-square me-2"></i>Class Register Form</h3>
                <form>
                    <!-- Student Name -->
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="studentName" name="student_name"
                            placeholder="Enter your full name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="name@example.com" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="09xxxxxxxxx"
                            required>
                    </div>

                    <!-- Payment Phone Number -->
                    <div class="mb-3">
                        <label for="paymentPhone" class="form-label">Payment Phone Number</label>
                        <input type="tel" class="form-control" id="paymentPhone" name="payment_phone"
                            placeholder="09xxxxxxxxx" required>
                    </div>

                    <!-- Section -->
                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <select class="form-select" id="section" name="section" required>
                            <option value="" selected disabled>Select your section</option>
                            <option value="Section A">Section A</option>
                            <option value="Section B">Section B</option>
                            <option value="Section C">Section C</option>
                        </select>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-4">
                        <label class="form-label d-block">Payment Method</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method" id="kbzPay"
                                value="KBZ Pay" required>
                            <label class="form-check-label" for="kbzPay"><i class="bi bi-wallet2 me-1"></i>KBZ Pay</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method" id="wavePay"
                                value="Wave Pay">
                            <label class="form-check-label" for="wavePay"><i class="bi bi-phone me-1"></i>Wave Pay</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method" id="ayaPay"
                                value="Aya Pay">
                            <label class="form-check-label" for="ayaPay"><i class="bi bi-credit-card me-1"></i>AYA
                                Pay</label>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="d-flex align-items-center justify-content-evenly">
                        <a class="btn btn-outline-secondary" href="javascript:history.back()">Back</a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Enroll Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
