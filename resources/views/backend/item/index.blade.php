@extends('backend.admin.master')

@section('title')
    Item | List
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Item Info</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Items</li>
        </ol>

        <div class="mt-4">
            @include('backend.admin.include.alert')
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{route('add.item')}}" class="btn btn-secondary btn-sm"><i
                        class="fa-sharp fa-solid fa-plus"></i> Add Item Info</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" style="text-align: left; font-size: 12px;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Item Code</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $key=1; @endphp
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td class="btn btn-success btn-sm">
                                @if($item->status == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td>
                                <table style="margin-right: auto;">
                                    <tr>
                                        <td>
                                            <a href="{{route('edit.item',['id'=>$item->id])}}"
                                               class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <form action="{{route('delete.item')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="item_id"
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
