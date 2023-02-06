@extends('backend.admin.master')

@section('title')
    Add | Advance
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
                        <h5 class="text-left font-weight-light m-4">Add Advance Request</h5>
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
                        <form action="{{route('save.advance.history')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label">Requisition</label>
                                <select class="form-control" name="requisition_id">
                                    <option >..Select..</option>
                                    @foreach($requisitions as $requisition)
                                        <option value="{{$requisition->id}}">{{$requisition->id}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Site</label>
                                <select class="form-control" name="site_id" id="">
                                    <option >..Select..</option>
                                    @foreach($sites as $site)
                                        <option value="{{$site->id}}">{{$site->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Customer</label>
                                <select class="form-control" name="customer_id" id="">
                                    <option >..Select..</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="amount" type="number" placeholder="Enter Amount">
                                <label for="name">Amount</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="description" type="text" placeholder="Enter Description"></textarea>
                                <label for="name">Description</label>
                            </div>
                            <div class="mt-4 mb-0">
                                {{--                                <div class="d-grid">--}}
                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                                {{--                                </div>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
