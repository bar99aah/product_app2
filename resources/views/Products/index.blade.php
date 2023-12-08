@extends('layout.layout')
@section('content')
<div class="container">
    <div class="row">
      <h3>welcome , this is your products </h3>
  @if ($message = Session::get('success'))
     <div class='alert alert-success' role="alert"> 
     {{$message}}
     </div>
  @endif
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Image</th>
              <th>Description</th>
              <th>Expiry_date</th>
              <th width='300px'>Actions</th>
  
            </tr>
          </thead>
          <tbody>
            @forelse($products as $product)
              <tr>
                <td scope="row">{{$product->id}}</td>
                <td scope="row">{{$product->name}}</td>
                <td scope="row"><img src="/images/{{$product->image}}"></td>
           '    <td scope="row">{{$product->description}}</td>
           <td name="date_id" id="" class="form-control">
            @foreach ($dates as $d)
                <option value="{{ $product->date_id }}">{{ $d->expiry_date }}</option>
            @endforeach
           </td>
                <td>
                  @auth
                  <form action="{{route('products.destroy',$product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-info">edit</a>
                  @endauth
                <a href="{{route('products.show',$product->id)}}" class="btn btn-primary">show</a>
                </td>
              </tr>
              <br>
              @empty
              <br>
              <td scope="100">there is no records on database table</td> 
              @endforelse 
          
          </tbody>
        </table>
        {!! $products->links() !!}
  </div>
</div>
@endsection