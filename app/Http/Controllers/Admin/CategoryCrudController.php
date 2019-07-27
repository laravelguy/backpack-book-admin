<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CategoryRequest as StoreRequest;
use App\Http\Requests\CategoryRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('category', 'categories');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->setColumns(['title', 'subject_id','slug', 'count']);

        $this->crud->setColumnDetails('subject_id',[
           'name' => 'subject_id',
            'type' => 'select',
            'label' => 'Subject',
            'entity' => 'subject',
            'attribute' => 'title',
            'model' => 'App\Models\Subject',
        ]);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Title"
        ]);

        $this->crud->addField([
           'name' => 'subject_id',
            'type' => 'select2',
            'label' => 'Subject',
            'entity' => 'subject',
            'attribute' => 'title',
            'model' => 'App\Models\Subject',
            'options' => (function ($query) {
                return $query->orderBy('title', 'ASC')->get();
            })
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'type' => 'text',
            'label' => "Slug"
        ]);
        $this->crud->addField([
           'name' => 'count',
            'type' => 'number',
            'label' => 'Number of entity'
        ]);

        // add asterisk for fields that are required in CategoryRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
