<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier la certification') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow sm:rounded-lg">
                <form method="POST" action="{{ route('admin.certifications.update', $certification->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom', $certification->nom) }}" required class="w-full mt-1 p-2 border rounded">
                        @error('nom') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Icône (classe FontAwesome, ex: fab fa-html5)</label>
                        <input type="text" name="icon" value="{{ old('icon', $certification->icon) }}" required class="w-full mt-1 p-2 border rounded">
                        @error('icon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
