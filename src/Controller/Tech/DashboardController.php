<?php
declare(strict_types=1);

namespace App\Controller\Tech;

use App\Controller\AppController;

class DashboardController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Allow unauthenticated access to the index action
        $this->viewBuilder()->setLayout('techlte');
    }
    public function index()
    {
    
    }
}