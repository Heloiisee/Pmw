{{-- resources/views/admin/projects/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter un projet') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">

                {{-- Bouton de retour --}}
                <div class="mb-6">
                    <a href="{{ route('admin.index') }}"
                        class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                        ← Retour à l’interface d’administration
                    </a>
                </div>

                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    Remplissez ce formulaire pour ajouter un nouveau projet à votre portfolio.
                </p>

                {{-- Affichage des erreurs --}}
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-4 rounded">
                        <strong>Oups !</strong> Quelques erreurs :
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Formulaire --}}
                <form action="{{ route('admin.projets.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="titre" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Titre du projet <span class="text-red-500">*</span></label>
                        <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="technologies" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Technologies utilisées</label>
                        <input type="text" name="technologies" id="technologies" value="{{ old('technologies') }}"
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Image du projet</label>
                        <input type="file" name="image" id="image"
                            class="mt-1 block w-full text-sm text-gray-900 file:bg-indigo-50 file:border file:border-gray-300 file:rounded file:px-4 file:py-2 dark:text-white dark:bg-gray-700 dark:file:bg-gray-600">
                        <small class="text-gray-500 dark:text-gray-400">Formats acceptés : jpg, jpeg, png, gif (max 2MB)</small>
                    </div>

                    {{-- URL ou PDF --}}
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                            Lien du projet (URL ou PDF)
                        </label>

                        {{-- Champ URL --}}
                        <input type="url" name="url" placeholder="https://exemple.com"
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                            value="{{ old('url') }}">

                        <p class="text-sm text-gray-500 mt-1">Ou téléversez un fichier PDF :</p>

                        {{-- Champ PDF --}}
                        <input type="file" name="pdf"
                            accept="application/pdf"
                            class="mt-1 block w-full text-sm text-gray-900 file:bg-indigo-50 file:border file:border-gray-300 file:rounded file:px-4 file:py-2 dark:text-white dark:bg-gray-700 dark:file:bg-gray-600">
                    </div>

                    


                    <div>

                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 transition">
                            💾 Enregistrer
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
