<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Produits;
/**
 * Class ProduitsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Produits');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produits');
        $this->crud->setEntityNameStrings('produits', 'produits');
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
            'name' => 'Prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f3 = [
            'name' => 'Remise',
            'type' => 'text',
            'label' => 'Remise',
        ];
        $f4 = [
            'name' => 'isPromo',
            'type' => 'boolean',
            'label' => 'Is Promo',
        ];
        $f5 = [
            'name' => 'categorie.NomCat',
            'type' => 'text',
            'label' => 'Categorie',
        ];
        $f6 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '100px'
        ];
        
        $this->crud->addColumns([$f6, $f1, $f2, $f3, $f4, $f5]);
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
        CRUD::addField([  // Select
            'label' => "Categorie",
            'type' => 'select',
            'name' => 'catID', // the db column for the foreign key
            'entity' => 'categorie', // the method that defines the relationship in your Model
            'attribute' => 'NomCat', // foreign key attribute that is shown to user
            /*'model' => "App\Models\CatProduit",
            'options'   => (function ($query) {
                 return $query->orderBy('NomCat', 'ASC')->get();
             }),*/
        ]);

        $this->crud->setValidation(ProduitsRequest::class);

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
            'name' => 'Nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f2 = [
            'name' => 'Prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f3 = [
            'name' => 'Remise',
            'type' => 'text',
            'label' => 'Remise',
        ];
        $f4 = [
            'name' => 'Date_debut',
            'type' => 'date',
            'label' => 'Date Debut',
        ];
        $f5 = [
            'name' => 'Date_fin',
            'type' => 'date',
            'label' => 'Date Fin',
        ];
        $f6 = [
            'name' => 'isPromo',
            'type' => 'boolean',
            'label' => 'Is Promo',
        ];
        $f7 = [
            'name' => 'CatProduit.NomCat',
            'type' => 'text',
            'label' => 'Categorie',
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
