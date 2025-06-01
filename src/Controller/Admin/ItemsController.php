<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
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

    public function approve($id = null)
    {
        $item = $this->Items->get($id);
        $item->status_id = 2;
        if ($this->Items->save($item)){
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['status' => 'success', 'message' => 'Item approved successfully']));
        } else {
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['status' => 'error', 'message' => 'Failed to approve item']));
        }
        return $this->response;
    }

    public function getItems()
    {
        $items =$this->Items->find()
            ->contain(['Users', 'Statuses', 'AddedUser', 'ModifiedUser'])
            ->where(['Items.is_active' => "1", 'Items.status_id' => 2])
            ->all();
        $data = [];
        foreach ($items as $item) {
            $data[] = [
                'id' => $item->id,
                'item_name' => $item->item_name,
                'description' => $item->description,
                'code' => $item->code,
                'quantity' => $item->quantity,
                'purchase_date' => $item->purchase_date,
                'acquire_date' => $item->acquire_date,
                'type' => $item->type,
                'count' => $item->count,
                'is_active' => $item->is_active, 
                'status' => $item->status ? $item->status->status : '',
                'user_id' => $item->user ? $item->user->firstname .' '. $item->user->middlename .' '. $item->user->lastname : '' ,
                'user_added' => $item->user_added,
                'user_modified' => $item->user_modified,
                'created' => $item->created,
                'modified' => $item->modified,
            ];
        }
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));

    }
    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('item'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEmptyEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $users = $this->Items->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('item', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $users = $this->Items->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('item', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
