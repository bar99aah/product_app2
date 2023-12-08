@extends('layout.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
    <a class="btn btn-primary" href="{{route('products.index')}}">all product</a>
    <br>
    @if ($errors->any())
        @foreach ($errors->all() as $item)
        <div class='alert alert-danger' role="alert"> 
            {{$item}}
        </div>
        @endforeach
    @endif
<div class="mb-3">
   <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">name</label>
        <br>
        <input type="text" class="form-control" name='name' value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">expiry_date</label>
        <select name="date_id" id="" class="form-control">
            @foreach ($dates as $d)
                <option value="{{ $d->id }}">{{ $d->expiry_date }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">description</label>
        <br>
        <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">image</label>
        <br>
        <input type="file" class="form-control" name='image' value="{{ old('image') }}">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</div>
</div>
</div>
</div>

  @endsection