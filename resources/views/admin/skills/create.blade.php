<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une compétence') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow sm:rounded-lg">
                <form method="POST" action="{{ route('admin.skills.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom') }}" required class="w-full mt-1 p-2 border rounded">
                        @error('nom') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Niveau</label>
                        <input type="text" name="niveau" value="{{ old('niveau') }}" required class="w-full mt-1 p-2 border rounded">
                        @error('niveau') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Icône FontAwesome --}}
                    <div class="mb-4">
                        <label for="icon" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Icône (classe FontAwesome) :</label>
                        <input type="text" name="icon" id="icon" placeholder="Ex: fab fa-html5" class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" required>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            Tu peux trouver les icônes sur <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-500 underline">fontawesome.com/icons</a>
                        </p>
                    </div>

                    {{-- Aperçu en direct (optionnel) --}}
                    <div class="mb-6">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Aperçu :</label>
                        <div id="preview" class="text-4xl text-blue-600"><i class=""></i></div>
                    </div>

                    <script>
                        document.getElementById('icon').addEventListener('input', function () {
                            const iconClass = this.value;
                            const preview = document.getElementById('preview');
                            preview.innerHTML = `<i class="${iconClass}"></i>`;
                        });
                    </script>

                    <div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
