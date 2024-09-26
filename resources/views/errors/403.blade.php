<x-app-layout>
    <div class="flex justify-center items-center h-screen mt-5">
        <div class="text-center mt-5">
            <h1 class="text-2xl font-bold">403</h1>
            <p class="text-2xl mt-4"> {{$message}}</p>
            <a href="{{ url()->previous() }}" class="mt-4 text-blue-600 underline">Go Back</a>
        </div>
    </div>
</x-app-layout>
