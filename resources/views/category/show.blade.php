<x-app-layout>
    <div class="row">
        <div class="col-md-6 mx-auto mt-3">
            <h2 class="text-lg">Category Details</h2>

            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $category->description }}</td>
                </tr>
                <tr>
                    <th>Is Active</th>
                    <td>{{ $category->is_active ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        @if($category->image)
                            <img src="{{ asset($category->image) }}" class="w-20" alt="image">
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            </table>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('category.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'">
                    {{ __('Back to Categories') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
