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
                        <h4 class="box-title">Add Income Details </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col">
                            <form method="POST" action="{{ route('income.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Income Category</h5>
                                            <div class="controls">
                                                <select name="category" required="" class="form-control">
                                                    <option value="" disabled selected>Select Income Category</option>
                                                    @foreach ($category as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Income Mode<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="mode" id="mode" required="" class="form-control">
                                                    <option value="" disabled selected>Select Income Mode</option>
                                                    <option value="Digital">Digital</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Account Type</h5>
                                            <div class="controls">
                                                <select name="account_id" required="" class="form-control" id="type">
                                                    <option value="" disabled selected>Select Account Type</option>
                                                    @foreach ($account_details as $account)
                                                        <option value="{{ $account->id }}">{{ $account->account_name }}  --  ({{ $account->account_number }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Amount<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="number" name="amount" class="form-control">
                                                @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mode').on('change', function() {
                var val = $(this).val();
                if (val === "Cash") {
                    $('#name').attr('disabled', 'disabled');
                    $('#number').attr('disabled', 'disabled');
                    $('#type').attr('disabled', 'disabled');
                } else {

                }
            });
        });
    </script>
@endsection
