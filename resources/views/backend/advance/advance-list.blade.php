@extends('backend.admin.master')

@section('title')
    Advance | List
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Advance History Info</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Advance Histories</li>
        </ol>
        <div class="mt-4">
            @include('backend.admin.include.alert')
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Requisition No.</th>
                        <th>Customer</th>
                        <th>Site No.</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $key=1; @endphp
                    @foreach ($advance_lists as $item)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $item->requisition_id }}</td>
                            <td>{{ $item->customer->name }}</td>
                            <td>{{ $item->site->name}}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                @if($item->status == 0)
                                    Pending
                                @else
                                Approved
                                @endif
                            </td>
                            <td>
                                <table style="margin-left: auto;margin-right: auto;">
                                    <tr>
                                        <td>
                                            <a href="{{route('edit.advance',['id'=>$item->id])}}"
                                               class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <form action="{{route('delete.advance')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id"
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
