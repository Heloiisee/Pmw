{{-- resources/views/admin/veilles/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des Veilles') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Liste des veilles</h2>
                <p class="mb-6 text-gray-700 dark:text-gray-300">Ajoutez, modifiez ou supprimez vos veilles ici.</p>

                {{-- Bouton d'ajout --}}
                <div class="mb-4">
                    <a href="{{ route('admin.veilles.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        + Ajouter une veille
                    </a>
                </div>

                {{-- Liste des veilles --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border rounded">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-600">
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Titre</th>
                                <th class="px-4 py-2 border">Description</th>
                                <th class="px-4 py-2 border">Catégorie</th>
                                <th class="px-4 py-2 border">Image</th>
                                <th class="px-4 py-2 border">Date</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Boucle sur les veilles --}}
                            @forelse($veilles as $veille)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border">{{ $veille->id }}</td>
                                    <td class="px-4 py-2 border">{{ $veille->titre }}</td>
                                    <td class="px-4 py-2 border">{{ Str::limit($veille->contenu, 80) }}</td>
                                    <td class="px-4 py-2 border">{{ ucfirst($veille->categorie ?? 'Non définie') }}</td>
                                    <td class="px-4 py-2 border">
                                        @if($veille->image)
                                            <img src="{{ asset('storage/' . $veille->image) }}" alt="Image de la veille" width="80" class="mx-auto rounded shadow">
                                        @else
                                            <em>Pas d'image</em>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border">{{ $veille->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 border space-x-2">
                                        <a href="{{ route('admin.veilles.show', $veille->id) }}" class="text-blue-500 hover:text-blue-700">Voir</a>
                                        <a href="{{ route('admin.veilles.edit', $veille->id) }}" class="text-yellow-500 hover:text-yellow-700">Modifier</a>
                                        <form action="{{ route('admin.veilles.destroy', $veille->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Confirmer la suppression ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">Aucune veille trouvée.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-6">
                    {{ $veilles->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
