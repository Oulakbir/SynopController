@extends('layouts.master')
@section('content')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body ml-50">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Table</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">All Comments</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Comments</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Comments</th>
                                        <th>Comment ID</th>
                                        <th>Content</th>
                                        <th>Creation date</th>
                                        <th>User</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Comments as $key=>$items)
                                    <tr>
                                        <td><img class="rounded-circle" width="35" src="{{URL::to('img/comment.jpg')}}" alt=""></td>
                                        <td class="comment_id">{{$items->id}}</td>
                                        <td class="content">{{$items->message}}</td>
                                        <td class="join_date">{{$items->created_at}}</td>
                                        <td class="username">{{$items->name}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-danger shadow btn-xs sharp delete_comment" href="#" data-toggle="modal" data-target="#delete_comment"><i class="fa fa-trash"></i></a>
                                            </div>												
                                        </td>												
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Comments</th>
                                        <th>Comment ID</th>
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

<!-- Delete User Modal -->
<div class="modal custom-modal fade" id="delete_comment" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete comment</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('Comment/delete') }}" method="POST">
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
    

    {{-- delete user --}}
    <script>
        $(document).on('click','.delete_comment',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.comment_id').text());
        });
    </script>

@endsection
@endsection
