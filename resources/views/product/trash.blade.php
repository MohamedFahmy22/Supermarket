@extends('product.layout')
@section('content')

<div class="jumbotron container">
    <h1> Trashed Products </h1>
    <a class="btn btn-primary btn-lg" href="{{route('products.index')}}" role="button">Home</a>
</div>

<div class="container">
    <table class="table container">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col" style="width: 450px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
        @endphp
            @foreach ($products as $item)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->price}} LE</td>
                <td>
                    <div class="row">
                        
                        <div class="col-sm">
                            <a class="btn btn-primary" href="{{route('product.back.from.trash',$item->id)}}">Back</a>
                        </div>

                        <div class="col-sm">
                            <a class="btn btn-danger" href="{{route('product.delete.from.database',$item->id)}}">Delete</a>
                        </div>
                    </div>
                    
                </td>
            </tr>
            @endforeach
        
        
        </tbody>
    </table>
    {{$products->links()}}
</div>

@endsection