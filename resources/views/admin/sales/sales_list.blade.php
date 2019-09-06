@extends('admin.base')

@section('content')
    <div class="content-wrapper">
    <div class="container">
        <h4><b>Sales</b></h4>
        <hr>
    </div>
    <div class="row">

        <div class="col-sm-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">Sales Entry</h5>
                </div>
                <div class="panel-body">
                    <form action="{{url('insert-designation')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="designation"><b>Find Of Product Barcode</b></label>
                            <input type="text" class="form-control" id="designation" name="designation"
                                   placeholder="Barcode">
                        </div>


                    </form>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Discount</th>
                            <th>Sub Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>fsfdffe</td>
                            <td>1</td>
                            <td>200</td>
                            <td>10</td>
                            <td>190</td>
                            <td>Delete</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="panel panel-default">

                <div class="panel-body">
                    <form>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="customar_name">Invoice No</label>
                                <input type="text" class="form-control" id="customar_name" placeholder="Customar Name"
                                       name="customar_name">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="customar_name">Date</label>
                                <input type="text" class="form-control" id="customar_name" placeholder="Customar Name"
                                       name="customar_name">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="customar_name">Customar Name</label>
                                <select name="customar_name" class="form-control">
                                    <option value="1">CASH</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="customar_name">Subtotal</label>
                                <input type="text" class="form-control" id="customar_name" placeholder="Customar Name"
                                       name="customar_name">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="customar_name"> Discount Type </label>
                                <label class="radio-inline"><input type="radio" name="optradio"
                                                                   checked>Percentage</label>
                                <label class="radio-inline"><input type="radio" name="optradio">Amount</label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="customar_name">Discount</label>
                                <input type="text" class="form-control" id="customar_name" placeholder="Customar Name"
                                       name="customar_name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="customar_name">Total Payable</label>
                                <input type="text" class="form-control" id="customar_name" placeholder="Customar Name"
                                       name="customar_name">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="customar_name">Paid Amount</label>
                                <input type="text" class="form-control" id="customar_name" placeholder="Customar Name"
                                       name="customar_name">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="customar_name">Return Amount</label>
                                <input type="text" class="form-control" id="customar_name" placeholder="Customar Name"
                                       name="customar_name">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="customar_name">Due Amount</label>
                                <input type="text" class="form-control" id="customar_name" placeholder="Customar Name"
                                       name="customar_name">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection