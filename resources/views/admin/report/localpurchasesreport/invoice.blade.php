@extends('admin.base')

@section('content')
    <div class="content-wrapper">
    <div class="page-content fade-in-up">
        <div class="ibox invoice">
            <div class="invoice-header" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-12 text-center" style="font-size: 17px;">

                        <div class="m-b-5 font-bold">Creative Software</div>
                        <h6>Address: Mohammadpur Dhaka 1216</h6>
                        <h6>Mobile: 01475896421</h6>
                        @foreach ($userinfos as $userinfo)
                            <span class="font-strong">Email:</span>{{$userinfo->email}}</li>
                        @endforeach
                        <hr>
                    </div>
                    <div class="col-6">
                        @foreach ($supplairinfos as $supplairinfo)
                            <h6>
                                <toppadding><strong>Invoice Date:</strong>&nbsp;{{$supplairinfo->purchase_date}}
                                </toppadding>
                                <br><strong>Invoice No:</strong>&nbsp;{{$supplairinfo->purchase_no}}</h6>
                            @break
                        @endforeach
                    </div>
                    <div class="col-6 text-right">
                        <div>
                            <div class="m-b-5 font-bold">Invoice To</div>
                            @foreach ($supplayers as $supplayer)
                                <div>{{$supplayer->supplier_name}}</div>
                                <ul class="list-unstyled m-t-10">
                                    <li class="m-b-5">{{$supplayer->supplier_address}}</li>
                                    <li class="m-b-5">{{$supplayer->supplier_mobile}}</li>
                                    <li>{{$supplayer->supplier_email}}</li>
                                </ul>
                                @break
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped no-margin table-invoice">
                <thead>
                <tr>
                    <th>Item Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th class="text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($supplairinfos as $supplairinfo)
                    <tr>
                        <td>
                            <div><strong>Flat Design</strong></div>
                            <small>{{$supplairinfo->description}}</small>
                        </td>
                        <td>{{$supplairinfo->quantity}}</td>
                        <td>{{$supplairinfo->sale_price}}</td>
                        <td>{{$supplairinfo->cost}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table no-border">
                <thead>
                <tr>
                    <th></th>
                    <th width="15%"></th>
                </tr>
                </thead>
                <tbody>
                <tr class="text-right">
                    <td class="font-bold font-18">TOTAL:</td>
                    @foreach ($supplairinfos as $supplairinfo)
                        <td class="font-bold font-18">{{$supplairinfo->cost}}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
            <div class="text-right">
                <button class="btn btn-info" type="button" style="margin-bottom: 50px;" onClick="window.print()"><i
                            class="fa fa-print"></i> Print
                </button>
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">

                <div class=" col-md-12"><b>Printing Date &
                        Time:</b>&nbsp;&nbsp;<?php date_default_timezone_set("Asia/Dhaka"); echo date('d-m-Y h:i:s A');?>
                    &nbsp; <span style="margin-left: 49%;">Develop by &nbsp;<b><a
                                    href="https://www.creativesoftware.com.bd" target="_blank">Creative Software</a></b></span>
                </div>

            </footer>
        </div>
    </div>
        <style>
            .invoice {
                padding: 20px
            }

            .invoice-header {
                margin-bottom: 50px
            }

            .invoice-logo {
                margin-bottom: 50px;
            }

            .table-invoice tr td:last-child {
                text-align: right;
            }
        </style>
    </div>
    <script lang='javascript'>
        $(document).ready(function () {
            $('#printPage').click(function () {
                var data = '<input type="button" value="Print this page" onClick="window.print()">';
                data += '<div id="div_print">';
                data += $('.page-content').html();
                data += '</div>';

                myWindow = window.open('', '', 'width=200,height=100');
                myWindow.innerWidth = screen.width;
                myWindow.innerHeight = screen.height;
                myWindow.screenX = 0;
                myWindow.screenY = 0;
                myWindow.document.write(data);
                myWindow.focus();
            });

        });
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection
