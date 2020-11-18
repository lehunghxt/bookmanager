@extends('admin.index')
@section('content')
    <div class="box">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 style="display: inline-block" class="m-0 font-weight-bold text-primary">Thông Tin Thành Viên - {{ $user->name }} - {{ $user->email }}</h6>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                     <div class="row">
                        <div class="col-sm-12">
                           <table class="table table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mã Sách</th>
                                    <th>Tên Sách</th>
                                    <th>Status</th>
                                    <th>Ngày Mượn</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  @foreach ($user->borrowBook as $book)
                                    <tr role="row" class="odd">
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->book_code }}</td>
                                        <td>{{ $book->book_name }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Đang Mượn</span>
                                            </button>
                                        </td>
                                        <td>{{ $book->created_at->format('H:i d/m') }}</td>
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
