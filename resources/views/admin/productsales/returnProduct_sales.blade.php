@extends('admin.base')

@section('content')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <div class="content-wrapper">
        <div style="padding: 10px; height: 100%;" class="card">
            <h4 style="text-align: center;"><u>Return Purchase</u></h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-7">
                                <div style="padding: 10px; height: 100%;" class="card">
                                    <form action="{{ route('productsaleReturn') }}" method="get">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <select class="selectpicker form-control cName" data-live-search="true"
                                                        data-style="btn-primary"
                                                        name="returnCustomerName">
                                                    <option value="null">Select Customer Name</option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->customer_name }}">{{ $customer->customer_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <select class="form-control cInvoice" name="returnInvoiceNumber"
                                                        data-style="btn-success">
                                                    <option value="{{$invoice}}">{{$invoice}}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" class="form-control btn btn-success load"
                                                       value="load">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Total Payable</label>
                                                <input type="text" class="form-control tPayable"
                                                       value="@foreach($invoiceInfos as $invoiceInfo){{$invoiceInfo->saleInvoice_totalPayable}}@endforeach"
                                                       readonly/>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Discount ()</label>
                                                <input type="text" class="form-control disCount"
                                                       value="@foreach($invoiceInfos as $invoiceInfo){{$invoiceInfo->saleInvoice_discountAmount}}@endforeach"
                                                       readonly/>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Paid Amount</label>
                                                <input type="text" class="form-control paidAmount"
                                                       value="@foreach($invoiceInfos as $invoiceInfo){{$invoiceInfo->saleInvoice_paidAmount}}@endforeach"
                                                       readonly/>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered getInvoice">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">SL.</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1 ?>
                                                    @foreach($invoiceItems as $invoiceItem)
                                                        <tr style="text-align: center;" class="bg-grey-50">
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{$invoiceItem->saleItem_description}}</td>
                                                            <td>{{$invoiceItem->saleItem_quantity}}</td>
                                                            <td>{{$invoiceItem->saleItem_total}}</td>
                                                            <td>
                                                                <button data-toggle="modal" data-target="#exampleModal"
                                                                        class="btn btn-warning editItem"
                                                                        value="{{$invoiceItem->saleItem_id}}"><i
                                                                            class="fa fa-plus-circle"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>

                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">SL.</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cartItems as $cartItem)
                                                    <tr class="bg-grey-50">
                                                        <td>1</td>
                                                        <td>{{$cartItem->name}}</td>
                                                        <td>{{$cartItem->qty}}</td>
                                                        <td>{{$cartItem->price}}</td>
                                                    </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{ route('confirmSalesReturn') }}" method="post">
                                                    {{ csrf_field() }}
                                                <input type="submit" value="Confirm" class="btn btn-primary confirm"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="updateReturn">
                    {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="hidden" class="form-control invoice" name="invoice"/>
                            <input type="hidden" class="form-control id" name="id"/>
                            <input type="text" class="form-control description" name="description"/>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control quantity" name="quantity"/>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control  price" name="price"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>
    <script>
        $(document).ready(function () {
            //------------------------------Get Customer wise invoice number----------------------------
            $('.cName').on('change', function () {
                var name = $(this).val();
                if (name) {
                    $.ajax({
                        url: '{{ route('FilterCustomerInvoice') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {name: name},
                        success: function (data) {
                            $('select[name="returnInvoiceNumber"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="returnInvoiceNumber"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="returnInvoiceNumber"]').val("Select Invoice Number");
                }
            });

            //--------------------------------get invoice information -------------------------------------------
            {{--$('.load').on('click', function () {--}}
                {{--$('.getInvoice tbody').empty();--}}
                {{--var invoiceNo = $('.cInvoice').val();--}}
                {{--$.ajax({--}}
                    {{--url: '{{ route('getInvoiceInfo') }}',--}}
                    {{--type: 'GET',--}}
                    {{--data: {invoiceNo: invoiceNo},--}}
                    {{--success: function (data) {--}}
                        {{--$('.tPayable').val(data['invoice'][0]['saleInvoice_totalPayable']);--}}
                        {{--$('.disCount').val(data['invoice'][0]['saleInvoice_discountAmount']);--}}
                        {{--$('.paidAmount').val(data['invoice'][0]['saleInvoice_paidAmount']);--}}

                        {{--$('.getInvoice tbody').append(data['item']);--}}
                    {{--}--}}
                {{--})--}}
            {{--});--}}

            $('.editItem').on('click', function () {
                var id = $(this).val();
                var invoice = $('.cInvoice').val();
                $.ajax({
                    url: '{{ route('getEditData') }}',
                    type: 'GET',
                    data: {id: id,invoice:invoice},
                    success: function (data) {
                        $('.invoice').val(data[0]['saleInvoice_no']);
                        $('.id').val(data[0]['saleItem_id']);
                        $('.description').val(data[0]['saleItem_description']);
                        $('.quantity').val(data[0]['saleItem_quantity']);
                        $('.price').val(data[0]['saleItem_total']);
                    }
                });
            });

            $('.updateReturn').on('submit',function (e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{{route('updateReturn')}}",
                    data: $('.updateReturn').serialize(),
                    success: function (data) {
                        console.log(data);
                        $('#exampleModalCenter').modal('hide');
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Data Not Saved');
                    }
                });
            });
            // Confirm Sales Return..............................

            {{--$('.confirm').on('click',function () {--}}
                {{--$.ajax({--}}
                   {{--url:'{{ route('confirmSalesReturn') }}',--}}
                    {{--type:'POST',--}}
                    {{--data:{},--}}
                    {{--success:function () {--}}
                        {{--alert("Sales Return Complete");--}}
                        {{--location.reload();--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}



        });
    </script>
@endsection