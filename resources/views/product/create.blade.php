@extends('product.layout')
@section('content')


<div class="container" style="padding-top:12%">
    <div class="card container" >
        <div class="card-body">
          <p> <span><a href="{{route('products.index')}}"> Back </a> </span></p>  
        </div>
      </div>
</div>

<div class="container" style="padding-top:2%">
    <form action="{{route('products.store')}}" method="POST">
        {{ csrf_field() }} 
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" class="form-control"  placeholder="Product Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="text" name="price" class="form-control"  placeholder="Product Price">
          </div>
    
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Details</label>
          <textarea class="form-control" name="detail"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>
      </form>
    
</div>

    
@endsection