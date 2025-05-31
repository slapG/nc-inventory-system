<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;
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
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view   
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
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
            'contain' => ['Items'],
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
        $this->loadModel('Departments');
        $this->loadModel('Positions');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $departments = $this->Departments->find('list', ['limit' => 200]);
        $positions = $this->Positions->find('list', ['limit' => 200]);
        $this->set(compact('user', 'departments', 'positions', ));
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
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
    public function login()
    {
        $this->request->allowMethod(['post', 'get']); 
        $this->viewBuilder()->setLayout('login');   
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            $user = $result->getData();
            if ($user->is_active != 1) {
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'error',
                        'message' => 'Your account is inactive.'
                    ]));
            }

            if ($user->is_admin == 1) {
                $redirectUrl = Router::url([
                    'prefix' => 'Admin',
                    'controller' => 'dashboard',
                    'action' => 'index',
                ]);
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'success',
                        'message' => 'Welcome Admin!',
                        'redirect' => $redirectUrl
                    ]));
            }

            if ($user->is_staff == 1) {
                $redirectUrl = Router::url([
                    'prefix' => 'Staff',
                    'controller' => 'serviceForms',
                    'action' => 'blank',
                ]);
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'success',
                        'message' => 'Welcome Staff!',
                        'redirect' => $redirectUrl
                    ]));
            }

            if ($user->is_employee == 1) {
                $redirectUrl = Router::url([
                    'prefix' => 'Employee',
                    'controller' => 'serviceForms',
                    'action' => 'index',
                ]);
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'success',
                        'message' => 'Welcome Employee!',
                        'redirect' => $redirectUrl
                    ]));
            }
            if ($user->is_tech == 1) {
                $redirectUrl = Router::url([
                    'prefix' => 'Tech',
                    'controller' => 'serviceForms',
                    'action' => 'blank',
                ]);
                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'status' => 'success',
                        'message' => 'Welcome Tech Support!',
                        'redirect' => $redirectUrl
                    ]));
            }
        }


    }

    public function loginRedirect()
    {
        $this->viewBuilder()->setLayout('login');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if (
            $result && 
            $result->isValid() && 
            $result->getData()->is_active == 1 && 
            $result->getData()->is_admin == 1 &&
            $result->getData()->is_staff == 0)
             {            
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'status' => 'success',
                    'message' => 'Welcome to the system!',
                ]));
        } else if (
            $result && 
            $result->isValid() && 
            $result->getData()->is_active == 1 && 
            $result->getData()->is_staff == 1) {
            $redirect = $this->request->getQuery('redirect', [
                'prefix' => 'Staff',
                'controller' => 'serviceForms',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        } else if (
            $result && 
            $result->isValid() && 
            $result->getData()->is_active == 1 && 
            $result->getData()->is_employee == 1) {
            $redirect = $this->request->getQuery('redirect', [
                'prefix' => 'Employee',
                'controller' => 'serviceForms',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
