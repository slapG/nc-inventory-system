<?php
declare(strict_types=1);

namespace App\Controller\Admin;

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

        $user = $this->request->getAttribute('identity');
        if (!$user || !$user->get('is_admin')) {
            $this->Flash->error('Access denied. Admins only.');
            return $this->redirect(['prefix' => false,'controller' => 'Users', 'action' => 'logout']);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
    }

    public function getRepairForms()
    {
        $repairForms = $this->RepairForms->find('all', [
            'contain' => ['Items', 'Departments', 'Users'],
        ]);
        $data = [];
        foreach ($repairForms as $repairForm) {
            $data[] = [
                'id' => $repairForm->id,
                'control_no' => $repairForm->control_no,
                'item_id' => $repairForm->item ? $repairForm->item->name : '',
                'description' => $repairForm->description,
                'department_id' => $repairForm->department_id,
                'findings' => $repairForm->findings,
                'recommendation' => $repairForm->recommendation,
                'action_taken' => $repairForm->action_taken,
                'requested_by' => $repairForm->user ? $repairForm->user->firstname .' '. $repairForm->user->middlename .' '. $repairForm->user->lastname : '' ,
                'inspected_by' => $repairForm->user ? $repairForm->user->firstname .' '. $repairForm->user->middlename .' '. $repairForm->user->lastname : '' ,
                'is_active' => $repairForm->is_active,
                'status' => $repairForm->status,
                'created' => $repairForm->created,
                'modified' => $repairForm->modified,
            ];
        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
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
            'contain' => ['Items', 'Departments'],
        ]);

        $this->set(compact('repairForm'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Users');  
        $this->loadModel('Statuses');
        $this->loadModel('ServiceForms');
        $repairForm = $this->RepairForms->newEmptyEntity();
        if ($this->request->is('post')) {
            $repairForm = $this->RepairForms->patchEntity($repairForm, $this->request->getData());
            if ($this->RepairForms->save($repairForm)) {
                $this->Flash->success(__('The repair form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The repair form could not be saved. Please, try again.'));
        }
        $items = $this->RepairForms->Items->find('list', ['limit' => 200])->all();
        $departments = $this->RepairForms->Departments->find('list', ['limit' => 200])->all();
        $users = $this->RepairForms->Users->find('list', ['limit' => 200])->all();
        $statuses = $this->RepairForms->Statuses->find('list', ['limit' => 200])->all();
        $serviceForms = $this->ServiceForms->find('list', ['limit' => 200])->all();
        $this->set(compact('repairForm', 'items', 'departments', 'users', 'statuses', 'serviceForms'));
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
        $items = $this->RepairForms->Items->find('list', ['limit' => 200])->all();
        $departments = $this->RepairForms->Departments->find('list', ['limit' => 200])->all();
        $this->set(compact('repairForm', 'items', 'departments'));
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
