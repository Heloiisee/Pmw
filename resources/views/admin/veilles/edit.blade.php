<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier une veille') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                
                {{-- Retour à la liste des veilles --}}
                <a href="{{ route('admin.veilles.index') }}" class="text-blue-500 underline mb-4 inline-block">← Retour à la gestion des veilles</a>

                {{-- Formulaire de modification --}}
                <form action="{{ route('admin.veilles.update', $veille->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Titre --}}
                    <div class="mb-4">
                        <label for="titre" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Titre</label>
                        <input type="text" name="titre" id="titre" class="form-input mt-1 block w-full" value="{{ old('titre', $veille->titre) }}" required>
                    </div>

                    {{-- Contenu --}}
                    <div class="mb-4">
                        <label for="contenu" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Contenu</label>
                        <textarea name="contenu" id="contenu" rows="4" class="form-textarea mt-1 block w-full">{{ old('contenu', $veille->contenu) }}</textarea>
                    </div>

                    {{-- Type de source --}}
                    <div class="mb-4">
                        <label for="type" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Type de source</label>
                        <select name="type" id="type" class="form-select mt-1 block w-full">
                            <option value="" disabled selected>Choisir un type</option>
                            <option value="lien" {{ (old('type', $veille->type) == 'lien') ? 'selected' : '' }}>Lien</option>
                            <option value="pdf" {{ (old('type', $veille->type) == 'pdf') ? 'selected' : '' }}>PDF</option>
                        </select>
                    </div>

                    {{-- Source --}}
                    <div class="mb-4" id="source-lien" style="{{ (old('type', $veille->type) == 'pdf') ? 'display:none;' : '' }}">
                        <label for="source" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Source (URL)</label>
                        <input type="text" name="source" id="source" class="form-input mt-1 block w-full" value="{{ old('source', $veille->source) }}">
                    </div>

                    {{-- Source PDF --}}
                    <div class="mb-4" id="source-pdf" style="{{ (old('type', $veille->type) == 'lien') ? 'display:none;' : '' }}">
                        <label for="pdf_file" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Fichier PDF</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-input mt-1 block w-full">
                        <small class="text-gray-500 dark:text-gray-400">Si vous souhaitez remplacer le fichier PDF, téléversez-le ici.</small>
                    </div>

                    {{-- Catégorie --}}
                    <div class="mb-4">
                        <label for="categorie" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Catégorie</label>
                        <select name="categorie" id="categorie" class="form-select mt-1 block w-full">
                            <option value="outil" {{ (old('categorie', $veille->categorie) == 'outil') ? 'selected' : '' }}>Outil</option>
                            <option value="framework" {{ (old('categorie', $veille->categorie) == 'framework') ? 'selected' : '' }}>Framework</option>
                            <option value="réseau social" {{ (old('categorie', $veille->categorie) == 'réseau social') ? 'selected' : '' }}>Réseau social</option>
                            <option value="chaine youtube" {{ (old('categorie', $veille->categorie) == 'chaine youtube') ? 'selected' : '' }}>Chaîne YouTube</option>
                            <option value="site web" {{ (old('categorie', $veille->categorie) == 'site web') ? 'selected' : '' }}>Site web</option>
                            <option value="autre" {{ (old('categorie', $veille->categorie) == 'autre') ? 'selected' : '' }}>Autre</option>
                        </select>
                    </div>

                    {{-- Image actuelle --}}
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Image actuelle</label>
                        @if($veille->image)
                            <img src="{{ asset('storage/' . $veille->image) }}" alt="Image actuelle de la veille" class="mt-2 rounded shadow w-full max-w-xs">
                        @else
                            <p class="italic text-sm">Aucune image actuelle</p>
                        @endif
                    </div>

                    {{-- Nouveau fichier image --}}
                    <div class="mb-4">
                        <label for="image" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Nouvelle image (optionnel)</label>
                        <input type="file" name="image" id="image" class="form-input mt-1 block w-full">
                        <small class="text-gray-500 dark:text-gray-400">Formats acceptés : jpg, jpeg, png, gif (max 2MB)</small>
                    </div>

                    {{-- Bouton de soumission --}}
                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 transition">
                            💾 Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script pour afficher ou masquer la source en fonction du type --}}
    <script>
        const selectType = document.getElementById('type');
        const sourceLien = document.getElementById('source-lien');
        const sourcePdf = document.getElementById('source-pdf');

        selectType.addEventListener('change', () => {
            if (selectType.value === 'pdf') {
                sourcePdf.style.display = 'block';
                sourceLien.style.display = 'none';
            } else {
                sourcePdf.style.display = 'none';
                sourceLien.style.display = 'block';
            }
        });
    </script>
</x-app-layout>
