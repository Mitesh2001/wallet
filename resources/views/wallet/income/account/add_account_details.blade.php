@extends('admin.admin_master')
@section('admin')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Account Details </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col">
                            <form method="POST" action="{{ route('account.details.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Account Name</h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" id="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Account Number</h5>
                                            <div class="controls">
                                                <input type="text" name="number" class="form-control" id="number">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Account Type</h5>
                                            <div class="controls">
                                                <select name="type" required="" class="form-control" id="type">
                                                    <option value="" disabled selected>Select Account Type</option>
                                                    <option value="Saving Account">Saving Account</option>
                                                    <option value="Current Account">Current Account</option>
                                                    <option value="Salary Account">Salary Account</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Submit">
                                </div>
                        </div>
                        </form>

                    </div>
                </div>
                <!-- /.box-body -->
        </div>
        <!-- /.box -->

        </section>
    </div>
    </div>

    
@endsection
