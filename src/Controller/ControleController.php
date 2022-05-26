<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\PessoasController;

/**
 * Controle Controller
 *
 * @property \App\Model\Table\ControleTable $Controle
 *
 * @method \App\Model\Entity\Controle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ControleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bancos', 'Contas'],
        ];
        $controle = $this->paginate($this->Controle);

        $this->set(compact('controle'));
    }

    /**
     * View method
     *
     * @param string|null $id Controle id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $controle = $this->Controle->get($id, [
            'contain' => ['Bancos', 'Contas'],
        ]);

        $this->set('controle', $controle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $controle = $this->Controle->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();

            if($data['nome'][0] != 'Transferencia'){
                $aux = 0;
            }else{
                $aux = 1;
            }

            $data['data'] = date('Y-m-d H:i:s');

            // FORMATA TODA VIRGULA PARA PONTO
            for($i = 0; $i < strlen($data['valor'][$aux]); $i++){

                if(substr($data['valor'][$aux], $i, 1) == ','){
                    $data['valor'][$aux] = substr($data['valor'][$aux], 0, $i).'.'.substr($data['valor'][$aux], $i+1);
                }

            }

            $data['nome'] = $data['nome'][0];
            $data['descricao'] = $data['descricao'][$aux];
            $data['valor'] = $data['valor'][$aux];
            $data['pessoas_id'] = $data['pessoas_id'][$aux];
            $data['bancos_id'] = 1;

            $controllerPessoas = new PessoasController();

            if($data['nome'] == 'Transferencia'){
                $this->addTransferencia($data);
               
                if(!$controllerPessoas->transferencia($data['pessoas_id'], $data['pessoa_dois'], $data['valor']))
                    return $this->redirect(['action' => 'add']);

            }else{

                if($data['nome'] == 'Deposito'){
                    
                    $controllerPessoas->deposito($data['pessoas_id'], $data['valor']);

                }else{

                    if(!$controllerPessoas->saque($data['pessoas_id'], $data['valor']))
                        return $this->redirect(['action' => 'add']);

                }
                  
            }

            $controle = $this->Controle->patchEntity($controle, $data);

            if ($this->Controle->save($controle)) {
                $this->Flash->success(__('The controle has been saved.'));

                return $this->redirect(['action' => 'menu']);
            }
            $this->Flash->error(__('The controle could not be saved. Please, try again.'));
        }
        $bancos = $this->Controle->Bancos->find('list');
        $contas = $this->Controle->Contas->find('list');
        $pessoas = $this->Controle->Pessoas->find('list');
        $this->set(compact('controle', 'bancos', 'contas', 'pessoas'));
    }

    public function addTransferencia($data)
    {
        $controle = $this->Controle->newEntity();
        
        $data['nome'] = 'Deposito';
        $data['descricao'] = $data['descricao'];
        $data['valor'] = $data['valor'];
        $data['pessoas_id'] = $data['pessoa_dois'];
        $data['bancos_id'] = 1;

        $controle = $this->Controle->patchEntity($controle, $data);

        $this->Controle->save($controle);

    }


    /**
     * Edit method
     *
     * @param string|null $id Controle id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $controle = $this->Controle->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $controle = $this->Controle->patchEntity($controle, $this->request->getData());
            if ($this->Controle->save($controle)) {
                $this->Flash->success(__('The controle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The controle could not be saved. Please, try again.'));
        }
        $bancos = $this->Controle->Bancos->find('list', ['limit' => 200]);
        $contas = $this->Controle->Contas->find('list', ['limit' => 200]);
        $this->set(compact('controle', 'bancos', 'contas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Controle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $controle = $this->Controle->get($id);
        if ($this->Controle->delete($controle)) {
            $this->Flash->success(__('The controle has been deleted.'));
        } else {
            $this->Flash->error(__('The controle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function menu()
    {
        $this->paginate = [
            'contain' => ['Bancos', 'Contas', 'Pessoas'],
        ];
        $controle = $this->paginate($this->Controle);

        $pessoas = $this->Controle->Pessoas->find('list');

        $controle_geral['saldo_total'] = 0;
        $controle_geral['saldo_total_mes'] = 0;
        $controle_geral['saldo_entrada'] = 0;
        $controle_geral['saldo_saida'] = 0;

        $hex = array_merge(range(0, 9), range('A', 'F'));

        foreach ($pessoas as $key) {

            $cor = '#';
            while(strlen($cor) < 7){
                $num = rand(0, 15);
                $cor .= $hex[$num];
            }

            $controle_geral[$key] = 0;
            $controle_geral['mes'][$key]['total'] = 0;
            $controle_geral['cor'][$key] = $cor;

            for($i = 1; $i <= 12; $i++){

                $controle_geral['mes'][$key][$i] = 0;

            }

        }

        foreach ($controle as $key) {

            $controle_geral[$key['pessoa']['nome']] = 0;

            if($key['pessoa']['nome'] == 'VizuDigital'){

                if($key['nome'] == 'Deposito'){
                    $controle_geral['saldo_total'] = $controle_geral['saldo_total'] + doubleval($key['valor']);
                    $controle_geral['saldo_entrada'] = $controle_geral['saldo_entrada'] + doubleval($key['valor']);
                }else{
                    $controle_geral['saldo_total'] = $controle_geral['saldo_total'] - doubleval($key['valor']);
                    $controle_geral['saldo_saida'] = $controle_geral['saldo_saida'] + doubleval($key['valor']);
                }

                if(date_format($key['data'], 'm') == date('m')){
                    if($key['nome'] == 'Deposito'){
                        $controle_geral['saldo_total_mes'] = $controle_geral['saldo_total_mes'] + doubleval($key['valor']);
                    }else{
                        $controle_geral['saldo_total_mes'] = $controle_geral['saldo_total_mes'] - doubleval($key['valor']);
                    }
                }

                if($key['nome'] == 'Deposito'){
                    $controle_geral[$key['pessoa']['nome']] = $controle_geral[$key['pessoa']['nome']] + doubleval($key['valor']);
                }else{
                    $controle_geral[$key['pessoa']['nome']] = $controle_geral[$key['pessoa']['nome']] - doubleval($key['valor']);
                }
            }

        }
        
        for($i = 1; $i <= 12; $i++){
            $controle_geral['mes']['valor_mensal_gasto'][$i] = 0;
            $controle_geral['mes'][$i] = 0;

            foreach ($controle as $key) {
                
                if($key['pessoa']['nome'] == 'VizuDigital'){
                    $aux = $i;

                    if($i < 10){
                        $aux = '0'.$i;
                    }

                    if(date_format($key['data'], 'm') == $aux){
                        if($key['nome'] == 'Deposito'){
                            $controle_geral['mes'][$i] = $controle_geral['mes'][$i] + doubleval($key['valor']);
                        }else{
                            $controle_geral['mes'][$i] = $controle_geral['mes'][$i] - doubleval($key['valor']);
                            $controle_geral['mes']['valor_mensal_gasto'][$i] = $controle_geral['mes']['valor_mensal_gasto'][$i] + doubleval($key['valor']);
                        }
                    }
                }
            }

        }

        $valor_mensal_gasto = 0;

        for($i = 1; $i <= 12; $i++){

            $valor_mensal_gasto = $valor_mensal_gasto + $controle_geral['mes']['valor_mensal_gasto'][$i];
        }

        for($i = 1; $i <= 12; $i++){

            foreach ($controle as $key) {
                
                $aux = $i;

                if($i < 10){
                    $aux = '0'.$i;
                }

                if(date_format($key['data'], 'm') == $aux){
                    if($key['nome'] == 'Deposito'){
                        $controle_geral['mes'][$key['pessoa']['nome']][$i] = $controle_geral['mes'][$key['pessoa']['nome']][$i] + doubleval($key['valor']);
                    }else{
                        $controle_geral['mes'][$key['pessoa']['nome']][$i] = $controle_geral['mes'][$key['pessoa']['nome']][$i] - doubleval($key['valor']);
                    }
                }
            }
        }

        foreach ($pessoas as $key) {
            
            for($i = 1; $i <= 12; $i++){

                $controle_geral['mes'][$key]['total'] = $controle_geral['mes'][$key]['total'] + $controle_geral['mes'][$key][$i];
                $controle_geral[$key] = $controle_geral['mes'][$key]['total'];
            }
            
        }

        $this->set('pessoas', $pessoas);
        $this->set('controle_geral', $controle_geral);
        $this->set(compact('controle'));
    }
}
