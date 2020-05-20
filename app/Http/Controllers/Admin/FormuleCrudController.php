<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormuleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formule');
        $this->crud->setEntityNameStrings('formule', 'formules');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $f1 = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Nom Formule',
        ];
        $f2 = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f3 = [
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description',
        ];
        $f4 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '100px'
        ];

        $this->crud->addColumns([$f4, $f1, $f2, $f3]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->addField([
            'label' => "Image",
            'name' => "imgPath",
            'type' => 'image',
            'upload' => true,
            'crop' => true, 
            'aspect_ratio' => 1, 
        ]);
        $this->crud->setValidation(FormuleRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Nom Formule',
        ];
        $f2 = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f3 = [
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description',
        ];
        $f4 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '100px'
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4]);
    }
}
