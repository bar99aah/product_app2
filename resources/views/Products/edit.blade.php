@extends('layout.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
    <a class="btn btn-primary" href="{{route('products.index')}}">all product</a>
    <br>
    @if ($errors->any())
        @foreach ($errors->sll() as $item)
        <div class='alert alert-danger' role="alert"> 
            {{$item}}
        </div>
        @endforeach
    @endif
<div class="mb-3">
   <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">name</label>
        <br>
        <input type="text" class="form-control" name='name' value="{{$product->name}}">
    </div>
    <div class="mb-3">
        <label class="form-label">description</label>
        <br>
        <textarea name="description" class="form-control" cols="30" rows="10">{{$product->description}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">image</label>
        <br>
        <input type="file" class="form-control" name='image' value="{{$product->image}}">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</div>
</div>
</div>
</div>

  @endsection