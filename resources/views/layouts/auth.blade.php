<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Meta tags --}}
    <meta name="keywords"
        content="JobJourney, jobs in Egypt, job board, careers, employment, find jobs, apply for jobs, top employers, career opportunities">
    <meta property="og:title" content="JobJourney - Your Premier Job Search Platform in Egypt">
    <meta property="og:description"
        content="Find your dream job on JobJourney, Egypt's leading job board. Search for jobs in various industries, apply online, and connect with top employers. Start your career journey with us today.">
    <meta property="og:image" content="{{ asset('images/work-in-progress.png') }}">
    <meta property="og:type" content="website">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/work-in-progress.png') }}" type="image/x-icon">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <title>JobJourney - Your Job Search Platform</title>
</head>


<body>

    {{-- main --}}
    @yield('main')

    <script>
        const signUpButton = document.getElementById('signUp')
        const signInButton = document.getElementById('signIn')
        const container = document.getElementById('container')

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active")
        })

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active")
        })

        function handleRoleChange() {
            const name = document.getElementById('nameInput').value.trim();
            const email = document.getElementById('emailInput').value.trim();
            const password = document.getElementById('password').value.trim();
            const role = document.getElementById('roleSelect').value;
            const error = document.getElementById('error');

            if (!name || !email || !password || !role) {
                error.style.display = 'block';
                error.innerHTML = 'you must add all data';
                return;
            } else {
                error.style.display = 'none';
            }
            document.getElementById('basicFields').style.display = 'none';
            if (role === 'candidate') {
                document.getElementById('candidateFields').style.display = 'block';
            } else if (role === 'employer') {
                document.getElementById('employerFields').style.display = 'block';
            }
        }
        function showBasicFields() {
        document.getElementById('candidateFields').style.display = 'none';
        document.getElementById('employerFields').style.display = 'none';
        document.getElementById('basicFields').style.display = 'block';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
