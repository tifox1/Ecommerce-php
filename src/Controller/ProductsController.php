<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpParser\Node\Stmt\Echo_;

define("img_dir", "webroot/img_db/products/");
/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    /**
     * it saves tmp_image in product folder in a id_type.format
     * first parameter recieve data of request
     * second parameter $type it recieve if image is a parent or child to organize well directory
     * @return new path field of the image
    */
    public function setImage($data, $type){

        $temp_name = explode(".", $data['image']['name']);
        //it converts to name_parent.ext or parent_child.ext
        $newfilename = $data['name']. '_'. $type . '.' . end($temp_name);

        move_uploaded_file($data['image']['tmp_name'], img_dir . $newfilename);

        return strval(img_dir . $newfilename);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories'],
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $file_info = $this->request->data['image'];
            $file_type = explode('/', $file_info['type']);

            if ($file_info['error'] == 0 || $file_type[0] == 'image') {
                echo 'Entroooooooooooooooooooooooooooooooooo';
                $product = $this->Products->patchEntity($product, $this->request->getData());
                $product->main_image = $this->setImage($this->request->data, 'parent'); 
                if ($this->Products->save($product)) {
                    echo '|' . $product->id . '|';
                    $this->Flash->success(__('The product has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            // determines whether file is upload or user only changed its name of the product

            /** if new image is uploaded*/
            if ($this->request->data['image']['error'] != 4) {
                echo 'Condicion1';
                if (file_exists($product->main_image)){
                    unlink($product->main_image);
                }
                $product->url = $this->setImage($this->request->data);
            } else {
                echo 'Condicion2';
                $file = explode('.', $product->url);
                $new_path = img_dir . $this->request->data['name']. '_main' . '.' . end($file);
                rename($product->url, $new_path);
                $product->url = $new_path; 
            }

            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $files = glob(img_dir . '*');
            foreach ($files as $file) {
                $f_name = explode('_', $file);
                if (intval($file[0]) == intval($file)) {
                    if (file_exists($file)){
                        unlink($file);
                    }
                }
            }

            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
