@extends('layouts.auth')

@section('main')
    <div class="container login" id="container">

        <div class="form-container sign-in-container ">
            <form action="#">
                <h1>Hi {{$name}},</h1>
                <div class="position-relative text-start ">
                    <label class="ms-2 mt-2 " style="font-size: 14px;">Company Name:</label>
                    <input type="text" placeholder="Company Name" />
                    <label class="ms-2 mt-2 " style="font-size: 14px;">Company Address:</label>
                    <input type="text" placeholder="Address" />
                    <label class="ms-2 mt-2 " style="font-size: 14px;">Phone Number:</label>
                    <input type="phone" placeholder="Phone Number" />
                    <label class="ms-2 mt-2 " style="font-size: 14px;">Company Logo:</label>
                    <input type="file" placeholder="Logo" />
                </div>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>welcome,</h1>
                    <p>Let's build your dream team together.</p>
                </div>
            </div>
        </div>
    </div>
@endsection