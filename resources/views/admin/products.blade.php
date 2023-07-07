@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <h1 class="text-center">Admin All Table Products</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions ----</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <a href="{{ route('products.create') }}" class="btn btn-primary text-dark">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('products.show',$product->id) }}" class="btn btn-info">
                                        <i class="fa-solid fa-eye fs-5 me-3"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning text-dark">
                                        <i class="fa-solid fa-pen-to-square fs-5 me-3"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.products.delete',$product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fa-solid fa-trash fs-5 me-3"></i>
                                            </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>


</div>

@endsection