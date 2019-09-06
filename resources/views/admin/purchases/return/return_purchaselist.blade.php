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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="selectpicker form-control cName" data-live-search="true"
                                                    data-style="btn-primary"
                                                    name="returnCustomerName">
                                                <option value="null">Select Customer Name</option>
                                                @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->supplier_id }}">{{ $supplier->supplier_name }}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control cInvoice" name="returnInvoiceNumber">
                                                <option value="">Select Invoice Number</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Total Payable</label>
                                                <input type="text" class="form-control" readonly/>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Discount ()</label>
                                                <input type="text" class="form-control" readonly/>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Paid Amount</label>
                                                <input type="text" class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <hr>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered">
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
                                                    <tr style="text-align: center;" class="bg-grey-50">
                                                        <td>1</td>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                        <td><a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a> </td>
                                                    </tr>
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

                                </div>
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
                                                <tr class="bg-grey-50">
                                                    <td>1</td>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>
    <script>
        $(document).ready(function () {
           $('.cName').on('change',function () {
              var id = $(this).val();
              $.ajax({
                 url:'{{ route('customerInvoice') }}',
                  type:'GET',
                  data:{id:id},
                  success:function (data) {

                      $.each(data, function() {
                          $('select[name="returnInvoiceNumber"]').append('<option value="">'+ data +'</option>');
                      });
                  }
              });
           });
        });
    </script>
@endsection