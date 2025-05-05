<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white dark:text-white leading-tight">
            {{ __('Compétences') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow sm:rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-white dark:text-white">Liste des compétences</h3>
                    <a href="{{ route('admin.skills.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Ajouter
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full border text-left text-sm text-white">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                        <tr>
                            <th class="px-4 py-2 border">Nom</th>
                            <th class="px-4 py-2 border">Niveau</th>
                            <th class="px-4 py-2 border">Image</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skills as $skill)
                            <tr class="border-b text-white">
                                <td class="px-4 py-2">{{ $skill->nom }}</td>
                                <td class="px-4 py-2">{{ $skill->niveau }}</td>
                                <td class="px-4 py-2">
                                    @if ($skill->image)
                                        <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->nom }}" class="w-16 h-16 object-cover rounded">
                                    @else
                                        <span class="text-gray-400">Aucune image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('admin.skills.edit', $skill->id) }}" class="text-yellow-400 hover:underline">Modifier</a>
                                    <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cette compétence ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($skills->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-300">Aucune compétence trouvée.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
