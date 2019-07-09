<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Atithi Gandaki</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/gandaki.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/additional.css?v=1.0.0" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/nepali.datepicker.v2.2.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script src="{{ asset('argon') }}/js/nepali.datepicker.v2.2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    </body>
    @yield('chart')

    <script>
        $(document).ready(function () {
            $('.nepali-calendar').val(getNepaliDate());

            $('.nepali-calendar').nepaliDatePicker({
                npdMonth: true,
                npdYear: true,
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready( function () {

            function matchStart (term, text) {
                if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                    return true;
                }

                return false;
            }

            $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                $("#country_id").select2({
                    matcher: oldMatcher(matchStart)
                });
                $("#checkpoint_id").select2({
                    matcher: oldMatcher(matchStart)
                })
            });
        });

        $('input').on("keypress", function(e) {
            /* ENTER PRESSED*/
            if (e.keyCode == 13) {
                /* FOCUS ELEMENT */
                var inputs = $(this).parents("form").eq(0).find(":input");
                var idx = inputs.index(this);

                if (idx == inputs.length - 1) {
                    inputs[0].select()
                } else {
                    inputs[idx + 1].focus(); //  handles submit buttons
                    inputs[idx + 1].select();
                }
                return false;
            }
        });

        $("#edit").popover({ trigger: "hover" });

        /** Dropdowns **/
        $('.dropdown-toggle').click(function () {
            console.log($(this).attr('aria-expanded'));
            console.log(this);
            if ($(this).attr('aria-expanded') === "false") {
                var menuID = $(this).attr('id'),
                    parentScope = $(this).parent().parent();
                parentScope.find('ul').removeClass('open').attr('aria-expanded', false);
                parentScope.find('ul[aria-labelledby=' + menuID + ']').addClass('open')
                parentScope.find('button[aria-expanded=true]').attr('aria-expanded', false);
                $(this).attr('aria-expanded', true);
            } else {
                $(this).attr('aria-expanded', false);
                var menuID = $(this).attr('id');
                $(this).siblings().each(function () {
                    console.log($(this).siblings());
                    if ($(this).attr('aria-labelledby') == menuID) {
                        $(this).removeClass('open');
                    }
                });
            }
        });

    </script>
</html>