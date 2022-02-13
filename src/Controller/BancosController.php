<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bancos Controller
 *
 * @property \App\Model\Table\BancosTable $Bancos
 *
 * @method \App\Model\Entity\Banco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BancosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $bancos = $this->paginate($this->Bancos);

        $this->set(compact('bancos'));
    }

    /**
     * View method
     *
     * @param string|null $id Banco id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $banco = $this->Bancos->get($id, [
            'contain' => [],
        ]);

        $this->set('banco', $banco);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $banco = $this->Bancos->newEntity();
        if ($this->request->is('post')) {
            $banco = $this->Bancos->patchEntity($banco, $this->request->getData());
            if ($this->Bancos->save($banco)) {
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = $banco['id'].'.jpg';
                $file_destination = 'img/bancos/' . $file_name;
                move_uploaded_file($file_tmp, $file_destination);
                $this->Flash->success(__('The banco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banco could not be saved. Please, try again.'));
        }
        $this->set(compact('banco'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Banco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $banco = $this->Bancos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banco = $this->Bancos->patchEntity($banco, $this->request->getData());
            if ($this->Bancos->save($banco)) {
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = $banco['id'].'.jpg';
                $file_destination = 'img/bancos/' . $file_name;
                move_uploaded_file($file_tmp, $file_destination);
                $this->Flash->success(__('The banco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banco could not be saved. Please, try again.'));
        }
        $this->set(compact('banco'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Banco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $banco = $this->Bancos->get($id);
        if ($this->Bancos->delete($banco)) {
            $this->Flash->success(__('The banco has been deleted.'));
        } else {
            $this->Flash->error(__('The banco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
