<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Mes Todos</h1>
            <p class="text-gray-600 mt-2">Gérez vos tâches quotidiennes</p>
        </div>
        <a href="/todos/create" 
           class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition-colors duration-200 flex items-center space-x-2">
            <span>+</span>
            <span>Nouvelle todo</span>
        </a>
    </div>

    <?php if (empty($todos)): ?>
        <div class="bg-gray-50 rounded-lg p-8 text-center">
            <p class="text-gray-600 mb-4">Vous n'avez pas encore de todos</p>
            <a href="/todos/create" class="text-blue-500 hover:text-blue-600">Créez votre première todo →</a>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-lg shadow-sm">
            <?php foreach ($todos as $index => $todo): ?>
                <div class="flex items-center justify-between p-4 <?= $index !== array_key_last($todos) ? 'border-b border-gray-100' : '' ?>">
                    <div class="flex items-center space-x-4 flex-grow">
                        <form action="/todos/toggle" method="POST" class="inline">
                            <input type="hidden" name="id" value="<?= $todo->getId() ?>">
                            <button type="submit" 
                                    class="w-6 h-6 rounded-full border-2 <?= $todo->isCompleted() ? 'bg-green-500 border-green-500 text-white' : 'border-gray-300 hover:border-gray-400' ?> 
                                           flex items-center justify-center transition-colors duration-200">
                                <?php if ($todo->isCompleted()): ?>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                <?php endif; ?>
                            </button>
                        </form>
                        
                        <div class="flex-grow">
                            <a href="/todos/show?id=<?= $todo->getId() ?>" 
                               class="block hover:bg-gray-50 -m-4 p-4 transition-colors duration-200">
                                <span class="<?= $todo->isCompleted() ? 'line-through text-gray-400' : 'text-gray-700' ?>">
                                    <?= htmlspecialchars($todo->getTitle()) ?>
                                </span>
                                <span class="text-sm text-gray-500 ml-2">
                                    <?= $todo->getCreatedAt()->format('d/m/Y H:i') ?>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <a href="/todos/show?id=<?= $todo->getId() ?>" 
                           class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                        
                        <form action="/todos/delete" method="POST" class="inline">
                            <input type="hidden" name="id" value="<?= $todo->getId() ?>">
                            <button type="submit" 
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')"
                                    class="text-gray-400 hover:text-red-600 p-2 rounded-full hover:bg-gray-100 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div> 