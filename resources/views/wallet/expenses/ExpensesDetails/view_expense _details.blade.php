@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title mt-2">Expenses Details List</h3>
                                <a href="{{ route('expense.add') }}" class="btn btn-round btn-success"
                                    style="float: right;">Add Expense</a>
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
                                                <th>Expense Amount</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($allData as $key => $expense)
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
                                                    <td>{{ $expense->description != null ? $expense->description : '-' }}</td>
                                                    <td>{{ $expense->created_at->format('d-m-Y') }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('expense.edit', $expense->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <a href="{{ route('expense.delete', $expense->id) }}"
                                                            id="delete" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
