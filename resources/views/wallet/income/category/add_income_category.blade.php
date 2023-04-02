@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Income Category </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col">
                            <form method="POST" action="{{ route('income.category.store') }}">
                                @csrf

                                <div class="form-group">
                                    <h5>Income Category Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="IncomeCategory" class="form-control">
                                        @error('IncomeCategory')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
