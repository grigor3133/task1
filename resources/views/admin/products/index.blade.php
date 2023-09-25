@extends('layouts.app')

@section('content')
    <div class="container">
    <form method="POST" action="{{ route('product.add') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        @foreach($languages as $key)
            <div class="form-group">
                <label for="title">Title:  {{ $key }}</label>
                <input type="text" name="title_{{ $key }}"  class="form-control" required>
            </div>
        @endforeach
        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        @foreach($languages as $key)
            <div class="form-group">
                <label for="description">Description: {{ $key }}</label>
                <textarea name="description_{{ $key }}"  class="form-control" required></textarea>
            </div>
        @endforeach
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
    </div>

    <div class="container">
        <h2>All Products</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>


@endsection
