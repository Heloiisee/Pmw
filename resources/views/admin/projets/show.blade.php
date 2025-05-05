<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Détails du projet : {{ $project->titre }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <div class="mb-6">
                    <a href="{{ route('admin.index') }}"
                       class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                        ← Retour à l'administration
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <h3 class="text-lg font-semibold">Titre</h3>
                        <p>{{ $project->titre }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold">Technologies</h3>
                        <p>{{ $project->technologies ?? 'Non spécifié' }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold">Description</h3>
                        <p>{{ $project->description }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold">Image du projet</h3>
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="Image du projet" class="mt-2 rounded shadow w-full max-w-xs">
                        @else
                            <p class="italic text-sm">Aucune image disponible</p>
                        @endif
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold">Lien / PDF</h3>
                        @if(Str::endsWith($project->url, '.pdf'))
                            <a href="{{ asset($project->url) }}" target="_blank" class="text-blue-500 underline">
                                Ouvrir le PDF
                            </a>
                        @elseif($project->url)
                            <a href="{{ $project->url }}" target="_blank" class="text-blue-500 underline">
                                Voir le site
                            </a>
                        @else
                            <p class="italic text-sm">Aucun lien fourni</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
