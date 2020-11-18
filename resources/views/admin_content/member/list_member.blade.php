@extends('admin.index')
@section('content')
    <div class="box">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
               <h6 style="display: inline-block" class="m-0 font-weight-bold text-primary">Danh Sách Thành Viên</h6>
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
                           <table class="table table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Số sách đã mượn</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  @foreach ($members as $member)
                                    <tr role="row" class="odd">
                                        <td>{{ $member->id }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->borrow_book_count }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                        <form style="display: inline-block" action="{{ url('change-status/'.$member->id) }}" method="post">
                                                {{ csrf_field() }}
                                                @if ($member->user_status=='active')
                                                    <button type="submit" class="btn btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                @endif
                                                @if ($member->user_status=='disable')
                                                    <button type="submit" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-ban"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>{{ $member->created_at->format('H:i:s d/m/yy') }}</td>
                                        <td class="d-flex justify-content-lg-around align-items-center">
                                            <a href="{{ url('detail-member/'.$member->id) }}" class="btn btn-info btn-circle">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <form style="display: inline-block" action="{{ url('delete-member/'.$member->id) }}" method="post">
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
