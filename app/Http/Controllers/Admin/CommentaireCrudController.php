<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentaireRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommentaireCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentaireCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commentaire');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commentaire');
        $this->crud->setEntityNameStrings('commentaire', 'commentaires');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        CRUD::addField([  // Select
            'label' => "Client",
            'type' => 'select',
            'name' => 'numClient', // the db column for the foreign key
            'entity' => 'client', // the method that defines the relationship in your Model
            'attribute' => 'Nom', // foreign key attribute that is shown to user
        ]);

        CRUD::addField([  // Select
            'label' => "Produit",
            'type' => 'select',
            'name' => 'codeProduit', // the db column for the foreign key
            'entity' => 'produit', // the method that defines the relationship in your Model
            'attribute' => 'Nom', // foreign key attribute that is shown to user
        ]);
        $this->crud->setValidation(CommentaireRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
