<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use DateTime;

define("img_dir", "webroot/img_db/products/");

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    private function setImage($request_data, $product_name) {
        $image = explode('.', $request_data['image']['name']);
        print_r($image);
        $created = new DateTime();
        $id = Text::uuid($created->format('Y-m-d H:i:s'));
        $image_path = img_dir . $product_name . '_child'. '_'. strval($id) . '.' . end($image);
        move_uploaded_file($request_data['image']['tmp_name'], $image_path);
        return $image_path;
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Products'],
        ];
        $images = $this->paginate($this->Images);

        $this->set(compact('images'));
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Products'],
        ]);
        $image = $this->Images->find()->contain(['Products'])->firstOrFail();
        // print_r($image);
        echo $image['product']['name'];

        $this->set('image', $image);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $image = $this->Images->newEntity();
        if ($this->request->is('post')) {
            $image = $this->Images->patchEntity($image, $this->request->getData());
            $product = $this
                ->Images
                ->Products
                ->get($this->request->data['products_id']);
            $image->url = $this->setImage($this->request->data, $product->name);
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $products = $this->Images->Products->find('list', ['limit' => 200]);
        $this->set(compact('image', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $image = $this->Images->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $image = $this->Images->patchEntity($image, $this->request->getData());
    //         if ($this->Images->save($image)) {
    //             $this->Flash->success(__('The image has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The image could not be saved. Please, try again.'));
    //     }
    //     $products = $this->Images->Products->find('list', ['limit' => 200]);
    //     $this->set(compact('image', 'products'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        print_r($image);
        
        if ($this->Images->delete($image)) {
            if (file_exists($image->url)){
                unlink($image->url);
            }
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
