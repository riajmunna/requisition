@extends('backend.admin.master')

@section('title')
    Create | Advance
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="mt-4">
                    @include('backend.admin.include.alert')
                </div>
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header">
                        <h5 class="text-left font-weight-light m-4">Create Advance Request</h5>
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
                            <label class="form-label">Project Manager Name</label>
                            <select class="form-control mb-3" name="manager_name" id="">
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->user->name}}</option>
                                @endforeach
                            </select>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="note" type="text" placeholder="Enter Note">
                                <label for="name">Note</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="amount" type="number" placeholder="Enter Amount">
                                <label for="name">Amount</label>
                            </div>

                            <div class="mt-4 mb-0">
                                {{--                                <div class="d-grid">--}}
                                <button type="submit" class="btn btn-primary btn-block">Create</button>
                                {{--                                </div>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
