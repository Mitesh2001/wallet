@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body d-flex justify-content-between">
                                <div class="icon bg-primary-light rounded w-60 h-60">
                                    <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                                </div>
                                <div>
                                    <p class="text-mute  mb-0 font-size-16">Total Cash</p>
                                    <h3 class="text-white mb-0 font-weight-500">0</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body d-flex justify-content-between">
                                <div class="icon bg-warning-light rounded w-60 h-60">
                                    <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                                </div>
                                <div>
                                    <p class="text-mute  mb-0 font-size-16">Sold Cars</p>
                                    <h3 class="text-white mb-0 font-weight-500">3400 </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body d-flex justify-content-between">
                                <div class="icon bg-info-light rounded w-60 h-60">
                                    <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                                </div>
                                <div>
                                    <p class="text-mute  mb-0 font-size-16">Sales Lost</p>
                                    <h3 class="text-white mb-0 font-weight-500">$1,250 </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body d-flex justify-content-between">
                                <div class="icon bg-danger-light rounded w-60 h-60">
                                    <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                                </div>
                                <div>
                                    <p class="text-mute  mb-0 font-size-16">Inbound Call</p>
                                    <h3 class="text-white mb-0 font-weight-500">1,460</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Income</h4>
                                <div class="box-controls pull-right">
                                    <div class="lookup lookup-circle lookup-right">
                                        <input type="text" name="s">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Mode</th>
                                                <th>User</th>
                                                <th>Date</th>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)">Order #123456</a></td>
                                                <td>Lorem Ipsum</td>
                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16,
                                                        2017</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>


                    <div class="col-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Expenses</h4>
                                <div class="box-controls pull-right">
                                    <div class="lookup lookup-circle lookup-right">
                                        <input type="text" name="s">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Mode</th>
                                                <th>User</th>
                                                <th>Date</th>
                                            </tr>
                                            <tr>
                                                <td><a href="javascript:void(0)">Order #123456</a></td>
                                                <td>Lorem Ipsum</td>
                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16,
                                                        2017</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                @foreach ($totalIncomeByAccount as $income)
                    {{ 'Account ID: ' . $income->account_id . ' | Total Income: ' . $income->total_income }}<br>
                @endforeach
                <br>
                <br>
                <h1>Income</h1>
                @foreach ($paymentModeTotals as $paymentMode => $totalAmount)
                    {{ "Payment mode: $paymentMode, Total amount: $totalAmount\n" }}<br>
                @endforeach

                <br>
                <h1>Expenses</h1>
                @foreach ($paymentModeTotals1 as $paymentMode1 => $totalAmount1)
                    {{ "Payment mode: $paymentMode1, Total amount: $totalAmount1\n" }}<br>
                @endforeach
                <br>

                {{ "Total Digital:  $Digital" }}<br>
                {{ "Total Cash:  $cash" }}
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection('admin')
