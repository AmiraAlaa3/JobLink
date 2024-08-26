@extends('layouts.auth')

@section('main')
    <div class="container login" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="{{ route('login.store') }}" enctype="multipart/form-data">
                @csrf
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <div id="error" class="alert alert-danger" style="display: none;"> </div>
                <div id="basicFields">
                    <input type="text" placeholder="Name" name="name" id="nameInput" required />
                    <input type="email" placeholder="Email" name="email" id="emailInput" required />
                    <input type="password" placeholder="Password" name="password" id="password" required />
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" id="confirmPasswordInput" required />
                    <select name="role" id="roleSelect" required>
                        <option value="" selected disabled>Select your role</option>
                        <option value="employer">Employer</option>
                        <option value="candidate">Candidate</option>
                    </select>
                    <button type="button" onclick="handleRoleChange()">Next</button>
                </div>
                <!-- Additional Fields for Candidates -->
                <div id="candidateFields" style="display: none;">
                    <input type="text" placeholder="Phone Number" name="candidatePhone" />
                    <div class="row">
                        <div class="col">
                            <select name="day" class="form-control" id="day">
                                <option value="" disabled>Day</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}">
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <select name="month" class="form-control" id="month">
                                <option value="" disabled>Month</option>
                                @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
                                    <option value="{{ $index + 1 }}">
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="year" class="form-control" id="year">
                                <option value="" disabled>Year</option>
                                @for ($i = date('Y'); $i >= 1900; $i--)
                                    <option value="{{ $i }}">
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 text-start">
                        <label for="resume" class="form-label">Your CV</label>
                        <input type="file" name="resume" class="form-control" id="resume" />
                    </div>
                    <div class="mb-3 text-start">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image" />
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" onclick="showBasicFields()">Back</button>
                        <button type="submit">Sign Up</button>
                    </div>
                </div>

                <!-- Additional Fields for Employers -->
                <div id="employerFields" style="display: none;">
                    <input type="text" placeholder="Company Name" name="company_name" />
                    <input type="text" placeholder="Address" name="address" />
                    <input type="text" placeholder="Phone Number" name="employerPhone" />
                    <div class="mb-3 text-start">
                        <label for="logo" class="form-label">Company Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo" />
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" onclick="showBasicFields()">Back</button>
                        <button type="submit">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Log in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="email" />
                <input type="password" placeholder="Password" name="password" />
                <a href="{{ route('resetPass') }}">Forgot your password?</a>
                <button type="submit">Log In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Log In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello,</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
