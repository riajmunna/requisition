@extends('backend.admin.master')

@section('title')
    Employee | Edit Info
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
                        <form action="{{route('update.employee')}}" method="post">
                            @csrf
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="employee_id"
                                               value="{{ $employees->id }}">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $employees->name }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $employees->phone }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Department</label>
                                        <input type="text" class="form-control" name="department" value="{{ $employees->department }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Designation</label>
                                        <input type="text" class="form-control" name="designation" value="{{ $employees->designation }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Balance</label>
                                        <input type="text" class="form-control" name="balance" value="{{ $employees->balance }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" value="{{ $employees->dob }}" required>
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
                                        <textarea class="form-control" name="present_address" required>{{ $employees->present_address }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Permanent Address</label>
                                        <textarea class="form-control" name="permanent_address" required>{{ $employees->permanent_address }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 mt-3">--}}
{{--                <div class="card mt-3">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="text-center">Customer Info</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{route('update.employee')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="mb-3">--}}
{{--                                <input type="hidden" name="customer_id"--}}
{{--                                       value="{{ $employees->id }}">--}}
{{--                                <label class="form-label">Full Name</label>--}}
{{--                                <input type="text" class="form-control" name="name" value="{{ $employees->name }}"--}}
{{--                                       required>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Phone Number</label>--}}
{{--                                <input type="text" class="form-control" name="phone" value="{{ $employees->phone }}"--}}
{{--                                       required>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Department</label>--}}
{{--                                <input type="text" class="form-control" name="department"--}}
{{--                                       value="{{ $employees->department }}"--}}
{{--                                       required>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Designation</label>--}}
{{--                                <input type="text" class="form-control" name="designation"--}}
{{--                                       value="{{ $employees->designation }}"--}}
{{--                                       required>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Balance</label>--}}
{{--                                <input type="text" class="form-control" name="balance" value="{{ $employees->balance }}"--}}
{{--                                       required>--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Date of Birth</label>--}}
{{--                                <input type="date" class="form-control" name="dob" value="{{ $employees->dob }}"--}}
{{--                                       required>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="form-label">Present Address</label>--}}
{{--                                        <textarea class="form-control" name="present_address"--}}
{{--                                                  required>{{ $employees->present_address }}</textarea>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="form-label">Permanent Address</label>--}}
{{--                                        <textarea class="form-control" name="permanent_address"--}}
{{--                                                  required>{{ $employees->permanent_address }}</textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <div class="d-grid">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
