<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>University MIS system</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
            }

            html {
                box-sizing: border-box;
            }

            *, *:before, *:after {
                box-sizing: inherit;
            }

            .column {
                float: left;
                width: 33.3%;
                margin-bottom: 16px;
                padding: 0 8px;
            }

            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                margin: 8px;
            }

            .about-section {
                padding: 50px;
                text-align: center;
                background-color: #474e5d;
                color: white;
            }

            .container {
                padding: 0 16px;
            }

            .container::after, .row::after {
                content: "";
                clear: both;
                display: table;
            }

            .title {
                color: grey;
            }

            .button {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
            }

            .button:hover {
                background-color: #555;
            }

            @media screen and (max-width: 650px) {
                .column {
                    width: 100%;
                    display: block;
                }
            }
        </style>


    </head>
    <body class="antialiased" style="background-color: ;">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
<!--            @if (Route::has('login'))-->
<!--                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">-->
<!--                    @auth-->
<!--                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>-->
<!--                    @else-->
<!--                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>-->
<!---->
<!--                        @if (Route::has('register'))-->
<!--                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>-->
<!--                        @endif-->
<!--                    @endauth-->
<!--                </div>-->
<!--            @endif-->
            <div class="banner-text">
                <h1 style="text-align: center; color: #50c878; margin-top: 50px;">University MIS System</h1>
                <div></div>
                <h2 style="text-align: center; color: black;"> Welcome to Online Management System</h2>
            </div>

            <div style="margin-top: 80px; font-size: 20px;" class="container">
                <div class="row" >
                    <div class="col-sm">
                        <a href="/login/student" style="text-decoration: none; color: #50c878;">Student Login</a>
                    </div>
                    <div class="col-sm">
                        <a href="/login/lecturer" style="text-decoration: none; color: #50c878;">Lecturer Login</a>
                    </div>
                    <div class="col-sm">
                        <a href="/login/admin" style="text-decoration: none; color: #50c878;"> Admin Login</a>
                    </div>
                </div>
            </div>
            <section id="banner">
                <p style="text-align: center"> if you dont have username password details cotact admin</p>

            </section>
        </div>
        <div class="about-section">
            <h1>About Project</h1>
            <p>This system implemented For Advance database Mini Project </p>
        </div>

    </body>
    <footer>&copy; Copyright 2021 HTML.am</footer>

</html>
