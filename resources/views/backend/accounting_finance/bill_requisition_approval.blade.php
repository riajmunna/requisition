@extends('backend.admin.master')

@section('title')
    Bill Requisition Approval
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bill Requisition Approval List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Bill Requisition Approval Lists</li>
        </ol>
        <div class="mt-4">
            @include('backend.admin.include.alert')
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{route('create.bill.requisition.list')}}" class="btn btn-secondary btn-sm"><i
                        class="fa-sharp fa-solid fa-plus"></i> Create Bill Requisition</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Staff Name</th>
                        <th>Project Manager</th>
                        <th>Description</th>
                        <th>Amount (BDT)</th>
                        <th>Paid (BDT)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
