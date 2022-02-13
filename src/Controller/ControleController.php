<?php
namespace App\Controller;

use App\Controller\AppController;

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

            $data['data'] = date('Y-m-d H:i:s');

            // FORMATA TODA VIRGULA PARA PONTO
            for($i = 0; $i < strlen($data['valor']); $i++){

                if(substr($data['valor'], $i, 1) == ','){
                    $data['valor'] = substr($data['valor'], 0, $i).'.'.substr($data['valor'], $i+1);
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
        $this->set(compact('controle', 'bancos', 'contas'));
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
            'contain' => ['Bancos', 'Contas'],
        ];
        $controle = $this->paginate($this->Controle);

        $controle_geral['saldo_total'] = 0;
        $controle_geral['saldo_total_mes'] = 0;
        $controle_geral['saldo_entrada'] = 0;
        $controle_geral['saldo_saida'] = 0;
        $controle_geral['bancoBrasil'] = 0;
        $controle_geral['bancoItau'] = 0;
        $controle_geral['bancoNubank'] = 0;

        foreach ($controle as $key) {
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

            if($key['banco']['nome'] == 'Banco do Brasil'){
                if($key['nome'] == 'Deposito'){
                    $controle_geral['bancoBrasil'] = $controle_geral['bancoBrasil'] + doubleval($key['valor']);
                }else{
                    $controle_geral['bancoBrasil'] = $controle_geral['bancoBrasil'] - doubleval($key['valor']);
                }
            }else if($key['banco']['nome'] == 'Itaú'){
                if($key['nome'] == 'Deposito'){
                    $controle_geral['bancoItau'] = $controle_geral['bancoItau'] + doubleval($key['valor']);
                }else{
                    $controle_geral['bancoItau'] = $controle_geral['bancoItau'] - doubleval($key['valor']);
                }
            }else if($key['banco']['nome'] == 'Nubank'){
                if($key['nome'] == 'Deposito'){
                    $controle_geral['bancoNubank'] = $controle_geral['bancoNubank'] + doubleval($key['valor']);
                }else{
                    $controle_geral['bancoNubank'] = $controle_geral['bancoNubank'] - doubleval($key['valor']);
                }
            }
        }

        for($i = 1; $i <= 12; $i++){
            $controle_geral['mes']['saldo_total_disponivel'][$i] = 0;
            $controle_geral['mes']['valor_mensal_gasto'][$i] = 0;
            $controle_geral['mes'][$i] = 0;

            foreach ($controle as $key) {
                
                $aux = $i;

                if($i < 10){
                    $aux = '0'.$i;
                }

                if(date_format($key['data'], 'm') == $aux){
                    if($key['nome'] == 'Deposito'){
                        $controle_geral['mes'][$i] = $controle_geral['mes'][$i] + doubleval($key['valor']);
                        $controle_geral['mes']['saldo_total_disponivel'][$i] = $controle_geral['mes']['saldo_total_disponivel'][$i] + doubleval($key['valor']);
                    }else{
                        $controle_geral['mes'][$i] = $controle_geral['mes'][$i] - doubleval($key['valor']);
                        $controle_geral['mes']['valor_mensal_gasto'][$i] = $controle_geral['mes']['valor_mensal_gasto'][$i] + doubleval($key['valor']);
                    }
                }
            }

            if($controle_geral['mes']['saldo_total_disponivel'][$i] != 0){
                $controle_geral['mes']['saldo_total_disponivel'][$i] = $controle_geral['mes']['saldo_total_disponivel'][$i] * 0.4;
            }
        }

        $saldo_total_disponivel = 0;
        $valor_mensal_gasto = 0;

        for($i = 1; $i <= 12; $i++){

            $saldo_total_disponivel = $saldo_total_disponivel + $controle_geral['mes']['saldo_total_disponivel'][$i];
            $valor_mensal_gasto = $valor_mensal_gasto + $controle_geral['mes']['valor_mensal_gasto'][$i];
        }

        $controle_geral['mes']['total_disponivel_para_gastar'] = $saldo_total_disponivel - $valor_mensal_gasto;
        $controle_geral['mes']['total_gasto_no_mes'] = $valor_mensal_gasto;

        if(($controle_geral['mes']['total_disponivel_para_gastar'] * 0.2) > $valor_mensal_gasto){
            $controle_geral['mes']['mensagem'] = "Você está tranquilão!";
        }else if(($controle_geral['mes']['total_disponivel_para_gastar'] * 0.2) <= $valor_mensal_gasto && ($saldo_total_disponivel * 0.5) > $valor_mensal_gasto){
            $controle_geral['mes']['mensagem'] = "Ainda está de boa!";
        }else if(($controle_geral['mes']['total_disponivel_para_gastar'] * 0.5) <= $valor_mensal_gasto && ($saldo_total_disponivel * 0.8) > $valor_mensal_gasto){
            $controle_geral['mes']['mensagem'] = "Vai com calma amigão!";
        }else if(($controle_geral['mes']['total_disponivel_para_gastar'] * 0.8) <= $valor_mensal_gasto && $saldo_total_disponivel > $valor_mensal_gasto){
            $controle_geral['mes']['mensagem'] = "Você chegou no limite, bora dar uma segurada!";
        }else{
            $controle_geral['mes']['mensagem'] = "TÁ ACHANDO QUE É UMA MINA DE OURO?";
        }

        for($i = 1; $i <= 12; $i++){

            $controle_geral['mes']['bancoBrasil'][$i] = 0;
            $controle_geral['mes']['bancoItau'][$i] = 0;
            $controle_geral['mes']['bancoNubank'][$i] = 0;

            foreach ($controle as $key) {
                
                $aux = $i;

                if($i < 10){
                    $aux = '0'.$i;
                }

                if(date_format($key['data'], 'm') == $aux && $key['banco']['nome'] == 'Banco do Brasil'){
                    if($key['nome'] == 'Deposito'){
                        $controle_geral['mes']['bancoBrasil'][$i] = $controle_geral['mes']['bancoBrasil'][$i] + doubleval($key['valor']);
                    }else{
                        $controle_geral['mes']['bancoBrasil'][$i] = $controle_geral['mes']['bancoBrasil'][$i] - doubleval($key['valor']);
                    }
                }else if(date_format($key['data'], 'm') == $aux && $key['banco']['nome'] == 'Itaú'){
                    if($key['nome'] == 'Deposito'){
                        $controle_geral['mes']['bancoItau'][$i] = $controle_geral['mes']['bancoItau'][$i] + doubleval($key['valor']);
                    }else{
                        $controle_geral['mes']['bancoItau'][$i] = $controle_geral['mes']['bancoItau'][$i] - doubleval($key['valor']);
                    }
                }else if(date_format($key['data'], 'm') == $aux && $key['banco']['nome'] == 'Nubank'){
                    if($key['nome'] == 'Deposito'){
                        $controle_geral['mes']['bancoNubank'][$i] = $controle_geral['mes']['bancoNubank'][$i] + doubleval($key['valor']);
                    }else{
                        $controle_geral['mes']['bancoNubank'][$i] = $controle_geral['mes']['bancoNubank'][$i] - doubleval($key['valor']);
                    }
                }
            }
        }

        $controle_geral['mes']['bancoBrasil']['total'] = 0;
        $controle_geral['mes']['bancoItau']['total'] = 0;
        $controle_geral['mes']['bancoNubank']['total'] = 0;

        for($i = 1; $i <= 12; $i++){

            $controle_geral['mes']['bancoBrasil']['total'] = $controle_geral['mes']['bancoBrasil']['total'] + $controle_geral['mes']['bancoBrasil'][$i];
            $controle_geral['mes']['bancoItau']['total'] = $controle_geral['mes']['bancoItau']['total'] + $controle_geral['mes']['bancoItau'][$i];
            $controle_geral['mes']['bancoNubank']['total'] = $controle_geral['mes']['bancoNubank']['total'] + $controle_geral['mes']['bancoNubank'][$i];

        }

        $this->set('controle_geral', $controle_geral);
        $this->set(compact('controle'));
    }
}
