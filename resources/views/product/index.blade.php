@extends('product.layout')
@section('content')

<div class="jumbotron container">
    <h1> LARVEl - CRUD </h1>
    <a class="btn btn-primary btn-lg" href="{{route('products.create')}}" role="button">Create</a>
    <a class="btn btn-primary btn-lg" href="{{route('product.trash')}}" role="button">Trash</a>

</div>
<div class="container">
    @if ($message = Session::get("Success"))
        <div class="alert alert-success" role="alert">
            {{$message}}
        </div>
    @endif

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
                            <a class="btn btn-success" href="{{route('products.edit',$item->id)}}">Edit</a>
                        </div>

                        <div class="col-sm">
                            <a class="btn btn-primary" href="{{route('products.show',$item->id)}}">Show</a>
                        </div>

                        <div class="col-sm">
                            <a class="btn btn-warning" href="{{route('soft.delete',$item->id)}}">To Trash</a>

                        </div>
                                {{-- comment 

                        <div class="col-sm">
                            <form action="{{route('products.destroy' , $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
        
                        </div>
                                --}}
                    </div>
                    
                </td>
            </tr>
            @endforeach
        
        
        </tbody>
    </table>
    {{$products->links()}}
</div>

@endsection