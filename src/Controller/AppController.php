<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Http\Session\DatabaseSession;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authorize' => 'Controller', 
            'loginAction' => [
                'controller' => 'Customer',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Customer',
                    'fields' => [
                        'username' => 'name',
                        'password' => 'password',
                    ],
                ]
            ],
            // 'finder' => 'auth',
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);   
        
        $this->loadModel('Customer');
        $this->Auth->allow(['home', 'add']);
    }

    public function beforeFilter(Event $event){
        /* Session */
        parent::beforeFilter($event);
        $session = $this->request->session();
        if (empty($session->read('order_line'))){
            $session->write([
                'order_line' => [],
                'total_price' => ''
            ]);
        }
        $total_price= $session->read('total_price');
        $order_line = $session->read('order_line');
        $this->set(compact(['order_line', 'total_price']));
    }
}
