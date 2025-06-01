<?php
declare(strict_types=1);

namespace App\Controller\Tech;

use App\Controller\AppController;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event): void
    {
        $this->viewBuilder()->setLayout('techlte');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
    }
        public function getItems()
    {
        $items =$this->Items->find()
            ->contain(['Users', 'Statuses', 'AddedUser', 'ModifiedUser'])
            ->where(['Items.is_active' => "1", 'Items.status_id' => 1])
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
                'user_added' => $item->added_user ? $item->added_user->firstname .' '. $item->added_user->middlename .' '. $item->added_user->lastname : '' ,
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
            'contain' => ['Users', 'Statuses', 'FeedbackForms', 'RepairForms'],
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
        $statuses = $this->Items->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('item', 'users', 'statuses'));
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
        $statuses = $this->Items->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('item', 'users', 'statuses'));
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
