<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Beritas Controller
 *
 * @property \App\Model\Table\BeritasTable $Beritas
 * @method \App\Model\Entity\Berita[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BeritasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $beritas = $this->paginate($this->Beritas);

        $this->set(compact('beritas'));
    }

    /**
     * View method
     *
     * @param string|null $id Berita id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $berita = $this->Beritas->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('berita'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $berita = $this->Beritas->newEmptyEntity();
        if ($this->request->is('post')) {
            $berita = $this->Beritas->patchEntity($berita, $this->request->getData());
            if ($this->Beritas->save($berita)) {
                $this->Flash->success(__('The berita has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The berita could not be saved. Please, try again.'));
        }
        $users = $this->Beritas->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('berita', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Berita id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $berita = $this->Beritas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $berita = $this->Beritas->patchEntity($berita, $this->request->getData());
            if ($this->Beritas->save($berita)) {
                $this->Flash->success(__('The berita has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The berita could not be saved. Please, try again.'));
        }
        $users = $this->Beritas->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('berita', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Berita id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $berita = $this->Beritas->get($id);
        if ($this->Beritas->delete($berita)) {
            $this->Flash->success(__('The berita has been deleted.'));
        } else {
            $this->Flash->error(__('The berita could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
