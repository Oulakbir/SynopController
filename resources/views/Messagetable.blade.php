@extends('layouts.master')
@section('content')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body mt-0">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Table</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">All Message</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Message</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Messages</th>
                                        <th>Message ID</th>
                                        <th>Content</th>
                                        <th>Creation date</th>
                                        <th>User</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($synopticMessages as $key=>$items)
                                    <tr>
                                        <td><img class="rounded-circle" width="35" src="{{URL::to('img/email.png'.$items->avatar)}}" alt=""></td>
                                        <td class="message_id">{{$items->id}}</td>
                                        <td class="content">{{$items->message}}</td>
                                        <td class="join_date">{{$items->created_at}}</td>
                                        <td class="username">{{$items->username}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary shadow btn-xs sharp me-1 edit_message" href="#" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger shadow btn-xs sharp delete_message" href="#" data-toggle="modal" data-target="#delete_message"><i class="fa fa-trash"></i></a>
                                            </div>												
                                        </td>												
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Messages</th>
                                        <th>Message ID</th>
                                        <th>Content</th>
                                        <th>Creation date</th>
                                        <th>User</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Expense Modal -->
<div id="edit_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('message/update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Message ID</label>
                            <input type="text" class="form-control" id="e_message_id" name="message_id" readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="e_name" name="username" readonly>
                        </div>
                    </div>
              
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Content</label>
                            <input type="text" class="form-control" id="e_content" name="message_content" >
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Creation Date</label>
                            <input type="text" class="form-control" id="e_join_date" name="join_date" readonly>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary-save submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Expense Modal -->
<!-- Delete User Modal -->
<div class="modal custom-modal fade" id="delete_message" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Message</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('Message/delete') }}" method="POST">
                        @csrf
                        <input type="hidden" id="e_id" name="id">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary-cus continue-btn submit-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary-cus cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete User Modal -->
@section('script')
    <!-- Bootstrap Core JS -->
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
    
    {{-- show data on model or edit --}}
    <script>
        $(document).on('click','.edit_message',function()
        {
            var _this = $(this).parents('tr');
            $('#e_message_id').val(_this.find('.message_id').text());
            $('#e_content').val(_this.find('.content').text());
            $('#e_name').val(_this.find('.username').text());
            $('#e_join_date').val(_this.find('.join_date').text());
        });
    </script>
    {{-- delete user --}}
    <script>
        $(document).on('click','.delete_message',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.message_id').text());
        });
    </script>

@endsection
@endsection
