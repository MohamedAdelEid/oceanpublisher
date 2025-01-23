
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ env('APP_NAME') }}</title>
    
    <link rel="shortcut icon" href="{{ asset('panel/images/favicon.png') }}" />
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('panel/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('panel/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"> --}}
    <!-- endinject -->
    
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('panel/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/vendors/datatables.net-bs4/buttons.dataTables.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('panel/js/select.dataTables.min.css') }}"> --}}
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('panel/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->

    <style>
        .required:after {
            content: "*";
            position: relative;
            font-size: inherit;
            color: #F1416C;
            padding-right: 0.25rem;
            font-weight: bold;
        }
        .dataTables_wrapper .dataTable .btn{
            padding: 0.5rem 1rem !important;
        }
        .custom-select, .dataTables_filter input{
            height: 30px !important;
        }
        .datepicker.datepicker-dropdown, .datepicker.datepicker-inline {
            width: 350px !important;   
        }
        
    </style>

</head>
<body>