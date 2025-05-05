<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Certifications') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow sm:rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Liste des certifications</h3>
                    <a href="{{ route('admin.certifications.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Ajouter un parcours
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 text-green-600 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full border text-left text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-2 border">Icône</th>
                            <th class="px-4 py-2 border">Nom</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($certifications as $certification)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-2 text-xl text-center">
                                    @if($certification->icon)
                                        <i class="{{ $certification->icon }}"></i>
                                    @else
                                        <span class="text-gray-400 italic">N/A</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-white">{{ $certification->nom }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('admin.certifications.edit', $certification->id) }}" class="text-yellow-400 hover:underline">Modifier</a>
                                    <form action="{{ route('admin.certifications.destroy', $certification->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cette certification ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($certifications->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center py-4 text-gray-400">Aucune certification trouvée.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
