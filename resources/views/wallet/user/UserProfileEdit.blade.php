@extends('admin.admin_master')
@section('admin')
    //Jquery CDN link
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Manage Profile</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required=""
                                                data-validation-required-message="This field is required"
                                                value="{{ $editData->name }}">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>User Email<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required=""
                                                    data-validation-required-message="This field is required"
                                                    value="{{ $editData->email }}">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Mobile<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" class="form-control" required=""
                                                data-validation-required-message="This field is required"
                                                value="{{ $editData->mobile }}">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>User Address<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control" required=""
                                                    data-validation-required-message="This field is required"
                                                    value="{{ $editData->address }}">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>User Gender<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="gender" id="select" required=""
                                                        class="form-control">
                                                        <option value="" disabled selected>Select Gender</option>
                                                        <option value="Male"
                                                            {{ $editData->gender == 'Male' ? 'Selected' : '' }}>Male
                                                        </option>
                                                        <option value="Female"
                                                            {{ $editData->gender == 'Female' ? 'Selected' : '' }}>Female
                                                        </option>
                                                    </select>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <h5>Profile Image<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" class="form-control"
                                                            id="image">
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <div class="controls">
                                                            <img id="showImage"
                                                                src="{{ !empty($user->image) ? url('upload/user_images/' . $user->image) : url('upload/no_image.jpg') }}"
                                                                style="width
                                                            100px; width:100px; border:1px solid #000000;"
                                                                alt="Profile Image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
