<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bancos Controller
 *
 * @property \App\Model\Table\BancosTable $Bancos
 */
class BancosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('bancos', $this->paginate($this->Bancos));
        $this->set('_serialize', ['bancos']);
    }

    /**
     * View method
     *
     * @param string|null $id Banco id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $banco = $this->Bancos->get($id, [
            'contain' => ['ContaEmpresas', 'ContaFornecedores']
        ]);
        $this->set('banco', $banco);
        $this->set('_serialize', ['banco']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $banco = $this->Bancos->newEntity();
        if ($this->request->is('post')) {
            $banco = $this->Bancos->patchEntity($banco, $this->request->data);
            if ($this->Bancos->save($banco)) {
                $this->Flash->success(__('The banco has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The banco could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('banco'));
        $this->set('_serialize', ['banco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Banco id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $banco = $this->Bancos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banco = $this->Bancos->patchEntity($banco, $this->request->data);
            if ($this->Bancos->save($banco)) {
                $this->Flash->success(__('The banco has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The banco could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('banco'));
        $this->set('_serialize', ['banco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Banco id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
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
