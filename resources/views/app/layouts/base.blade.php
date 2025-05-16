<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>@yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        {{-- Toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
        @include('app.layouts._partials.topo')
    
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">@yield('titulo')</h1>
                        </div><!-- /.col -->
                        {{-- <div class="col-sm-6">
                            {{-- @include('layout._partials.breadcrumb') --} }
                        </div><!-- /.col --> --}}
                        
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
            </div><!-- /.content-header -->
    
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('conteudo')
                </div><!-- /.container-fluid -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    </body>
</html>

<script>
    $(document).ready(function() {
        toastr.options.timeOut = 15000;
        toastr.options.closeButton = true;
        @if(Session::has('error'))
          toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('warning'))
          toastr.warning('{{ Session::get('warning') }}');
        @elseif(Session::has('success'))
          toastr.success('{{ Session::get('success') }}');
        @endif
    });
  </script>
