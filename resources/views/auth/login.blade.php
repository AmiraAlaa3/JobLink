@extends('layouts.auth')

@section('main')
    <div class="container login" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="post" action="{{route('store')}}">
                @csrf
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="password"/>
                <input type="password" placeholder="Confirm Password" />
                <select name="role" id="roleSelect">
                    <option value="Role" selected>Select youe role</option>
                    <option value="employer">Employer</option>
                    <option value="candidate">Candidate</option>
                </select><br>
                <button type="button" onclick="redirectToRole()">Sign In</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Log in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <a href="{{ route('resetPass') }}">Forgot your password?</a>
                <button>Log In</button>
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
                    <button class="ghost" id="signUp">Sign In</button>
                </div>
            </div>
        </div>
    </div>
@endsection
