<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Imports\InsuranceDataImport;
use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('category', 'categories');

        // Add the import button
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
             'name' => 'required|string|max:255|unique:categories,name,'. $this->crud->getCurrentEntryId(),
             'slug' => 'required|string|max:255|unique:categories,slug,'. $this->crud->getCurrentEntryId(),
        ]);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Category Name',
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

    public function import(Request $request)
    {
        $import = new InsuranceDataImport();
        $import->import($request->file('file'));

        return back()->with('success', 'Data Imported Successfully');
    }

    /*public function export()
    {
        return Excel::download(new InsuranceDataExport, 'insurance_data.xlsx');
    }*/
}
