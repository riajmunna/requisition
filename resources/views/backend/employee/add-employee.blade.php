@extends('backend.admin.master')

@section('title')
    Employee | Info
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mt-2 offset-md-2">
                <div class="mt-4">
                    @include('backend.admin.include.alert')
                </div>
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

                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>

                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Department</label>
                                        <select class="form-control" name="department" id="">
                                            <option value="none">Select</option>
                                            @foreach($department as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Designation</label>
                                        <select class="form-control" name="designation" id="">
                                            <option value="none">Select</option>
                                            @foreach($designation as $designation)
                                                <option value="{{$designation->id}}">{{$designation->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
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
                                        <select class="form-control" name="gender">
                                            <option value="none" selected> Select</option>
                                            <option value="male"> Male</option>
                                            <option value="female"> Female</option>
                                            <option value="other"> Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Blood Group </label>
                                        <select class="form-control" name="blood">
                                            <option value="none" selected> Select</option>
                                            <option value="A+"> A+</option>
                                            <option value="A-"> A-</option>
                                            <option value="B+"> B+</option>
                                            <option value="B-"> B-</option>
                                            <option value="O+"> O+</option>
                                            <option value="O-"> O-</option>
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
                                {{--                                <div class="d-grid">--}}
                                <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                {{--                                </div>--}}
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
