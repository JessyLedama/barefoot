@extends('layouts.app-pages')
<link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/safaris.css') }}">

@section('title', 'Categories | ' . config('app.name'))

@section('content')
<body>
    <section class="clearfix">
        @include('dashboard.menu')
        <!-- Categories -->
        <article class="card pull-right">
            <div id="category-list">
                <h4 class="clearfix desktop">
                    <a href="{{ route('admin.categories.index') }}" class="pull-left">
                        Categories ({{ count($categories) }})
                    </a>
                </h4>

                <div class="py-4">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <p> {{ $category->name }} </p>
                                </div>
                                @endforeach

                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <a class="btn button btn-primary" href="{{ route('admin.categories.create') }}"> Create More Categories </a>
                                </div>
                            @else
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h2>
                                    Create new Categories
                                </h2>
                                <a href="{{ route('admin.categories.create') }}"> Create New Categories </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="clearfix mobile">
                    <h4>
                        <a href="{{ route('dashboard.menu') }}" id="back-to-menu">
                            <i class="lnr lnr-arrow-left"></i>
                        </a>
                        
                        Categories ({{ count($categories) }})
                    </h4>
                </div>

                @if (session()->has('success'))
                    <span class="alert alert-success">
                        {{ session('success') }}
                    </span>
                @endif
            </div>
            
        </article>

        <!-- Sub Categories -->
        <article class="card pull-right">
            <div id="category-list">
                <h4 class="clearfix desktop">
                    <a href="{{ route('admin.safaris.index') }}" class="pull-left">
                        Sub Categories ({{ count($subCategories) }})
                    </a>
                </h4>

                <div class="py-4">
                
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            @if(count($subCategories) > 0)
                                @foreach($subCategories as $category)
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    Sub Categories <p> {{ $category->name }} </p>
                                </div>
                                @endforeach
                            @else
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h2>
                                    Create new Sub Categories
                                </h2>
                                <a href="{{ route('admin.subcategories.create') }}"> Create New Sub Categories </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="clearfix mobile">
                    <h4>
                        <a href="{{ route('dashboard.menu') }}" id="back-to-menu">
                            <i class="lnr lnr-arrow-left"></i>
                        </a>
                        
                        Sub Categories ({{ count($subCategories) }})
                    </h4>

                    <div class="py-4">
                
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                @if(count($subCategories) > 0)
                                    @foreach($subCategories as $category)
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        Sub Categories <p> {{ $category->name }} </p>
                                    </div>
                                    @endforeach
                                @else
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h2>
                                        Create new Sub Categories
                                    </h2>
                                    <a href="{{ route('admin.subcategories.create') }}"> Create New Sub Categories </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @if (session()->has('success'))
                    <span class="alert alert-success">
                        {{ session('success') }}
                    </span>
                @endif
            </div>
            
        </article>

        <!-- Safaris -->
        <article class="card pull-right">
            <div id="category-list">
                <h4 class="clearfix desktop">
                    <a href="{{ route('admin.safaris.index') }}" class="pull-left">
                        Safaris ({{ count($safaris) }})
                    </a>
                </h4>

                <!-- Safaris Listing -->
                <div class="py-4">
                    
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            @if(count($safaris) > 0)
                                @foreach($safaris as $category)
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    Safaris <p> {{ $category->name }} </p>
                                </div>
                                @endforeach

                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <a class="btn button btn-primary" href="{{ route('admin.safaris.create') }}"> Create More Safaris </a>
                                </div>
                            @else
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h2>
                                    Create new Safaris
                                </h2>
                                <a href="{{ route('admin.safaris.create') }}"> Create New Safaris </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="clearfix mobile">
                    <h4>
                        <a href="{{ route('dashboard.menu') }}" id="back-to-menu">
                            <i class="lnr lnr-arrow-left"></i>
                        </a>
                        
                        Safaris ({{ count($safaris) }})
                    </h4>
                    
                    <!-- Safaris Listing -->
                    <div class="py-4">
                        
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                @if(count($safaris) > 0)
                                    @foreach($safaris as $category)
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        Safaris <p> {{ $category->name }} </p>
                                    </div>
                                    @endforeach

                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <a class="btn button btn-primary" href="{{ route('admin.safaris.create') }}"> Create More Safaris </a>
                                    </div>
                                @else
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h2>
                                        Create new Safaris
                                    </h2>
                                    <a href="{{ route('admin.safaris.create') }}"> Create New Safaris </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @if (session()->has('success'))
                    <span class="alert alert-success">
                        {{ session('success') }}
                    </span>
                @endif
            </div>
            
        </article>
    </section>
</body>
@endsection

@section('css')

@endsection

@section('js')

@endsection