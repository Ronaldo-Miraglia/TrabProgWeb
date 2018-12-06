<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersFilmes Controller
 *
 * @property \App\Model\Table\UsersFilmesTable $UsersFilmes
 *
 * @method \App\Model\Entity\UsersFilme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersFilmesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Filmes']
        ];
        $usersFilmes = $this->paginate($this->UsersFilmes);

        $this->set(compact('usersFilmes'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Filme id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersFilme = $this->UsersFilmes->get($id, [
            'contain' => ['Users', 'Filmes']
        ]);

        $this->set('usersFilme', $usersFilme);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersFilme = $this->UsersFilmes->newEntity();
        if ($this->request->is('post')) {
            $usersFilme = $this->UsersFilmes->patchEntity($usersFilme, $this->request->getData());
            if ($this->UsersFilmes->save($usersFilme)) {
                $this->Flash->success(__('The users filme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users filme could not be saved. Please, try again.'));
        }
        $users = $this->UsersFilmes->Users->find('list', ['limit' => 200]);
        $filmes = $this->UsersFilmes->Filmes->find('list', ['limit' => 200]);
        $this->set(compact('usersFilme', 'users', 'filmes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Filme id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersFilme = $this->UsersFilmes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersFilme = $this->UsersFilmes->patchEntity($usersFilme, $this->request->getData());
            if ($this->UsersFilmes->save($usersFilme)) {
                $this->Flash->success(__('The users filme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users filme could not be saved. Please, try again.'));
        }
        $users = $this->UsersFilmes->Users->find('list', ['limit' => 200]);
        $filmes = $this->UsersFilmes->Filmes->find('list', ['limit' => 200]);
        $this->set(compact('usersFilme', 'users', 'filmes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Filme id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersFilme = $this->UsersFilmes->get($id);
        if ($this->UsersFilmes->delete($usersFilme)) {
            $this->Flash->success(__('The users filme has been deleted.'));
        } else {
            $this->Flash->error(__('The users filme could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
