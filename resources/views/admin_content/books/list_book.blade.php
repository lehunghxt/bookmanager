@extends('admin.index')
@section('content')
    <div class="box">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
               <h6 style="display: inline-block" class="m-0 font-weight-bold text-primary">Danh Sách Sách</h6>
               @if (Auth::user()->role=='admin')
                <a href="{{ url('/add-book') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Thêm Sách</span>
                </a>

               @endif
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
                           <table style="font-size: 13px;" class="table table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mã Sách</th>
                                    <th>Tên Sách</th>
                                    <th>Số Lượng</th>
                                    <th>Hình Ảnh</th>
                                    <th>Trạng Thái</th>
                                    <th>Ngày Nhập</th>
                                    <th>Người Nhập</th>
                                    <th>Tùy Chọn</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  @foreach ($books as $book)
                                    <tr role="row" class="odd">
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->book_code }}</td>
                                        <td>{{ $book->book_name }}</td>
                                        <td>{{ $book->book_qty }}</td>
                                        <td style="width: 6%"><img style="display: inline-block;width: 100%;" src="{{ asset('admin/img/books/'.$book->book_image) }}"></td>
                                        <td>
                                            @if ($book->book_status=='active')
                                                <button type="submit" class="btn btn-success btn-circle">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif
                                            @if ($book->book_status=='disable')
                                                <button type="submit" class="btn btn-danger btn-circle">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            @endif
                                        </td>
                                        <td>{{ $book->created_at->format('H:i:s d/m/yy') }}</td>
                                        <td>{{ $book->user->name }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            @if (Auth::user()->role=='admin')
                                                <a href="{{ url('edit-book/'.$book->id) }}" class="btn btn-warning btn-circle">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form style="display: inline-block" action="{{ url('delete-book/'.$book->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    <button type='submit' href="#" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            @if (Auth::user()->role=='user')
                                                @if (isset($book->getStatusBook))
                                                    @if($book->getStatusBook->status == 'borrowing')
                                                        <button type="submit" class="btn btn-info btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span class="text">Đang Mượn</span>
                                                        </button>
                                                    @endif
                                                    @if($book->getStatusBook->status == 'borrowed')
                                                        <button type="submit" class="btn btn-success btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span class="text">Đã Mượn Mượn</span>
                                                        </button>
                                                    @endif
                                                @endif
                                                @if(empty($book->getStatusBook->status))
                                                    <form style="display: inline-block" action="{{ url('borrow-book/'.$book->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-success btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span class="text">Mượn Sách</span>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
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
