@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="products/create" title="Create a product"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product) <!-- foreach loop for display data in array-->
            <tr>
                <td>{{$product->id}}</td> <!--display data from db-->
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->created_at}}</td>
                <td>

                    <form action="store" method="POST">
                        <a href="{{ route('products.show', $product->id) }}" title="show">
                        @method('POST')
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}" title="edit">
                        @method('PUT')
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <a href="{{ route('products.delete', $product->id) }}" title="delete">
                        @method('DELETE')
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </a>
                    </form>

                    <!--<form action="{{ route('products.show', $product->id) }}" title="show">
                        @csrf
                        @method('POST')
                        <button><i class="fas fa-eye text-success  fa-lg"></i></i></button>
                    </form>
                    <form action="{{ route('products.edit', $product->id) }}" title="edit">
                        @csrf
                        @method('PUT')
                        <button><i class="fas fa-edit fa-lg"></i></i></button>
                    </form>-->
                    <form action="{{ route('products.delete', $product->id) }}" title="delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button><i class="fas fa-trash fa-lg text-danger"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection