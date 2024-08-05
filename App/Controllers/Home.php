<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller
{
    public function indexAction()
    {
        // echo 'index action from Home controller';
        // View::render(
        //     'Home/index.php',
        //     [
        //         'name' => 'Dave',
        //         'colours' => ['red', 'green', 'blue']
        //     ]
        // );

        View::renderTemplate(
            'Home/index.html',
            [
                'name' => 'Pai',
                'clouds' => ['aws', 'azure', 'gcp']
            ]
        );
    }

    protected function before()
    {
        // echo "(before) ";
        // return false;
    }

    protected function after()
    {
        // echo " (after)";
    }
}
