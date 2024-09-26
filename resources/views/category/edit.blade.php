<x-app-layout>
    <div class="row">
        <div class="col-md-6 mx-auto mt-3">
            
            <form method="POST" action="{{ route('category.update',$category->id) }}">
                @csrf
                @method('put')

                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$category->name)" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description',$category->description)" required autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-2">
                    <x-input-label for="is_active" :value="__('is active')" />
                    <input id="is_active" class="block mt-1" type="checkbox" name="is_active" {{ old('is_active', $category->is_active) ? 'checked' : '' }} />
                    <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                </div>

                <p>{{$category->user->id}}</p>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Edit Category') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>