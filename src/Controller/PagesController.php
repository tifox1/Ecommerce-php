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

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Validation\Validator;
use Cake\Http\Session\DatabaseSession;
use Cake\Controller\Component\FlashComponent;



/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Products');
        $this->loadModel('Images');
        $this->loadModel('Arrivals');
        $this->loadModel('Orders');
        $this->loadModel('Orderlines');
        $this->loadModel('Articles');
        $this->session = $this->request->session();
    }

    public function isAuthorized($user)
    {
  
        $role = $this->Customer->find('role', [
                'id' => $user['id']
            ])->firstOrFail()
            ->role;

        if($role == 'customer'){
            $action = $this->request->getParam('action');

            if (in_array($action,['product','article'])) {
                if(!$this->request->getParam('pass.0')){
                    return false;
                }
            }
            return true;

        } 
        
        return false;

    }


    // public function display(...$path)
    // {
    //     if (!$path) {
    //         return $this->redirect('/');
    //     }
    //     if (in_array('..', $path, true) || in_array('.', $path, true)) {
    //         throw new ForbiddenException();
    //     }
    //     $page = $subpage = null;

    //     if (!empty($path[0])) {
    //         $page = $path[0];
    //     }
    //     if (!empty($path[1])) {
    //         $subpage = $path[1];
    //     }
    //     $this->set(compact('page', 'subpage')); 

    //     try {
    //         $this->render(implode('/', $path));
    //     } catch (MissingTemplateException $exception) {
    //         if (Configure::read('debug')) {
    //             throw $exception;
    //         }
    //         throw new NotFoundException();
    //     }
    // }

    public function index() {
        $this->viewBuilder()->setLayout('header');
        $slide = false;
        $this->set(compact(['slide']));
    }

    public function home()
    {
        $this->viewBuilder()->setLayout('header');

        $query = $this->Products->find('all');
        $arrivals = $this->Arrivals->find('all')->contain(['Products']);
        $articles = $this->Articles->find('all');
        $slide = true;
        // $session = $this->request->session();
        foreach($articles as $article){
            $article->created_time = date_format(
                $article->created_time,
                'dS F Y'
            );
            $article->subtitle = substr($article->subtitle, 0, 200);
        }   

        $this->set(compact(['query', 'arrivals', 'slide', 'articles']));
    }

    public function product($slug) 
    {
        $slide = false;
        $this->viewBuilder()->setLayout('header');
        $product = $this->Products->findBySlug($slug)->firstOrFail();
        $images = $this->Images->find('all')->where([
            'products_id' => $product->id
        ]);
        //defining session variables to handle
        // $session = $this->request->session();
        $order_line = $this->session->read('order_line');

        /*
            It validates add cart Form
        */        
        $validation = new Validator();
        $validation
            ->integer('quantity')
            ->notEmptyString('quantity');
            
        if ($this->request->is('post') || $this->request->is('put')){
            $errors = $validation->validate($this->request->getData());
            if(empty($errors)){
                if (!in_array([
                    'name' => $product->name,
                    'quantity' => $this->request->data['quantity'],
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'slug' => $product->slug,
                    'main_image'=> $product->main_image
                ], $this->session->read('order_line'))){
                    $total_price = $this->session->read('total_price');
                    $order_line[] = [
                        'name' => $product->name,
                        'quantity' => $this->request->data['quantity'],
                        'product_id' => $product->id,
                        'price' => $product->price,
                        'slug' => $product->slug,
                        'main_image' => $product->main_image
                    ];
                    $total_price = intval($total_price) + (intval($product['price']) * intval($this->request->data['quantity']));
                    $this->session->write([   
                        'order_line' => $order_line,
                        'total_price' => strval($total_price)
                    ]);
                }
                return $this->redirect([
                    'controller' => 'Pages', 
                    'action' => 'home',
                ]);
            }
        }
        $this->set(compact(['slide', 'product', 'images']));
        $this->set('order_line', $order_line);

    }


    public function article($slug){
        $this->viewBuilder()->setLayout('header');
        $slide = false;
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $paragraphs = explode('\n',$article->article);
        $this->set(compact(['article', 'paragraphs', 'slide']));
    }

    public function deleteProduct($slug){
        $order_lines =  $this->session->read('order_line');
        $total_price = intval($this->session->read('total_price'));

        foreach ($order_lines as $product){
            if($product['slug'] == strval($slug)){
                $total_price = $total_price - (intval($product['price']) * intval($product['quantity']));
                $key = array_search($product, $order_lines);
                unset($order_lines[$key]);
            }
        }
        $this->session->write([
            'order_line' => $order_lines,
            'total_price' => strval($total_price)
        ]);
        return $this->redirect([
            'controller' => 'Pages', 
            'action' => 'home',
        ]);
    }

    public function createOrder() {
        $order = $this->Orders->newEntity();
        $order_session = $this->session->read('order_line');

        $order->customer_id = $this->Auth->user(['id']);
        $order->total_price = $this->session->read('total_price');
        $order->status = 'pendiente';
        $order->created_time = date('Y-m-d H:i:s');
        $this->Orders->save($order);

        foreach ($order_session as $product){
            $orderline = $this->Orderlines->newEntity();

            $orderline->orders_id = $order->id;
            $orderline->quantity = $product['quantity'];
            $orderline->line_price = $product['price'];
            $orderline->products_id = $product['product_id'];
            $this->Orderlines->save($orderline);
        }
        $this->session->write([
            'order_line' => [],
            'total_price' => ''
        ]);
        // $this->Flash->set('El pedido fue hecha', [
        //     'element' => 'success'
        // ]);

        $this->Flash->orderSuccess('El pedido fue hecho');

        return $this->redirect([
            'controller' => 'Pages', 
            'action' => 'home',
        ]);

    }

}

