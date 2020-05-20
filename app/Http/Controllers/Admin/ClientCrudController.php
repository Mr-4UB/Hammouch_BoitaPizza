<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();

        $f1 = [
            'name' => 'Nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f2 = [
            'name' => 'Prenom',
            'type' => 'text',
            'label' => 'Prenom',
        ];
        $f3 = [
            'name' => 'Email',
            'type' => 'email',
            'label' => 'Email',
        ];
        $f4 = [
            'name' => 'Adresse',
            'type' => 'text',
            'label' => 'Adresse',
        ];
        $f5 = [
            'name' => 'Date_inscription',
            'type' => 'date',
            'label' => 'Date Inscription',
        ];
        $f6 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '100px',
        ];
        
        $this->crud->addColumns([$f6, $f1, $f2, $f3, $f4, $f5]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);

        $f8 = [
            'label' => "Image",
            'name' => "imgPath",
            'type' => 'image',
            'upload' => true,
            'crop' => true, 
            'aspect_ratio' => 1, 
            
        ];

        $f1 = [
            'name' => 'Nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f2 = [
            'name' => 'Prenom',
            'type' => 'text',
            'label' => 'Prenom',
        ];
        $f3 = [
            'name' => 'Email',
            'type' => 'email',
            'label' => 'Email',
        ];
        $f4 = [
            'name' => 'Adresse',
            'type' => 'text',
            'label' => 'Adresse',
        ];
        $f5 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'Login',
        ];
        $f6 = [
            'name' => 'MotdePasse',
            'type' => 'password',
            'label' => 'Mot de Passe',
        ];
        $f7 = [
            'name' => 'Date_inscription',
            'type' => 'date',
            'label' => 'Date Inscription',
        ];
        

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $this->crud->addFields([$f8, $f1, $f2, $f3, $f4, $f5, $f6, $f7]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $f1 = [
            'name' => 'Nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f2 = [
            'name' => 'Prenom',
            'type' => 'text',
            'label' => 'Prenom',
        ];
        $f3 = [
            'name' => 'Email',
            'type' => 'email',
            'label' => 'Email',
        ];
        $f4 = [
            'name' => 'Adresse',
            'type' => 'text',
            'label' => 'Adresse',
        ];
        $f5 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'Login',
        ];
        $f6 = [
            'name' => 'MotdePasse',
            'type' => 'password',
            'label' => 'Mot de Passe',
        ];
        $f7 = [
            'name' => 'Date_inscription',
            'type' => 'date',
            'label' => 'Date Inscription',
        ];
        $f8 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '100px'
        ];
        
        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8]);
    }
}
