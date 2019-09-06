<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Creative POS || Creative Software</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('public/admin/')}}/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="{{asset('public/admin/')}}/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="{{asset('public/admin/')}}/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet"/>
    <!-- PLUGINS STYLES-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="{{asset('public/admin/')}}/assets/vendors/DataTables/datatables.min.css" rel="stylesheet"/>
    <link href="{{asset('public/admin/')}}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
    <link href="{{asset('public/admin/css/bercodeform.css')}}" rel="stylesheet"/>
    <!-- THEME STYLES-->
    <link href="{{asset('public/admin/')}}/assets/css/main.min.css" rel="stylesheet"/>
    <link href="{{asset('public/admin/')}}/assets/css/mystyle.css" rel="stylesheet"/>

    <!-- PAGE LEVEL STYLES-->

    <!-- CORE PLUGINS-->
    <script src="{{asset('public/admin/')}}/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="{{asset('public/admin/')}}/assets/vendors/popper.js/dist/umd/popper.min.js"
            type="text/javascript"></script>
    <script src="{{asset('public/admin/')}}/assets/vendors/bootstrap/dist/js/bootstrap.min.js"
            type="text/javascript"></script>
    <script src="{{asset('public/admin/')}}/assets/vendors/metisMenu/dist/metisMenu.min.js"
            type="text/javascript"></script>
    <script src="{{asset('public/admin/')}}/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"
            type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- PAGE LEVEL PLUGINS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('public/admin/')}}/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="{{asset('public/admin/')}}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js"
            type="text/javascript"></script>
    <script src="{{asset('public/admin/')}}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"
            type="text/javascript"></script>
    <script src="{{asset('public/admin/')}}/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js"
            type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset('public/admin/')}}/assets/vendors/DataTables/datatables.min.js"
            type="text/javascript"></script>
    <script src="{{asset('public/admin/')}}/assets/js/app.min.js" type="text/javascript"></script>
</head>
<style>
    .table-invoice tr td:last-child {
        text-align: right;
    }
    @media print {
        .header {
            display: none;
        }

        .page-sidebar {
            display: none;
        }

        .content-wrapper {
            margin: 0px;
            padding: 0px;
        }
    }
</style>
<body onload="window.print();window.history.back()">
<div class="content-wrapper">
    <div class="page-content fade-in-up">
        <div class="ibox invoice">
            <div class="invoice-header">
                <div class="row">
                    <div class="col-12 text-center" style="font-size: 17px;">
                        @foreach($companys as $company)
                        <div class="m-b-5 font-bold">{{ $company->company_name }}</div>
                        <h6>Address: {{ $company->company_address }}</h6>
                        <h6>Mobile: {{ $company->company_mobile }}</h6>
                        <span class="font-strong">Email: {{ $company->company_email }}</span></li>
                        @endforeach
                        <hr>
                            <div style="margin-bottom: 0px;padding-bottom: 0px;" class="font-bold"><h3><u>Date Wise Sales Reports</u></h3></div>
                    </div>
                </div>
            </div>
            <table class="table table-striped no-margin table-invoice">
                <thead>
                <tr>
                    <th>SL.</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Invoice No</th>
                    <th>Sub Total</th>
                    <th>Discount</th>
                    <th>Total Payable</th>

                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($invoiceByDates as $invoiceByDate)
                <tr style="text-align: center;">
                    <td>{{ $i++ }}</td>
                    <td>{{ $invoiceByDate->saleInvoice_date }}</td>
                    <td>{{ $invoiceByDate->saleInvoice_customerName }}</td>
                    <td>{{ $invoiceByDate->saleInvoice_no }}</td>
                    <td>{{ $invoiceByDate->saleInvoice_subTotal }}</td>
                    <td>{{ $invoiceByDate->saleInvoice_discountAmount }}</td>
                    <td style="text-align: center;">{{ $invoiceByDate->saleInvoice_totalPayable }}</td>
                </tr>
                @endforeach
                <tr style="text-align: center;">
                    <td style="text-align: right;" colspan="4">Total: </td>
                    <td style="text-align: center;"><strong>{{ $subtotalSum }}</strong></td>
                    <td style="text-align: center;"><strong>{{ $discountSum }}</strong></td>
                    <td style="text-align: center;"><strong>{{ $totalPayableSum }}</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer class="page-footer">
    <div style="width: 100%;" class="row">
        <div style="width: 50%; text-align: left" class="col-md-6">
            <b>Printing Date & Time: </b>&nbsp;&nbsp;<?php date_default_timezone_set("Asia/Dhaka"); echo date('d-m-Y h:i:s A');?>
        </div>
        <div style="width: 50%; text-align: right;" class="col-md-6">
            Develop by &nbsp;<b><a href="https://www.creativesoftware.com.bd" target="_blank">Creative Software</a></b>
        </div>
    </div>
</footer>
</body>
</html>