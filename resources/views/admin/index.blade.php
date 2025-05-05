{{-- resources/views/admin/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Interface d’Administration') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Bienvenue sur l’interface d’admin</h2>
                <p class="mb-6 text-gray-700 dark:text-gray-300">Vous pouvez gérer vos projets ici.</p>

                {{-- Bouton d'ajout --}}
                <div class="mb-4">
                    <a href="{{ route('admin.projets.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Ajouter un projet
                    </a>
                </div>

                {{-- Liste des projets --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border rounded">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-600">
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Titre</th>
                                <th class="px-4 py-2 border">Description</th>
                                <th class="px-4 py-2 border">Technologies</th>
                                <th class="px-4 py-2 border">Image</th>
                                <th class="px-4 py-2 border">URL</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $project)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border">{{ $project->id }}</td>
                                    <td class="px-4 py-2 border">{{ $project->titre }}</td>
                                    <td class="px-4 py-2 border">{{ Str::limit($project->description, 50) }}</td>
                                    <td class="px-4 py-2 border">{{ $project->technologies }}</td>
                                    <td class="px-4 py-2 border">
                                        @if ($project->image)
                                            <img src="{{ asset('storage/' . $project->image) }}" alt="Image du projet" width="80">
                                        @else
                                            <em>Pas d'image</em>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ $project->url }}" class="text-blue-500 underline" target="_blank">Voir</a>
                                    </td>
                                    <td class="px-4 py-2 border space-x-2">
                                        {{-- Voir le projet --}}
                                        <a href="{{ route('admin.projets.show', $project->id) }}" 
                                        class="text-blue-500 hover:text-blue-700">Voir</a>
                                        {{-- Modifier le projet --}}
                                        <a href="{{ route('admin.projets.edit', $project->id) }}" class="text-yellow-500 hover:text-yellow-700">Modifier</a>
                                        <form action="{{ route('admin.projets.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Confirmer la suppression ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">Aucun projet trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
