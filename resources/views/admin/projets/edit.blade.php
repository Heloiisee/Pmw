<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier le projet') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <a href="{{ route('admin.index') }}" class="text-blue-500 underline mb-4 inline-block">← Retour à l'accueil admin</a>

                <form action="{{ route('admin.projets.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="titre" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Titre</label>
                        <input type="text" name="titre" id="titre" class="form-input mt-1 block w-full" value="{{ old('titre', $project->titre) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-textarea mt-1 block w-full">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="technologies" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Technologies</label>
                        <input type="text" name="technologies" id="technologies" class="form-input mt-1 block w-full" value="{{ old('technologies', $project->technologies) }}">
                    </div>

                    <div class="mb-4">
                        <label for="url" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Lien (URL ou PDF)</label>
                        <input type="text" name="url" id="url" class="form-input mt-1 block w-full" value="{{ old('url', $project->url) }}">
                        <small class="text-sm text-gray-500">Tu peux coller un lien externe ou uploader un PDF ci-dessous</small>
                    </div>

                    <div class="mb-4">
                        <label for="pdf" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Fichier PDF (optionnel)</label>
                        <input type="file" name="pdf" id="pdf" class="form-input mt-1 block w-full">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Image</label>
                        <input type="file" name="image" id="image" class="form-input mt-1 block w-full">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Image actuelle" class="mt-2" width="120">
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Mettre à jour le projet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
