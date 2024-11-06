<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList MVC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-full">
    <header class="bg-white shadow mb-8">
        <nav class="container mx-auto px-4 py-4">
            <ul class="flex space-x-6">
                <li><a href="/" class="text-gray-600 hover:text-gray-900">Accueil</a></li>
                <li><a href="/todos" class="text-gray-600 hover:text-gray-900">Todos</a></li>
            </ul>
        </nav>
    </header>

    <main class="container mx-auto px-4 flex-grow">
        <?= $content ?>
    </main>

    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center text-sm text-gray-600">
                <div>&copy; <?= date('Y') ?> TodoList MVC. Tous droits réservés.</div>
                <div><a href="/legal" class="hover:text-gray-900">Mentions légales</a></div>
            </div>
        </div>
    </footer>
</body>
</html> 