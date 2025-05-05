<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Détails de la veille : {{ $veille->titre }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                {{-- Bouton de retour --}}
                <div class="mb-6">
                    <a href="{{ route('admin.veilles.index') }}"
                       class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                        ← Retour à la gestion des veilles
                    </a>
                </div>

                {{-- Informations sur la veille --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <h3 class="text-lg font-semibold">Titre</h3>
                        <p>{{ $veille->titre }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold">Contenu</h3>
                        <p>{{ $veille->contenu ?? 'Non spécifié' }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold">Type de source</h3>
                        <p>{{ ucfirst($veille->type) }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold">Source</h3>
                        @if($veille->type == 'lien' && $veille->source)
                            <a href="{{ $veille->source }}" target="_blank" class="text-blue-500 underline">
                                Voir le lien
                            </a>
                        @elseif($veille->type == 'pdf' && $veille->pdf_file)
                            <a href="{{ asset('storage/' . $veille->pdf_file) }}" target="_blank" class="text-blue-500 underline">
                                Ouvrir le PDF
                            </a>
                        @else
                            <p class="italic text-sm">Aucune source spécifiée</p>
                        @endif
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold">Catégorie</h3>
                        <p>{{ ucfirst($veille->categorie) }}</p>
                    </div>

                    {{-- Affichage de l'image si disponible --}}
                    <div>
                        <h3 class="text-lg font-semibold">Image</h3>
                        @if($veille->image)
                            <img src="{{ asset('storage/' . $veille->image) }}" alt="Image de la veille" class="mt-2 rounded shadow w-full max-w-xs">
                        @else
                            <p class="italic text-sm">Aucune image disponible</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
