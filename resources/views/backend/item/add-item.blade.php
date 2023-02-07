@extends('backend.admin.master')

@section('title')
    Item
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
                        <h5 class="text-left font-weight-light m-4">Add Item Info</h5>
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
                        <form action="{{route('save.item')}}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" type="text" placeholder="Enter Item Name"/>
                                <label for="name">Item Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="code" type="text" placeholder="Enter Item Code"/>
                                <label for="code">Item Code</label>
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
