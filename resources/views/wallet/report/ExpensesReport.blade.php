@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Expense Report</h4>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('expense.report') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5>Income Mode</h5>
                                            <div class="controls">
                                                <select name="mode" id="mode" class="form-control">
                                                    <option value="" disabled selected>Select Income Mode</option>
                                                    <option value="Digital" {{ $mode == 'Digital' ? 'selected' : '' }}>
                                                        Digital</option>
                                                    <option value="Cash" {{ $mode == 'Cash' ? 'selected' : '' }}>
                                                        Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>From Date <span class="text-danger">*</span> </h5>
                                            <div class="controls">
                                                <input type="date" name="from" class="form-control" required
                                                    value="{{ $from }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>To Date <span class="text-danger">*</span> </h5>
                                            <div class="controls">
                                                <input type="date" name="to" class="form-control" required
                                                    value="{{ $to }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-between" style="padding-top: 25px;">
                                        <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Filter"></input>
                                        <input type="submit" class="btn btn-rounded btn-dark mb-5" value="PDF"
                                            name="pdf"></input>
                                        <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Mail"
                                            name="mail"></input>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- table --}}
                @if (count($data) > 0)
                    <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title mt-2"></h3>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="5%">#</th>
                                                    <th>Payment Mode</th>
                                                    <th>Category</th>
                                                    <th>Account</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $expense)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $expense->mode }}</td>
                                                        <td>{{ $expense['category_details']['name'] }}</td>

                                                        @if ($expense['account_details'] != null)
                                                            <td>{{ $expense['account_details']['account_name'] }} --
                                                                ({{ $expense['account_details']['account_number'] }})
                                                            </td>
                                                        @else
                                                            <td>-</td>
                                                        @endif
                                                        <td>{{ $expense->amount }}</td>
                                                        <td>{{ $expense->created_at->format('d-m-Y') }}</td>
                                                        <td>{{ $expense->description }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- <h3 class="text-center">Data Not Found</h3> --}}
                @endif

            </section>
        </div>
    </div>
@endsection
