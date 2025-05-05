<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une certification') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow sm:rounded-lg">
                <form method="POST" action="{{ route('admin.certifications.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-100">Nom de la certification</label>
                        <input type="text" name="nom" value="{{ old('nom') }}" required class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                        @error('nom') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-100">Classe FontAwesome</label>
                        <input type="text" name="icon" value="{{ old('icon') }}" placeholder="ex: fab fa-html5" class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                        @error('icon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        <p class="text-xs text-gray-400 mt-1">Tu peux trouver les icônes sur <a href="https://fontawesome.com/icons" target="_blank" class="underline text-blue-400">fontawesome.com/icons</a></p>
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
