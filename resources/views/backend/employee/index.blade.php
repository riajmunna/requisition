@extends('backend.admin.master')

@section('title')
    Employee | List
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employees Info</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Employees</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{route('add.employee')}}" class="btn btn-secondary btn-sm"><i class="fa-sharp fa-solid fa-plus"></i> Add Customer</a>

            </div>
            <div class="card-body">
                <table id="datatablesSimple" style="text-align: center; font-size: 12px">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Balance</th>
                        <th>Gender</th>
                        <th>Blood</th>
                        <th>Date of Birth</th>
                        <th>Present Address</th>
                        <th>Permanent Address</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $key=1; @endphp
                    @foreach ($employees as $item)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->phone }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->user->department }}</td>
                            <td>{{ $item->user->designation }}</td>
                            <td>{{ $item->user->balance }}</td>
                            <td>{{ $item->user->gender }}</td>
                            <td>{{ $item->user->blood }}</td>
                            <td>{{ $item->user->dob }}</td>
                            <td>{{ $item->user->present_address }}</td>
                            <td>{{ $item->user->permanent_address }}</td>
                            <td>
                                <table style="margin-left: auto;margin-right: auto;">
                                    <tr>
                                        <td>
                                            <a href="{{route('edit.employee',['id'=>$item->id])}}"
                                               class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <form action="{{route('delete.employee')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="employee_id"
                                                       value="{{$item->user_id}}">
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
