@extends('layouts/app-pages')
<link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/categories.css') }}">

@section('title', 'Categories | ' . config('app.name'))

@section('content')
<body>
    <section class="clearfix">
        @include('dashboard.menu')

        <article class="card pull-right">
            <div id="category-list">
                <h4 class="clearfix desktop">
                    <span class="pull-left">
                        Categories
                    </span>
                    
                    <a href="{{ route('admin.categories.create') }}" class="pull-right">
                        Add category
                    </a>
                </h4>

                <div class="clearfix mobile">
                    <h4>
                        <a href="{{ route('dashboard.menu') }}" id="back-to-menu">
                            <i class="lnr lnr-arrow-left"></i>
                        </a>
                        
                        Categories
                    </h4>

                    <a href="{{ route('admin.categories.create') }}">
                        <i class="lnr lnr-file-add"></i>
                        Add category
                    </a>
                </div>

                @if (session()->has('success'))
                    <span class="alert alert-success">
                        {{ session('success') }}
                    </span>
                @endif

                @foreach ($categories as $category)
                    <div class="category clearfix">
                        <div class="pull-left">
                            {{ ucwords($category->name) }}
                        </div>

                        <div class="manage-category pull-right">
                            <a href="{{ route('admin.categories.edit', $category) }}">
                                <i class="lni-pencil-alt"></i>
                                Edit
                            </a>

                            <a onclick="confirm('Are you sure to delete this category') ? document.getElementById('delete-form-{{ $category->id }}').submit() : NaN">
                                <i class="lni-pencil-alt"></i>
                                Delete
                            </a>

                            <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category) }}" method="post">

                                @csrf

                                @method('DELETE')

                            </form>
                        </div>
                    </div>
                @endforeach

                <div id="pagination">
                    {{ $categories->links() }}
                </div>
            </div>
        </article>
    </section>
</body>
@endsection


@section('css')
    
  

@endsection

@section('js')

@endsection