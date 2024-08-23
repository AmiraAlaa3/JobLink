@extends('layouts.auth')

@section('main')
    <div class="container login" id="container">

        <div class="form-container sign-in-container ">
            <form action="#" method="post" action="{{route('store')}}">
                @csrf
                <h1>Hi {{$name}},</h1>
                <div class="position-relative text-start ">
                    <label class="ms-2 mt-2 " style="font-size: 14px;">Phone Number:</label>
                    <input type="text" placeholder="Phone Number" name="candidatePhone"/>
                    <label class="ms-2 mt-2 " style="font-size: 14px;">Birth:</label>
                    <div id="DOB">
                        <select  placeholder="Day" id="dob-day" name="day">
                            <option value="Day">Day</option>
                        </select>
                        <select  placeholder="Month" id="dob-month" name="month">
                            <option value="Month">Month</option>
                        </select>
                        <select  placeholder="Year" id="dob-year" name="year">
                            <option value="Year">Year</option>
                        </select>
                    </div>
                    <label class="ms-2 mt-2 " style="font-size: 14px;">CV:</label>
                    <input type="file" name="resume"/>
                    <label class="ms-2 mt-2 " style="font-size: 14px;">Image:</label>
                    <input type="file" name="image" />
                </div>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>welcome,</h1>
                    <p>Let's start your job search journey.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        var daySelect = document.getElementById("dob-day");
        var monthSelect = document.getElementById("dob-month");
        var yearSelect = document.getElementById("dob-year");
        for (var day = 1; day <= 31; day++) {
            var option = document.createElement("option");
            option.textContent = day;
            option.value = day;
            daySelect.appendChild(option);
        }

        for (var month = 1; month <= 12; month++) {
            var option = document.createElement("option");
            option.textContent = month;
            option.value = month;
            monthSelect.appendChild(option);
        }

        var currentYear = new Date().getFullYear();
        for (var year = currentYear; year >= currentYear - 100; year--) {
            var option = document.createElement("option");
            option.textContent = year;
            option.value = year;
            yearSelect.appendChild(option);
        }
    </script>
@endsection