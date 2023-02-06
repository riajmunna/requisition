@extends('backend.admin.master')

@section('title')
    Customer | Edit
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h5 class="text-left font-weight-light m-4">Edit Site Info</h5>
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
                        <form action="{{route('update.site')}}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="hidden" name="site_id" value="{{$site->id}}">
                                <input class="form-control" name="customer_id" type="text" value="{{$site->customer_id}}" />
                                <label for="customer_id">Customer ID</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" type="text" value="{{$site->name}}"/>
                                <label for="site_code">Site Code</label>
                            </div><div class="form-floating mb-3">
                                <input class="form-control" name="site_code" type="text" value="{{$site->site_code}}"/>
                                <label for="site_code">Site Code</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="address" type="text" value="{{$site->address}}"/>
                                <label for="address">Address</label>
                            </div>

                            <div class="mt-4 mb-0">
                                {{--                                <div class="d-grid">--}}
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                                {{--                                </div>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
