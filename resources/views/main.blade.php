<!DOCTYPE html>
<html lang="en" ng-app="app">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Test Project Webt</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('public/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ url('public/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ url('public/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('public/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('public/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">



    <!-- Include Date Range Picker -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css" />
</head>

<body ng-controller="MainController">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Test Project Webt</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right" style="padding: 8px;">
            <li>Date:</li>
            <li>
                <input type="text" name="date" class="form-control">
            </li>

        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="/"><i class="fa fa-dashboard fa-fw"></i> Currencies</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Currencies</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>r030</th>
                                <th>txt</th>
                                <th>rate</th>
                                <th>cc</th>
                                <th>exchangedate</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->



    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{ url('public/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ url('public/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ url('public/vendor/metisMenu/metisMenu.min.js') }}"></script>

<!-- DataTables JavaScript -->
<script src="{{ url('public/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('public/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('public/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ url('public/dist/js/sb-admin-2.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.js"></script>
<script src="{{ url('public/js/main.js') }}"></script>

<script>


    getDateFromUrl();



    function getDateFromUrl() {
        if(parseGetParams().date)
            var date = new Date(parseGetParams().date);
        else
            var date = new Date();

        var f_date = (date.getMonth() + 1) + '/' + date.getDate()  + '/' +  date.getFullYear();
        $('input[name="date"]').val(f_date);
    }
    function parseGetParams() {
        var $_GET = {};
        var __GET = window.location.search.substring(1).split("&");
        for(var i=0; i<__GET.length; i++) {
            var getVar = __GET[i].split("=");
            $_GET[getVar[0]] = typeof(getVar[1])=="undefined" ? "" : getVar[1];
        }
        return $_GET;
    }
</script>

</body>

</html>
