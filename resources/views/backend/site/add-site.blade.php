@extends('backend.admin.master')

@section('title')
    Designation
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="mt-4">
                    @include('backend.admin.include.alert')
                </div>
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h5 class="text-left font-weight-light m-4">Add Site Info</h5>
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
                        <form action="{{route('save.site')}}" method="post">
                            @csrf
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Customer Name</label>
                                <select class="form-control" name="customer_id">
                                    <option>Select</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" type="text" placeholder="Enter Site Name"/>
                                <label for="name">Site Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="site_code" type="text" placeholder="Enter Site Code"/>
                                <label for="site_code">Site Code</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="address" type="text"
                                       placeholder="Enter Site Address"/>
                                <label for="address">Address</label>
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
