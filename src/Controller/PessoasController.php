<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * pessoas Controller
 *
 * @property \App\Model\Table\pessoasTable $pessoas
 *
 * @method \App\Model\Entity\pessoa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PessoasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pessoas = $this->paginate($this->Pessoas);

        $this->set(compact('pessoas'));
    }

    /**
     * View method
     *
     * @param string|null $id pessoa id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => [],
        ]);

        $this->set('pessoa', $pessoa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoa = $this->Pessoas->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $data['saldo'] = 0;

            $pessoa = $this->Pessoas->patchEntity($pessoa, $data);

            if ($this->Pessoas->save($pessoa)) {
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = $pessoa['id'].'.jpg';
                $file_destination = 'img/pessoas/' . $file_name;
                move_uploaded_file($file_tmp, $file_destination);

                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
        $this->set(compact('pessoa'));
    }

    public function deposito($id, $saldo)
    {   

        $pessoa = $this->Pessoas->get($id, [
            'contain' => [],
        ]);

        $data = $this->request->getData();
        $data['saldo'] = intval($pessoa['saldo']) + $saldo;
        $pessoa = $this->Pessoas->patchEntity($pessoa, $data);

        if (!$this->Pessoas->save($pessoa)) {
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
            
    }

    public function saque($id, $saldo)
    {   

        $pessoa = $this->Pessoas->get($id, [
            'contain' => [],
        ]);

        if($pessoa['saldo'] < $saldo){

            $this->Flash->error(__('Saldo insuficiente para realizar a transferencia.'));

            return false;

        }else{

            $data = $this->request->getData();
            $data['saldo'] = intval($pessoa['saldo']) - $saldo;
            
            $pessoa = $this->Pessoas->patchEntity($pessoa, $data);

            if (!$this->Pessoas->save($pessoa)) {
                $this->Flash->error(__('Erro na hora de realizar transferencia.'));
            }

            return true;

        }
            
    }

    public function transferencia($id, $id2, $saldo)
    {   
        if(!$this->saque($id, $saldo))
            return false;
        else
            $this->deposito($id2, $saldo);

        return true;
    }

    /**
     * Edit method
     *
     * @param string|null $id pessoa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoas->save($pessoa)) {
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = $pessoa['id'].'.jpg';
                $file_destination = 'img/pessoas/' . $file_name;
                move_uploaded_file($file_tmp, $file_destination);
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
        $this->set(compact('pessoa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id pessoa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);
        if ($this->Pessoas->delete($pessoa)) {
            $this->Flash->success(__('The pessoa has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
