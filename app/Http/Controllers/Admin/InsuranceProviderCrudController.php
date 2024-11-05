<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InsuranceProviderRequest;
use App\Imports\InsuranceProviderDataImport;
use App\Models\InsuranceProvider;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class InsuranceProviderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class InsuranceProviderCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(InsuranceProvider::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/insurance-provider');
        CRUD::setEntityNameStrings('insurance provider', 'insurance providers');

        $this->crud->addButtonFromView('top', 'import', 'import_button', 'end');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        $this->crud->setColumns(['name', 'slug']);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        $this->crud->setValidation([
            'name' => 'required|string|max:255|unique:insurance_providers,name,'. $this->crud->getCurrentEntryId(),
            'slug' => 'required|string|max:255|unique:insurance_providers,slug,'. $this->crud->getCurrentEntryId(),
        ]);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Insurance Provider Name',
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'type' => 'text',
            'label' => 'Pretty URL (slug)',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    public function import(InsuranceProviderRequest $request): RedirectResponse
    {
        $file = $request->file('file');
        $import = new InsuranceProviderDataImport();
        $import->import($file);

        return back()->with('success', 'Data Imported Successfully');
    }
}
