@extends('backend.admin.master')

@section('title')
    Summary Report
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="mt-4">
                    @include('backend.admin.include.alert')
                </div>
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header">
                        <h5 class="text-left font-weight-light m-4">Advance Report</h5>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <input class="form-control" name="date" type="date">
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control" name="date" type="date">
                                </div>

                                <div class="col-md-3">
                                    <select class="form-control" name="employee_name" id="">
                                        <option value="">All Employees</option>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select class="form-control" name="employee_name" id="">
                                        <option value="">All Departments</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>

                            </div>

                        </form>

                        <div class="row mt-5 mb-4">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Advance(BDT)</h5>
                                        <h6 class="card-text">1000.0</h6>
                                        <hr>
                                        <a href="#" class="btn btn-primary"><i class="fa-solid fa-hand-point-up"></i> Total</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Billed(BDT)</h5>
                                        <h6 class="card-text">1400.0</h6>
                                        <hr>
                                        <a href="#" class="btn btn-primary"><i class="fa-solid fa-hand-point-down"></i> Total</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Due(BDT)</h5>
                                        <h6 class="card-text">-400.0</h6>
                                        <hr>
                                        <a href="#" class="btn btn-primary"><i class="fa-solid fa-hand-point-left"></i> Total</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
