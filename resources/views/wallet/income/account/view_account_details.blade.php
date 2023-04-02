@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title mt-2">Account Details List</h3>
                                <a href="{{ route('account.details.add') }}" class="btn btn-round btn-success"
                                    style="float: right;">Add Account</a>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">#</th>
                                                <th>Account Name</th>
                                                <th>Account Number</th>
                                                <th>Account Type</th>
                                                <th>Status</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $account)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $account->account_name }}</td>
                                                    <td>{{ $account->account_number }}</td>
                                                    <td>{{ $account->type }}</td>
                                                    <td>{{ $account->status }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('account.details.edit', $account->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <a href="{{ route('account.details.delete', $account->id) }}"
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
