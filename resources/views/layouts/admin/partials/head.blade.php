<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="description" content="@yield('meta_description', config('property.name').' Admin Panel')" />
<meta name="author" content="{{ config('app.name', 'Admin') }}" />

<title>@yield('title', 'Dashboard') — {{ config('app.name', 'Admin') }}</title>

<link rel="icon" href="{{ asset('assets/admin/images/favicon.png') }}" type="image/x-icon" />
<link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}" type="image/x-icon" />

<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/fontawesome.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/icofont.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/themify.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/flag-icon.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/feather-icon.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/slick-theme.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/scrollbar.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/animate.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/jquery.dataTables.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/select.bootstrap5.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/responsive.css') }}" />

@vite(['resources/css/admin/admin.css', 'resources/js/admin/admin.js'])

@stack('styles')
