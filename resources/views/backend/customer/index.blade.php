@extends('backend.admin.master')

@section('title')
    Customer | List
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Customer Info</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Employees</li>
        </ol>

        <div class="mt-4">
            @include('backend.admin.include.alert')
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{route('add.customer')}}" class="btn btn-secondary btn-sm"><i class="fa-sharp fa-solid fa-plus"></i> Add Customer</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" style="text-align: center; font-size: 12px">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $key=1; @endphp
                    @foreach ($customers as $item)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td class="btn btn-success btn-sm">
                                @if($item->status == 1)
                                    Active
                                @else
                                Inactive
                                @endif
                            </td>
                            <td>
                                <table style="margin-left: auto;margin-right: auto;">
                                    <tr>
                                        <td>
                                            <a href="{{route('edit.customer',['id'=>$item->id])}}"
                                               class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <form action="{{route('delete.customer')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="customer_id"
                                                       value="{{$item->id}}">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure delete this?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
