<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    public function index(): void
    {
        $this->render('home/index');
    }

    public function legal(): void
    {
        $this->render('home/legal');
    }
} 