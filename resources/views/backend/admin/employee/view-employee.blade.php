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
                <button type="submit" class="btn btn-secondary btn-sm">Add Employee</button>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" style="text-align: center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
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
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->department }}</td>
                            <td>{{ $item->designation }}</td>
                            <td>{{ $item->balance }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->blood }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>{{ $item->present_address }}</td>
                            <td>{{ $item->permanent_address }}</td>
                            <td>
                                <table style="margin-left: auto;margin-right: auto;">
                                    <tr>
                                        <td>
                                            <a href="{{route('edit.employee',['id'=>$item->id])}}"
                                               class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <form action="{{route('delete.employee')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="employee_id"
                                                       value="{{$item->id}}">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure delete this?')">
                                                    Delete
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
