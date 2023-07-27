<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <!-- Categories Listing -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Categories <p> {{ $category->name }} </p>
                    </div>
                    @endforeach

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a class="btn button btn-primary" href="{{ route('admin.categories.create') }}"> Create More Categories </a>
                    </div>
                @else
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>
                        Create new subCategories
                    </h2>
                    <a href="{{ route('admin.categories.create') }}"> Create New Categories </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Subcategories Listing -->
    <div class="py-4">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($subCategories) > 0)
                    @foreach($subCategories as $category)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Categories <p> {{ $category->name }} </p>
                    </div>
                    @endforeach
                @else
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>
                        Create new subCategories
                    </h2>
                    <a href="{{ route('admin.subcategories.create') }}"> Create New Categories </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Safaris Listing -->
    <div class="py-4">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($safaris) > 0)
                    @foreach($safaris as $category)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Safaris <p> {{ $category->name }} </p>
                        {{ count }}
                    </div>
                    @endforeach
                @else
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>
                        Create new safaris
                    </h2>
                    <a href="{{ route('admin.safaris.create') }}"> Create New Safaris </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
