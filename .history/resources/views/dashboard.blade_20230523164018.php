<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Categories <p> {{ $category->name }} </p>
                    </div>
                    @endforeach

                    
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
                    <a href="{{ route('admin.categories.create') }}"> Create New Categories </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-4">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($safaris) > 0)
                    @foreach($safaris as $category)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Categories <p> {{ $category->name }} </p>
                    </div>
                    @endforeach
                @else
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>
                        Create new safaris
                    </h2>
                    <a href="{{ route('admin.categories.create') }}"> Create New Categories </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
