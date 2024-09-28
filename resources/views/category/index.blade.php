<x-app-layout>
    <div class="row">
        <div class="col-md-6 mx-auto mt-3">
            @if (session('message'))
                <div class="alert alert-success" id="success-message">{{ session('message') }}</div>
            @endif

            <table class="table table-striped table-border">
                    <thead>
                    <tr>
                        <th class="min-width-100">Name</th>
                        <th class="min-width-150">Description</th>
                        <th class="min-width-150">Is active</th>
                        <th class="min-width-150">Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (count($categories))
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->is_active ? 'Yes' : 'No'}}</td>
                                    <td>
                                        @if($category->image)
                                            <img src="{{ asset($category->image) }}" class="w-20" alt="image">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-icon"
                                           title="show_category" data-toggle="tooltip" data-placement="top">
                                           <img src="/assets/images/eye-fill.svg" alt="" height="10">
                                        </a>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-icon"
                                           title="edit_category" data-toggle="tooltip" data-placement="top">
                                           <img src="/assets/images/pencil-fill.svg" alt="" height="10">
                                        </a>
                                        
                                        <form action="{{ route('category.delete', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete is category');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon" title="delete_category" data-toggle="tooltip" data-placement="top">
                                            <img src="/assets/images/trash-fill.svg" alt="" height="10">
                                            </button>
                                        </form>
                                    
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><em>No records found</em></td>
                            </tr>
                        @endif
                    </tbody>
            </table>
                
                {{$categories->links()}}
        </div>
    </div>
    <script>
        setTimeout(function() {
            let successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);
    </script>
</x-app-layout>