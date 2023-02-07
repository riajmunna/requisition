@extends('backend.admin.master')

@section('title')
    Bill Requisition
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="mt-4">
                    @include('backend.admin.include.alert')
                </div>
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header">
                        <h5 class="text-left font-weight-light m-4">Create Bill Requisition List</h5>
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
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Project Manager Name</label>
                                        <select class="form-control" name="manager_name" id="">
                                            @foreach($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Note</label>
                                        <input type="text" class="form-control" name="item_name" required>
                                    </div>
                                </div>

                                <table class="mt-5 p-5" style="font-size: 12px;">
                                    <thead class="text-center">
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Note</th>
                                        <th>Amount(BDT)</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="note" id="">
                                                <option value="">Select an option</option>
                                                @foreach($items as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="note" placeholder="Description" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="note" placeholder="Amount" required>
                                        </td>
                                        <td>
                                            <button  class="btn btn-success btn-sm"><i
                                                    class="fa-sharp fa-solid fa-plus"></i> Add More</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

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
