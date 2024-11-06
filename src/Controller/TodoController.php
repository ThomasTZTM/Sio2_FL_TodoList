<?php

namespace App\Controller;

use App\Entity\Todo;

class TodoController extends AbstractController
{
    private array $todos = [];

    public function __construct()
    {
        
        // Simuler une base de données avec une session
        session_start();
        if (!isset($_SESSION['todos'])) {
            $_SESSION['todos'] = [];
        }
        $this->todos = &$_SESSION['todos'];
    }

    public function index(): void
    {
        $this->render('todo/index', [
            'todos' => $this->todos
        ]);
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            if (!empty($title)) {
                $todo = new Todo($title);
                $todo->setId(count($this->todos) + 1);
                $this->todos[] = $todo;
                $this->redirect('/todos');
            }
        }

        $this->render('todo/create');
    }

    public function toggle(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)($_POST['id'] ?? 0);
            foreach ($this->todos as $todo) {
                if ($todo->getId() === $id) {
                    $todo->setCompleted(!$todo->isCompleted());
                    break;
                }
            }
        }
        $this->redirect('/todos');
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)($_POST['id'] ?? 0);
            foreach ($this->todos as $key => $todo) {
                if ($todo->getId() === $id) {
                    unset($this->todos[$key]);
                    break;
                }
            }
        }
        $this->redirect('/todos');
    }

    public function show(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $todo = null;
        
        foreach ($this->todos as $t) {
            if ($t->getId() === $id) {
                $todo = $t;
                break;
            }
        }
        
        if (!$todo) {
            $this->renderError(404);
            return;
        }
        
        $this->render('todo/show', [
            'todo' => $todo
        ]);
    }
} 