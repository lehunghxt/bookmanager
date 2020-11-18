@extends('admin.index')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa Loại Sách</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('edit-category/'.$category->id) }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="cate_name">Tên Loại Sách</label>
              <input type="text" class="form-control" id="cate_name" value="{{ $category->cate_name }}" name="cate_name" aria-describedby="" placeholder="Enter Cate Name">
               @if ($errors->has('cate_name'))
                    <span class="text-danger">{{ $errors->first('cate_name') }}</span>
                @endif
            </div>
            <div class="form-check">
              <input type="checkbox" value="951236" {{($category->cate_status=='active')?'checked':''}} class="form-check-input" id="status" name="status">
              <label class="form-check-label" for="status">Active Category</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
