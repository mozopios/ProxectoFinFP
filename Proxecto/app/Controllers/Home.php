<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
       return $this->view->showViews(array("templates/head.template.php", 'welcome_message.php', 'templates/footer.template.php'));
    }
}
