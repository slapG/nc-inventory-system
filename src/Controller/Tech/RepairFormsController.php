<?php
declare(strict_types=1);

namespace App\Controller\Tech;

use App\Controller\AppController;

/**
 * RepairForms Controller
 *
 * @property \App\Model\Table\RepairFormsTable $RepairForms
 * @method \App\Model\Entity\RepairForm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RepairFormsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('techlte');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ServiceForms', 'Items', 'Statuses'],
        ];
        $repairForms = $this->paginate($this->RepairForms);

        $this->set(compact('repairForms'));
    }

    /**
     * View method
     *
     * @param string|null $id Repair Form id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $repairForm = $this->RepairForms->get($id, [
            'contain' => ['ServiceForms', 'Items', 'Statuses'],
        ]);

        $this->set(compact('repairForm'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $this->viewBuilder()->setLayout('default');
        if ($id !== null) {
        $serviceForm = $this->RepairForms->ServiceForms->get($id);
        }
        $repairForm = $this->RepairForms->newEmptyEntity();
        if ($this->request->is('post')) {
            $repairForm = $this->RepairForms->patchEntity($repairForm, $this->request->getData());
            if ($this->RepairForms->save($repairForm)) {
                $this->Flash->success(__('The repair form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The repair form could not be saved. Please, try again.'));
        }
        $serviceForms = $this->RepairForms->ServiceForms->find('list', ['limit' => 200])->all();
        $items = $this->RepairForms->Items->find('list', ['limit' => 200])->all();
        $statuses = $this->RepairForms->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('repairForm', 'serviceForms', 'items',  'statuses', 'id', 'serviceForm'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Repair Form id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $repairForm = $this->RepairForms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $repairForm = $this->RepairForms->patchEntity($repairForm, $this->request->getData());
            if ($this->RepairForms->save($repairForm)) {
                $this->Flash->success(__('The repair form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The repair form could not be saved. Please, try again.'));
        }
        $serviceForms = $this->RepairForms->ServiceForms->find('list', ['limit' => 200])->all();
        $items = $this->RepairForms->Items->find('list', ['limit' => 200])->all();
        $statuses = $this->RepairForms->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('repairForm', 'serviceForms', 'items', 'departments', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Repair Form id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $repairForm = $this->RepairForms->get($id);
        if ($this->RepairForms->delete($repairForm)) {
            $this->Flash->success(__('The repair form has been deleted.'));
        } else {
            $this->Flash->error(__('The repair form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
