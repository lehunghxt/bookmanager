@extends('admin.index')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm Sách</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('add-book') }}" enctype='multipart/form-data'>
            {{ csrf_field() }}
            <div class="form-group">
              <label for="cate_name">Tên Loại Sách</label>
              <select class="form-control" name="cate_id" >
                  @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
                  @endforeach
              </select>
                @if ($errors->has('cate_id'))
                    <span class="text-danger">{{ $errors->first('cate_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="book_code">Mã Sách</label>
                <input type="text" class="form-control"  id="book_code" name="book_code" aria-describedby="" placeholder="Enter Book Code">
                @if ($errors->has('book_code'))
                    <span class="text-danger">{{ $errors->first('book_code') }}</span>
                @endif
              </div>
            <div class="form-group">
              <label for="book_name">Tên Sách</label>
              <input type="text" class="form-control"  id="book_name" name="book_name" aria-describedby="" placeholder="Enter Book Name">
              @if ($errors->has('book_name'))
                    <span class="text-danger">{{ $errors->first('book_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="book_qty">Số Lượng</label>
                <input type="number" class="form-control"  id="book_qty" name="book_qty" aria-describedby="" placeholder="Enter Book Qty">
                @if ($errors->has('book_qty'))
                    <span class="text-danger">{{ $errors->first('book_qty') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="book_description">Mô Tả</label>
                <textarea class="form-control"  id="book_description" name="book_description" rows="3"></textarea>
                @if ($errors->has('book_description'))
                    <span class="text-danger">{{ $errors->first('book_description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="book_image">Hình Ảnh</label>
                <input type="file" class="form-control-file"  id="book_image" name="book_image" name="book_image" accept="image/x-png,image/gif,image/jpeg">
                @if ($errors->has('book_image'))
                    <span class="text-danger">{{ $errors->first('book_image') }}</span>
                @endif
            </div>
            <div class="form-check">
              <input type="checkbox" value="951236" class="form-check-input" id="book_status" name="book_status">
              <label class="form-check-label" for="book_status">Active Category</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
