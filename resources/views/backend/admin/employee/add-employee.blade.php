@extends('backend.admin.master')

@section('title')
    Employee | Info
@endsection

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="text-center">Employee Info</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('save.employee')}}" method="post">
                            @csrf
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Department</label>
                                        <input type="text" class="form-control" name="department" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Designation</label>
                                        <input type="text" class="form-control" name="designation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Balance</label>
                                        <input type="text" class="form-control" name="balance" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Gender </label>
                                        <select name="gender">
                                            <option value="none" selected> Select</option>
                                            <option value="male"> Male</option>
                                            <option value="female"> Female</option>
                                            <option value="other"> Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Blood Group </label>
                                        <select name="blood">
                                            <option value="none" selected> Select Blood Group</option>
                                            <option value="1"> A+</option>
                                            <option value="1"> A-</option>
                                            <option value="1"> B+</option>
                                            <option value="1"> B-</option>
                                            <option value="1"> O+</option>
                                            <option value="1"> O-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Present Address</label>
                                        <textarea class="form-control" name="present_address" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Permanent Address</label>
                                        <textarea class="form-control" name="permanent_address" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-sm">ADD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
