<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="/todos" class="text-blue-500 hover:text-blue-700">← Retour à la liste</a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-3xl font-bold mb-4"><?= htmlspecialchars($todo->getTitle()) ?></h1>
        
        <div class="space-y-4">
            <div class="flex items-center space-x-2">
                <span class="font-semibold">Statut:</span>
                <span class="<?= $todo->isCompleted() ? 'text-green-500' : 'text-yellow-500' ?>">
                    <?= $todo->isCompleted() ? 'Terminé' : 'En cours' ?>
                </span>
            </div>
            
            <div class="flex items-center space-x-2">
                <span class="font-semibold">Créé le:</span>
                <span class="text-gray-600">
                    <?= $todo->getCreatedAt()->format('d/m/Y H:i') ?>
                </span>
            </div>
            
            <div class="flex space-x-4 mt-6">
                <form action="/todos/toggle" method="POST" class="inline">
                    <input type="hidden" name="id" value="<?= $todo->getId() ?>">
                    <button type="submit" 
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        <?= $todo->isCompleted() ? 'Marquer comme à faire' : 'Marquer comme terminé' ?>
                    </button>
                </form>
                
                <form action="/todos/delete" method="POST" class="inline">
                    <input type="hidden" name="id" value="<?= $todo->getId() ?>">
                    <button type="submit" 
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> 