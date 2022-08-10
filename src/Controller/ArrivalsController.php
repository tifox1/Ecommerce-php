<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Arrivals Controller
 *
 * @property \App\Model\Table\ArrivalsTable $Arrivals
 *
 * @method \App\Model\Entity\Arrival[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArrivalsController extends AppController
{
    public function isAuthorized($user){
        $role = $this->Customer->find('role', [
                'id' => $user['id']
            ])->firstOrFail()
            ->role;

        if($role == 'customer'){
            return false;
        }
        return true;
    }   
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products'],
        ];
        $arrivals = $this->paginate($this->Arrivals);

        $this->set(compact('arrivals'));
    }

    /**
     * View method
     *
     * @param string|null $id Arrival id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $arrival = $this->Arrivals->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set('arrival', $arrival);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $arrival = $this->Arrivals->newEntity();
        if ($this->request->is('post')) {
            $arrival = $this->Arrivals->patchEntity($arrival, $this->request->getData());
            if ($this->Arrivals->save($arrival)) {
                $this->Flash->success(__('The arrival has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arrival could not be saved. Please, try again.'));
        }
        $products = $this->Arrivals->Products->find('list', ['limit' => 200]);
        $this->set(compact('arrival', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Arrival id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $arrival = $this->Arrivals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $arrival = $this->Arrivals->patchEntity($arrival, $this->request->getData());
            if ($this->Arrivals->save($arrival)) {
                $this->Flash->success(__('The arrival has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arrival could not be saved. Please, try again.'));
        }
        $products = $this->Arrivals->Products->find('list', ['limit' => 200]);
        $this->set(compact('arrival', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Arrival id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $arrival = $this->Arrivals->get($id);
        if ($this->Arrivals->delete($arrival)) {
            $this->Flash->success(__('The arrival has been deleted.'));
        } else {
            $this->Flash->error(__('The arrival could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
