@extends('layouts/app-pages')

@section('title', 'My Account Links')

@section('content')
    <section>
        <ul class="card">
            <li>
                <a href="{{ route('account.edit') }}">
                    My Account
                </a>
            </li>
            <li>
                <div data-toggle="categories-sub-menu" class="toggle-sub-menu clearfix">
                    <span class="pull-left">
                        Categories
                    </span>
    
                    <span class="pull-right toggle-icon">
                        <i class="lni-chevron-down"></i>
                    </span>
                </div>
    
                <ul id="categories-sub-menu" class="sub-menu">
                    <li>
                        <a href="{{ route('category.index') }}">
                            All categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.create') }}">
                            Add category
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <div data-toggle="subcategories-sub-menu" class="toggle-sub-menu clearfix">
                    <span class="pull-left">
                        Subcategories
                    </span>
    
                    <span class="pull-right toggle-icon">
                        <i class="lni-chevron-down"></i>
                    </span>
                </div>
    
                <ul id="subcategories-sub-menu" class="sub-menu">
                    <li>
                        <a href="{{ route('subcategory.index') }}">
                            All Subcategories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('subcategory.create') }}">
                            Add Subcategory
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <div data-toggle="safaris-sub-menu" class="toggle-sub-menu clearfix">
                    <span class="pull-left">
                        Safaris
                    </span>
    
                    <span class="pull-right toggle-icon">
                        <i class="lni-chevron-down"></i>
                    </span>
                </div>
    
                <ul id="safaris-sub-menu" class="sub-menu">
                    <li>
                        <a href="{{ route('safari.index') }}">
                            All safaris
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('safari.create') }}">
                            Add safari
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('order.index') }}">
                    Orders
                </a>
            </li>
            <li id="dashboard-sign-out">
                <a onclick="document.getElementById('customer-logout-form').submit()">
                    Sign out
                </a>
            </li>
        </ul>
    
        <!-- logout form -->
        <form id="customer-logout-form" action="{{ route('logout') }}" method="POST">
    
            @csrf
    
        </form>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/mobile-menu.css') }}">
@endsection

@push('script')
    <script>
        jQuery(document).ready(function ($) {

            // Toggle drop down sub-menu
            $('.toggle-sub-menu').click(function () {

                $(`*[data-toggle="${$(this).attr('data-toggle')}"] .toggle-icon`).toggleClass('drop');

                $('#' + $(this).attr('data-toggle')).fadeToggle();
            });
        });
    </script>
@endpush