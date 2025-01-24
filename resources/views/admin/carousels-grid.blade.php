@extends('admin/roker_layout/backend_layout')

@section('title', 'มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="font-family:'Chakra Petch', sans-serif;">
            <div class="breadcrumb-title pe-3">เนื้อหา</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ป้ายประกาศ</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group" style="font-family:'Chakra Petch', sans-serif;">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal">เพิ่มข้อมูล</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
            <div class="text-white">{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('status'))
        <div class="alert alert-info border-0 bg-info alert-dismissible fade show">
            <div class="text-white">{{ session('status') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('email'))
        <div class="alert alert-info border-0 bg-info alert-dismissible fade show">
            <div class="text-white">{{ session('email') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('fail'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
            <div class="text-white">{{ session('fail') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card border-success border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <h5 class="text-primary rounded mb-0">ป้ายประกาศ</h5>
                </div>
                <hr/>
                <div class="table-responsive">
                    <table class="table" style="font-family:'Chakra Petch', sans-serif;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FullName</th>
                                <th>email</th>
                                <th>Mobile</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" data-bs-target="#editUserModal" data-bs-toggle="modal" class="btn btn-outline-primary btn-sm"><i class='bx bx-edit me-0'></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="AddModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
        <form method="POST" action="{{ url('admin/users/store') }}">
        @csrf
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label">title</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" name="title" class="form-control" placeholder="title">
                            </div>
                        </div>
                    </div>
                    {{-- <label class="col-sm-12 col-form-label">Phone No</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" name="mobile" class="form-control" placeholder="Phone No">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label">Email Address</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div> --}}
                    <label class="col-sm-12 col-form-label">Role</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <select class="form-select" name="role">
                                    <option selected>Open this select Role</option>
                                    <option {{ old('role')=='manager'? 'selected' : '' }} value="manager">Manager</option>
                                    <option {{ old('role')=='admin'? 'selected' : '' }} value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="font-family:'Chakra Petch', sans-serif;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        </div>

    </div>
</div>
@endsection
