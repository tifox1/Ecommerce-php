<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orderlines Controller
 *
 * @property \App\Model\Table\OrderlinesTable $Orderlines
 *
 * @method \App\Model\Entity\Orderline[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderlinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Products'],
        ];
        $orderlines = $this->paginate($this->Orderlines);

        $this->set(compact('orderlines'));
    }

    /**
     * View method
     *
     * @param string|null $id Orderline id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderline = $this->Orderlines->get($id, [
            'contain' => ['Orders', 'Products'],
        ]);

        $this->set('orderline', $orderline);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderline = $this->Orderlines->newEntity();
        if ($this->request->is('post')) {
            $orderline = $this->Orderlines->patchEntity($orderline, $this->request->getData());
            if ($this->Orderlines->save($orderline)) {
                $this->Flash->success(__('The orderline has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orderline could not be saved. Please, try again.'));
        }
        $orders = $this->Orderlines->Orders->find('list', ['limit' => 200]);
        $products = $this->Orderlines->Products->find('list', ['limit' => 200]);
        $this->set(compact('orderline', 'orders', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orderline id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderline = $this->Orderlines->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderline = $this->Orderlines->patchEntity($orderline, $this->request->getData());
            if ($this->Orderlines->save($orderline)) {
                $this->Flash->success(__('The orderline has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orderline could not be saved. Please, try again.'));
        }
        $orders = $this->Orderlines->Orders->find('list', ['limit' => 200]);
        $products = $this->Orderlines->Products->find('list', ['limit' => 200]);
        $this->set(compact('orderline', 'orders', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orderline id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderline = $this->Orderlines->get($id);
        if ($this->Orderlines->delete($orderline)) {
            $this->Flash->success(__('The orderline has been deleted.'));
        } else {
            $this->Flash->error(__('The orderline could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
