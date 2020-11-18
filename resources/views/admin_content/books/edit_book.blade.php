@extends('admin.index')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Sách</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('edit-book/'.$book->id) }}" enctype='multipart/form-data'>
            {{ csrf_field() }}
            <div class="form-group">
              <label for="cate_name">Tên Loại Sách</label>
              <select class="form-control" name="cate_id" required>
                  @foreach ($categories as $cate)
                    <option {{($book->cate_id==$cate->id)?'selected':''}} value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
                  @endforeach
              </select>
              @if ($errors->has('cate_id'))
                <span class="text-danger">{{ $errors->first('cate_id') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="book_code">Mã Sách</label>
                <input type="text" class="form-control" required value="{{ $book->book_code }}" id="book_code" name="book_code" placeholder="Enter Book Code">
                @if ($errors->has('book_code'))
                    <span class="text-danger">{{ $errors->first('book_code') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="book_name">Tên Sách</label>
                  <input type="text" class="form-control" required value="{{ $book->book_name }}" id="book_name" name="book_name" placeholder="Enter Book Name">
                  @if ($errors->has('book_name'))
                    <span class="text-danger">{{ $errors->first('book_name') }}</span>
                @endif
              </div>
            <div class="form-group">
                <label for="book_qty">Số Lượng</label>
                <input type="number" class="form-control" required value="{{ $book->book_qty }}" id="book_qty" name="book_qty" placeholder="Enter Book Qty">
                @if ($errors->has('book_qty'))
                    <span class="text-danger">{{ $errors->first('book_qty') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="book_description">Mô Tả</label>
                <textarea class="form-control" required id="book_description" name="book_description" rows="3">{{ $book->book_description }}</textarea>
                @if ($errors->has('book_description'))
                    <span class="text-danger">{{ $errors->first('book_description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="book_image">Hình Ảnh</label>
                <input type="file" class="form-control-file" id="book_image" name="book_image" name="book_image" accept="image/x-png,image/gif,image/jpeg">
            </div>
            <div class="form-group">
                <img class="w-25" src="{{ asset('admin/img/books/'.$book->book_image) }}" alt="{{ $book->book_name }}">
            </div>
            <div class="form-check">
              <input type="checkbox" value="951236" {{($book->book_status=='active')?'checked':''}} class="form-check-input" id="book_status" name="book_status">
              <label class="form-check-label" for="book_status">Active Category</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
