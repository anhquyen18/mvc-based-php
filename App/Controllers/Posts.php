<?php

namespace App\Controllers;

use Core\View;
use App\Models\Post;


class Posts extends \Core\Controller
{
    public function indexAction()
    {
        // echo 'this is index <br/>';
        // echo htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', ['posts' => $posts]);
    }

    public function addNewAction()
    {
        echo 'add new action';
    }

    public function editAction()
    {
        echo 'this is edit <br/>';
        echo htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}
