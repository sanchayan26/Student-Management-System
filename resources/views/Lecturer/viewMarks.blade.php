
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        .coursebox {
            margin-bottom: 15px;
            border: 1px dotted #ddd;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            padding: 5px;
        }


        element.style {
        }
        .empty-region-side-pre.used-region-side-post #region-main {
            width: 100%;
        }
        #region-main {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ededed;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
            background-color: #FFF;
            border-color: #ededed;
        }

        <style>
         .dropbtn {
             background-color: #4CAF50;
             color: white;
             padding: 16px;
             font-size: 16px;
             border: none;
             cursor: pointer;
         }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        .btn {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Darker background on mouse-over */
        .btn:hover {
            background-color: RoyalBlue;
        }
    </style>



</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">

    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <!--                    <div class="flex-shrink-0 flex items-center">-->
                    <!--                        <a href="{{ route('dashboard') }}">-->
                    <!--                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />-->
                    <!--                        </a>-->
                    <!--                    </div>-->

                    <!-- Navigation Links -->
                    <!--                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">-->
                    <!--                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">-->
                    <!--                            {{ __('Dashboard') }}-->
                    <!--                        </x-nav-link>-->
                    <!--                    </div>-->

                </div>

                <!-- Settings Dropdown -->




                <div class="hidden sm:flex sm:items-center sm:ml-6">

                    <img src="{{url('/images/usjp.png')}}" alt="Image" style="height: 50px; position: absolute; left: 25px;"/>
                    <a class="nav-brand" style="position: absolute; left: 100px; font-size: 20px; color: #50c878;" href="/">Main Menu</a>
                    <a class="nav-brand" style="position: absolute; left: 250px; font-size: 20px; color: #50c878;" href="/lecturer">Home</a>


                    <h2 style="color: blue; position: absolute; left: 500px; font-size: 25px;">University MIS System</h2>



                    <x-dropdown align="right" width="48">


                        <x-slot name="trigger">

                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->Name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logoutAdmin') }}">
                                @csrf

                                <x-dropdown-link :href="route('logoutAdmin')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <!--            <div class="pt-2 pb-3 space-y-1">-->
            <!--                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">-->
            <!--                    {{ __('Dashboard') }}-->
            <!--                </x-responsive-nav-link>-->
            <!--            </div>-->

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>

                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->Name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logoutAdmin') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logoutAdmin')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Heading -->
    <header class="bg-white shadow">


        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" style="color: ">
            View Enrolled Marks
            <a href="{{ url()->previous() }}"  style="color: red; position: absolute; right: 20px;"> Back  </a>

        </div>


    </header>


    <!-- Page Content -->
    <main>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>



        <section>

        </section>

        <div class="py-4" >
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif



                    <div class=" p-6 bg-white border-b border-gray-200" style="font-size: 15px; color:blues;">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-10 col-sm-12 col-xs-12">
                                {{$marks->links()}}
                            </div>
                        </div>

                        @if((isset($marks)))

                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                            <tr>
                                <th>Registration Number</th>
                                <th>Subject Code</th>
                                <th>ESE </th>
                                <th>CA</th>
                                <th>Edit</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($marks as $mark)
                            <tr data-id="">
                                <td><span class="clearfix">{{$mark->RegistrationNumber}}</span> </td>
                                <td><span class="clearfix">{{$mark->SubjectCode}}</span> </td>
                                <td><span class="clearfix">{{$mark->ESE}}</span> </td>
                                <td><span class="clearfix">{{$mark->CA}}</span> </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars"></i>                                    </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ URL('lecturer/edit/'.$mark->id )}}"  >Edit</a>
                                            <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ URL('lecturer/delete/'.$mark->id )}}"  >Delete</a>
                                        </div>
                                    </div>

                                    <div class="btn-group" method="get">
                                        <ul class="dropdown-menu" role="menu">

                                        </ul></div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                        <h4>No Records to Show</h4>
                        @endif


                    </div>


                </div>
            </div>

        </div>

    </main>

</div>
</body>
<div style=" position: absolute; right: 600px;">
    You are logged in as

    <a href="" style="color: #50c878"> {{ Auth::user()->Name }}</a>

</div>

</html>


