@extends('layouts/app-pages')
<link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/safaris.css') }}">

@section('title', 'Safaris | ' . config('app.name'))

@section('content')
    <section class="clearfix">
        @include('dashboard.menu')

        <article class="card pull-right">
            <div id="safaris">
                <h4 class="clearfix desktop">
                    <span class="pull-left">
                            Safaris
                    </span>
                    <a href="{{ route('safari.create') }}" class="pull-right">
                        Add safari
                    </a>
                </h4>

                <div class="clearfix mobile">
                    <h4>
                        <a href="{{ route('dashboard.menu') }}" id="back-to-menu">
                            <i class="lnr lnr-arrow-left"></i>
                        </a>
                        
                        Safaris
                    </h4>

                    <a href="{{ route('category.create') }}">
                        <i class="lnr lnr-file-add"></i>
                        Add safari
                    </a>
                </div>

                @if (session()->has('success'))
                    <span class="alert alert-success">
                        {{ session('success') }}
                    </span>
                @endif

                @foreach ($safaris as $safari)
                    <div class="safari clearfix">
                        <div class="pull-left">
                            {{ ucwords($safari->name) }}
                        </div>

                        <div class="manage-safari pull-right">
                            <a href="{{ route('safari.edit', $safari) }}">
                                <i class="lni-pencil-alt"></i>
                                Edit
                            </a>

                            <a href="{{ route('safari.edit-price', $safari) }}">
                                <i class="lni-pencil-alt"></i>
                                Edit Price
                            </a>

                            <a onclick="confirm('Are you sure to delete this safari') ? document.getElementById('delete-form-{{ $safari->id }}').submit() : NaN">
                                <i class="lni-pencil-alt"></i>
                                Delete
                            </a>

                            <form id="delete-form-{{ $safari->id }}" action="{{ route('safari.destroy', $safari) }}" method="post">

                                @csrf

                                @method('DELETE')

                            </form>
                        </div>
                    </div>
                @endforeach

                <div id="pagination">
                    {{ $safaris->links() }}
                </div>
            </div>
        </article>
    </section>
@endsection

@section('css')
    
@endsection