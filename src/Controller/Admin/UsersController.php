<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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
        $this->loadModel('Departments');
        $this->loadModel('Positions');
        $user = $this->Users->newEmptyEntity();

        $positions = $this->Positions->find('list', ['limit' => 200]);
        $departments = $this->Departments->find('list', ['limit' => 200]);
        $this->set(compact('departments', 'positions', 'user'));
    }
    public function getUsers()
    {
        $users = $this->Users->find()
            ->contain(['Departments', 'Positions'])
            ->where(['is_active' => "1"])->all();

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'firstname' => $user->firstname,
                'middlename' => $user->middlename,
                'lastname' => $user->lastname,
                'id_number' => $user->id_number,
                'is_active' => $user->is_active,
                'department_name' => $user->department ? $user->department->department_name : '',
                'position_name' => $user->position ? $user->position->position_name : '',
                'created' => $user->created,
                'modified' => $user->modified,
            ];
        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }
    public function inactive()
    {
        $this->loadModel('Departments');
        $this->loadModel('Positions');

        $positions = $this->Positions->find('list', ['limit' => 200]);
        $departments = $this->Departments->find('list', ['limit' => 200]);
        $this->set(compact('departments', 'positions'));
    }

    public function getInactiveUsers()
    {
        $users = $this->Users->find()
            ->contain(['Departments', 'Positions'])
            ->where(['is_active' => "0"])->all();

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'firstname' => $user->firstname,
                'middlename' => $user->middlename,
                'lastname' => $user->lastname,
                'id_number' => $user->id_number,
                'is_active' => $user->is_active,
                'department_name' => $user->department ? $user->department->department_name : '',
                'position_name' => $user->position ? $user->position->position_name : '',
                'created' => $user->created,
                'modified' => $user->modified,
            ];
        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Departments', 'Positions', 'FeedbackForms', 'Items', 'ServiceForms'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'ajax']);
        $this->autoRender = false;
        $this->loadModel('Departments');
        $this->loadModel('Positions');

        $data = $this->request->getData();

        $data['is_admin'] = "0";  
        $data['is_staff'] = "0";
        $data['is_employee'] = "0";
        $data['is_teacher'] = "0";
        $data['is_tech'] = "0";

        if (!empty($data['user_role'])) {
            $selectedRole = $data['user_role'];
            if (in_array($selectedRole, ['is_admin', 'is_staff', 'is_employee', 'is_teacher', 'is_tech'])) {
                $data[$selectedRole] = "1";
            }
        }

        unset($data['user_role']);

        $user = $this->Users->newEmptyEntity();
        $user = $this->Users->patchEntity($user, $data);

        if ($this->Users->save($user)) {
            $response = ['status' => 'success', 'message' => 'User added successfully'];
        } else {
            $response = ['status' => 'error', 'message' => 'Failed to add user', 'errors' => $user->getErrors()];
        }

        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode($response));
        return $this->response;
    }

    public function deactivate($id = null)
    {
        $user = $this->Users->get($id);
        $user->is_active = "0";
        if ($this->Users->save($user)) {
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['status' => 'success', 'message' => 'User deactivated successfully']));
        } else {
            $this->response =$this->response->withType('application/json')
                ->withStringBody(json_encode(['status' => 'error', 'message' => 'Failed to deactivate user']));
        }
        return $this->response;
    }

    public function activate($id = null)
    {
        $user = $this->Users->get($id);
        $user->is_active = "1";
        if ($this->Users->save($user)){
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['status' => 'success', 'message' => 'User activated successfully']));
        } else {
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['status' => 'error', 'message' => 'Failed to activate user']));
        } 
        return $this->response;
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Departments');
        $this->loadModel('Positions');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $data = $this->request->getData();

        $data['is_admin'] = "0";  
        $data['is_staff'] = "0";
        $data['is_employee'] = "0";
        $data['is_teacher'] = "0";
        $data['is_tech'] = "0";

        if (!empty($data['user_role'])) {
            $selectedRole = $data['user_role'];
            if (in_array($selectedRole, ['is_admin', 'is_staff', 'is_employee', 'is_teacher', 'is_tech'])) {
                $data[$selectedRole] = "1";
            }
        }

        unset($data['user_role']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $data, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        if ($user->is_admin) {
            $user->user_role = 'is_admin';
        } elseif ($user->is_staff) {
            $user->user_role = 'is_staff';
        } elseif ($user->is_employee) {
            $user->user_role = 'is_employee';
        } elseif ($user->is_teacher) {
            $user->user_role = 'is_teacher';
        } elseif ($user->is_tech) {
            $user->user_role = 'is_tech';
        }
            
        $departments = $this->Departments->find('list', ['limit' => 200]);
        $positions = $this->Positions->find('list', ['limit' => 200]);
        $this->set(compact('user', 'departments', 'positions'));
    }

    public function changePassword($id = null)
    {
        $user = $this->Users->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(),['fields' => ['password']]);
            if ($this->Users->save($user)){
                $this->Flash->success(__('The password has been changed.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The password could not be changed. Please, try again.'));
        }

        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
