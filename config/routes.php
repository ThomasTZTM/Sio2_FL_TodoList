<?php

return [
    '/' => ['HomeController', 'index'],
    '/todos' => ['TodoController', 'index'],
    '/todos/create' => ['TodoController', 'create'],
    '/todos/toggle' => ['TodoController', 'toggle'],
    '/todos/delete' => ['TodoController', 'delete'],
    '/todos/show' => ['TodoController', 'show'],
    '/legal' => ['HomeController', 'legal']
]; 