<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpParser\Node\Stmt\Echo_;
use Cake\ORM\TableRegistry;


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

    public function initialize()
    {
        // Always enable the CSRF component.
        $this->loadModel('Images');
        $this->loadModel('Categories');
        $this->loadModel('Customer');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
        ]);
    }

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

    /*
        data -> image information
        type -> if is child or parent
        formname -> form where is the image information 
    */
    private function setImage($data, $type, $formname){

        $temp_name = explode(".", $data[$formname]['name']);
        //it converts to name_parent.ext or parent_child.ext
        $newfilename = $data['name']. '_'. $type . '.' . end($temp_name);
        echo $newfilename;

        move_uploaded_file($data[$formname]['tmp_name'], img_dir . $newfilename);
        // $this->setNewFilename();
        return strval("img_db/products/" . $newfilename);
    }
    
    /* 
        *When a product is edited it changes file names attached to that correspond product.   
    */
    private function setNewFilename($entity) {
        $images = TableRegistry::get('Images');
        $query = $images
            ->find()
            ->where([
                'products_id' => $entity->id,
            ]);
        //It iterates related files and renames with the new name.
        foreach ($query as $image) {
            if (file_exists($image->url)) {
                $file = explode('_', $image->url);
                print_r($file);
                $filepath = img_dir . $entity->name . '_' . 'child' . '_' . $file[3];
                rename($image->url, $filepath);
                $image->url = $filepath; 
                $this->Images->save($image);
            }
        }

    }

    /**
     * it saves tmp_image in product folder in a id_type.format
     * first parameter recieve data of request
     * second parameter $type it recieve if image is a parent or child to organize well directory
     * third parameter recieves form html name 
     * @return new path field of the image
    */

    /* Lists products*/
    public function index()
    {
        $categories = $this->Categories->find('list');
        $products = $this->paginate($this->Products->find('all')->contain(['Categories']));

        /* Filter product by categories */
        if ($this->request->is('post')){

            $products = $this->Paginate($this->Products->find('all')
                ->where([
                'categories_id' => $this->request->data['categories_id']
            ]));
        } 

        $this->set(compact(['products', 'categories']));

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
                $product = $this->Products->patchEntity($product, $this->request->getData());
                $product->main_image = $this->setImage($this->request->data, 'parent', 'image'); 
                if ($this->Products->save($product)) {
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

            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                
                // determines whethera new file is uploaded or user only changed its name of the product
                if ($this->request->data['edit_image']['error'] != 4) {
                    if (file_exists($product->main_image)){
                        unlink($product->main_image);
                    }
                    $product->main_image = $this->setImage($this->request->data, 'parent', 'edit_image');

                } else {
                    $file = explode('.', $product->main_image);
                    $new_path = img_dir . $this->request->data['name'] . '_parent' . '.' . end($file);
                    rename('webroot/'.$product->main_image, $new_path);
                    $product->main_image = 'img_db/products/' . $this->request->data['name'] . '_parent' . '.' . end($file); 
                }
                $this->setNewFilename($product);
                $this->Products->save($product);
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
