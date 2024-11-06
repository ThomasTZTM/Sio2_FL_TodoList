<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Nouvelle Todo</h1>

    <form action="/todos/create" method="POST" class="space-y-4">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="title" id="title" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Créer
            </button>
            <a href="/todos" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Annuler
            </a>
        </div>
    </form>
</div> 