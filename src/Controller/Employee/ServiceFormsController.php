<?php
declare(strict_types=1);

namespace App\Controller\Employee;

use App\Controller\AppController;

/**
 * ServiceForms Controller
 *
 * @property \App\Model\Table\ServiceFormsTable $ServiceForms
 * @method \App\Model\Entity\ServiceForm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceFormsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $user = $this->request->getAttribute('identity');
        if (!$user || !$user->get('is_employee')) {
            $this->Flash->error('Access denied. Employees only.');
            return $this->redirect(['prefix' => false,'controller' => 'Users', 'action' => 'logout']);
        }
        $this->viewBuilder()->setLayout('employeelte');
    }
    /**
     * Index method 
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
    }

    public function getServiceForms() {

        $user = $this->request->getAttribute('identity');
        $userId = $user ? $user->getIdentifier() : null;

        $serviceForms = $this->ServiceForms->find('all', [
            'contain' => ['Users.Positions','Users.Departments', 'Statuses', 'EndorsedUser.Positions'],
            'conditions' => ['ServiceForms.user_id' => $userId]
        ]);
        $data = [];
        foreach ($serviceForms as $serviceForm) {
            $data[] = [
                'id' => $serviceForm->id,
                'user_id' => $serviceForm->user ? $serviceForm->user->firstname .' '. $serviceForm->user->middlename .' '. $serviceForm->user->lastname : '' ,
                'user_pos' => $serviceForm->user && $serviceForm->user->position ? $serviceForm->user->position->position_name : '',
                'user_dept' => $serviceForm->user && $serviceForm->user->department ? $serviceForm->user->department->department_name : '',
                'photo' => $serviceForm->photo,
                'description' => $serviceForm->description,
                'user_endorsed' => $serviceForm->endorsed_user ? $serviceForm->endorsed_user->firstname . ' ' . $serviceForm->endorsed_user->middlename . ' ' . $serviceForm->endorsed_user->lastname : null,
                'user_enpos' => $serviceForm->endorsed_user && $serviceForm->endorsed_user->position ? $serviceForm->endorsed_user->position->position_name : null,
                'status_id' => $serviceForm->status ? $serviceForm->status->status : '',
                "is_active" => $serviceForm->is_active,              
                'created' => $serviceForm->created,
                'modified' => $serviceForm->modified
            ];
        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }
    /**
     * View method
     *
     * @param string|null $id Service Form id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serviceForm = $this->ServiceForms->get($id, [
            'contain' => ['Users', 'Statuses', 'RepairForms'],
        ]);

        $this->set(compact('serviceForm'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serviceForm = $this->ServiceForms->newEmptyEntity();
        if ($this->request->is('post')) {
            $serviceForm = $this->ServiceForms->patchEntity($serviceForm, $this->request->getData());
            if ($this->ServiceForms->save($serviceForm)) {
                $this->Flash->success(__('The service form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service form could not be saved. Please, try again.'));
        }
        $users = $this->ServiceForms->Users->find('list', ['limit' => 200])->all();
        $statuses = $this->ServiceForms->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('serviceForm', 'users', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service Form id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serviceForm = $this->ServiceForms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviceForm = $this->ServiceForms->patchEntity($serviceForm, $this->request->getData());
            if ($this->ServiceForms->save($serviceForm)) {
                $this->Flash->success(__('The service form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service form could not be saved. Please, try again.'));
        }
        $users = $this->ServiceForms->Users->find('list', ['limit' => 200])->all();
        $statuses = $this->ServiceForms->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('serviceForm', 'users', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service Form id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serviceForm = $this->ServiceForms->get($id);
        if ($this->ServiceForms->delete($serviceForm)) {
            $this->Flash->success(__('The service form has been deleted.'));
        } else {
            $this->Flash->error(__('The service form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
