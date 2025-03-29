<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReviewRequest;
use App\Models\Listing;
use App\Models\Review;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReviewCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ReviewCrudController extends CrudController
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
        CRUD::setModel(Review::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/review');
        CRUD::setEntityNameStrings('review', 'reviews manager');
        // Disable create operation
        CRUD::denyAccess(['create']);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('listing_id')->type('select')
            ->entity('listing')
            ->attribute('business_name')
            ->model(Listing::class)
            ->label('Service');

        CRUD::column('listing.user.name')->label('Service Provider');

        CRUD::column('customer_id');
        CRUD::column('rating');
        CRUD::column('review_text');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ReviewRequest::class);

        CRUD::field('listing_id')->type('select')
            ->entity('listing')
            ->attribute('business_name')
            ->attributes(['disabled' => 'disabled'])
            ->model(Listing::class)
            ->label('Service');
        CRUD::field('listing.user.name')->label('Service Provider')
            ->attributes(['disabled' => 'disabled']);
        CRUD::field('customer_id')->attributes(['disabled' => 'disabled']);
        CRUD::field('rating')->type('number')
           ->attributes(['disabled' => 'disabled']);
        CRUD::field('review_text');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
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
}
