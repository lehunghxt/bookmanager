@extends('admin.index')
@section('content')
    <div class="box">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
               <h6 style="display: inline-block" class="m-0 font-weight-bold text-primary">Thể loại sách</h6>
                <a href="{{ url('/add-category') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Thêm Thể Loại</span>
                </a>
            </div>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-danger">
                    {{ Session::get('flash_message_error') }}
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message_success') }}
                </div>
            @endif
            <div class="card-body">
               <div class="table-responsive">
                  <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                     <div class="row">
                        <div class="col-sm-12">
                           <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Start date</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  @foreach ($categories as $cate)
                                    <tr role="row" class="odd">
                                        <td>{{ $cate->id }}</td>
                                        <td>{{ $cate->cate_name }}</td>
                                        <td>{{ $cate->cate_slug }}</td>
                                        <td>{{ $cate->cate_status }}</td>
                                        <td>{{ $cate->created_at }}</td>
                                        <td>
                                            <a href="{{ url('edit-category/'.$cate->id) }}" class="btn btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form style="display: inline-block" action="{{ url('delete-category/'.$cate->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type='submit' href="#" class="btn btn-danger btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                  @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </div>
@endsection
