<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une veille') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">

                {{-- Bouton de retour --}}
                <div class="mb-6">
                    <a href="{{ route('admin.veilles.index') }}"
                        class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                        ← Retour à la gestion des veilles
                    </a>
                </div>

                {{-- Intro --}}
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    Remplissez ce formulaire pour ajouter une nouvelle veille.
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
                <form action="{{ route('admin.veilles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="titre" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                            Titre <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="contenu" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                            Contenu
                        </label>
                        <textarea name="contenu" id="contenu" rows="4"
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ old('contenu') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                            Type de source
                        </label>
                        <select name="type" id="type-select"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="lien" {{ old('type') == 'lien' ? 'selected' : '' }}>Lien</option>
                            <option value="pdf" {{ old('type') == 'pdf' ? 'selected' : '' }}>PDF</option>
                        </select>
                    </div>

                    {{-- Champ URL --}}
                    <div class="mb-4" id="source-lien">
                        <label for="source" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                            Lien (URL)
                        </label>
                        <input type="url" name="source" id="source"
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                            value="{{ old('source') }}">
                    </div>

                    {{-- Champ PDF --}}
                    <div class="mb-4 hidden" id="source-pdf">
                        <label for="pdf_file" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                            Fichier PDF
                        </label>
                        <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf"
                            class="mt-1 block w-full text-sm text-gray-900 file:bg-indigo-50 file:border file:border-gray-300 file:rounded file:px-4 file:py-2 dark:text-white dark:bg-gray-700 dark:file:bg-gray-600">
                    </div>

                    <div>
                        <label for="image" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                            Image de veille
                        </label>
                        <input type="file" name="image" id="image"
                            class="mt-1 block w-full text-sm text-gray-900 file:bg-indigo-50 file:border file:border-gray-300 file:rounded file:px-4 file:py-2 dark:text-white dark:bg-gray-700 dark:file:bg-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="categorie" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                            Catégorie
                        </label>
                        <select name="categorie" id="categorie"
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">-- Sélectionnez une catégorie --</option>
                            <option value="outil">Outil</option>
                            <option value="framework">Framework</option>
                            <option value="réseau social">Réseau social</option>
                            <option value="chaine youtube">Chaîne YouTube</option>
                            <option value="site web">Site web</option>
                            <option value="autre">Autre</option>
                        </select>
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

    {{-- JS pour basculer entre lien/pdf --}}
    <script>
        const select = document.getElementById('type-select');
        const lienInput = document.getElementById('source-lien');
        const pdfInput = document.getElementById('source-pdf');

        function toggleInputs() {
            if (select.value === 'pdf') {
                pdfInput.classList.remove('hidden');
                lienInput.classList.add('hidden');
            } else {
                lienInput.classList.remove('hidden');
                pdfInput.classList.add('hidden');
            }
        }

        select.addEventListener('change', toggleInputs);
        document.addEventListener('DOMContentLoaded', toggleInputs);
    </script>
</x-app-layout>
