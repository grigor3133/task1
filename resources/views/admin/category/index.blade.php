@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Create Category</h2>
                <form method="POST" action="{{ route('category.add') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Parent Category (optional):</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">Select Parent Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}
                                (
                                    @if($category->parent)
                                        {{ $category->parent->name }}
                                    @else
                                        N/A
                                    @endif
                                )
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Categories</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Parent Category</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->parent)
                                    {{ $category->parent->name }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
