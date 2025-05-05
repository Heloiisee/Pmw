<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Parcours scolaire') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.educations.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Ajouter un parcours
            </a>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">
                <table class="w-full border text-left text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                        <tr>
                            <th class="text-left px-4 py-2">Titre</th>
                            <th class="text-left px-4 py-2">Établissement</th>
                            <th class="text-left px-4 py-2">Dates</th>
                            <th class="text-left px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($educations as $education)
                            <tr class="border-t border-gray-200 dark:border-gray-600">
                                <td class="px-4 py-2 text-white">{{ $education->titre }}</td>
                                <td class="px-4 py-2 text-white">{{ $education->etablissement }}</td>
                                <td class="px-4 py-2 text-white">
                                    {{ $education->date_debut }} → {{ $education->date_fin ?? 'En cours' }}
                                </td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('admin.educations.edit', $education) }}" class="text-blue-600 hover:underline">Modifier</a>
                                    <form action="{{ route('admin.educations.destroy', $education) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce parcours ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
