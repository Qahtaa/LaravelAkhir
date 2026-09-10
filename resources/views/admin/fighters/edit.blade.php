<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-600 leading-tight">
            {{ __('Edit Fighter') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-zinc-950 min-h-screen text-white">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="aa-card p-6">
                <form action="{{ route('admin.fighters.update', $fighter) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.fighters._form', ['submitLabel' => 'Update Fighter'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
