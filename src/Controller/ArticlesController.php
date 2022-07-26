<?php
namespace App\Controller;

use App\Controller\AppController;

define("img_dir", "webroot/img_db/articles/");
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    public function isAuthorized(){
        return true;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /*
        data -> image information
        type -> if is child or parent
        formname -> form where is the image information 
    */
    private function setImage($data, $type, $formname){

        $temp_name = explode(".", $data[$formname]['name']);
        //it converts to name_parent.ext or parent_child.ext
        $newfilename = str_replace(' ', '', $data['title']). '_'. $type . '.' . end($temp_name);
        echo $newfilename;

        move_uploaded_file($data[$formname]['tmp_name'], img_dir . $newfilename);
        // $this->setNewFilename();
        return strval("img_db/articles/" . $newfilename);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article->created_time = date('Y-m-d H:i:s');
            if ($this->Articles->save($article)) {
                $article->main_image = $this->setImage(
                    $this->request->getData(),
                    'parent',
                    'image'
                );
                $this->Articles->save($article);
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                /* if new image is uploaded */
                if ($this->request->data['edit_image']['error'] != 4) {
                    if (file_exists('webroot/' . $article->main_image)){
                        // it deletes old image in img_db folder
                        unlink('webroot/' . $article->main_image);
                    }
                    // then sets the new image in img_db folder
                    $article->main_image = $this->setImage($this->request->data, 'parent', 'edit_image');

                } else {
                    // if no new image is uploaded it makes sure that actual articles name is the same as the img
                    $file = explode('.', $article->main_image);
                    $new_path = img_dir . $this->request->data['title'] . '_parent' . '.' . end($file);
                    rename('webroot/' . $article->main_image, $new_path);
                    $article->main_image = $new_path; 
                }
                $this->Articles->save($article);
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            if (file_exists('webroot/' . $article->main_image)){
                unlink('webroot/' . $article->main_image);
            }
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
