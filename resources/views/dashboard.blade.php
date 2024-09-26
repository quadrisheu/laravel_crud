<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-3">
                    {{ __("You're welcome " ) .Auth::user()->name.__(" . Here are your Categories below: " )}}
                </div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <table class="table table-striped table-border">
                        <thead>
                            <tr>
                                <th class="min-width-100">Name</th>
                                <th class="min-width-150">Description</th>
                                <th class="min-width-150">Is active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($categories))
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{ $category->is_active ? 'Yes' : 'No'}}</td>
                                        
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4"><em>No records found</em></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
