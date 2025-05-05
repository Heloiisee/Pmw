<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier le parcours scolaire') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow sm:rounded-lg">
                <form method="POST" action="{{ route('admin.educations.update', $education->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titre</label>
                        <input type="text" name="titre" value="{{ old('titre', $education->titre) }}" required class="w-full mt-1 p-2 border rounded">
                        @error('titre') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Établissement</label>
                        <input type="text" name="etablissement" value="{{ old('etablissement', $education->etablissement) }}" required class="w-full mt-1 p-2 border rounded">
                        @error('etablissement') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de début</label>
                        <input type="date" name="date_debut" value="{{ old('date_debut', $education->date_debut) }}" required class="w-full mt-1 p-2 border rounded">
                        @error('date_debut') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de fin</label>
                        <input type="date" name="date_fin" value="{{ old('date_fin', $education->date_fin) }}" class="w-full mt-1 p-2 border rounded">
                        @error('date_fin') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" rows="4" class="w-full mt-1 p-2 border rounded">{{ old('description', $education->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
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
