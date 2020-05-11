<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\BankAccount;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\MotherCategory;
use App\Models\Payment;
use App\Models\Projects;
use App\Models\Role;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotherCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/accounts/index", 'name' => "Accounts"], ['name' => "Add Accounts"]
        ];

        $motherCategory = MotherCategory::all();

        $category = Category::all();

        $subCategory = SubCategory::all();

        return view('front-end.item.category.index')
            ->with([
                'breadcrumbs' => $breadcrumbs,
                'motherCategory' => $motherCategory,
                'category' => $category,
                'subCategory' => $subCategory,
            ]);
    }

    public function processMotherCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => ['required']
        ]);

        if ($validator->fails()) {
            return Helper::redirectBackWithValidationError($validator);
        }

        $motherCategory = new MotherCategory();
        $motherCategory->name = $request->post('name');

        $motherCategory->save();

        Helper::addActivity('mother_category', $motherCategory->mother_category_id, 'Mother Category Created!');

        return Helper::redirectBackWithNotification('success', 'Mother Category Created!');

    }

    public function processCategory(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'                      => ['required', 'string'],
            'mother_category_id'        => ['required', 'numeric']

        ]);

        if ($validator->fails()) {
            return Helper::redirectBackWithValidationError($validator);
        }

        $category = new Category();

        $category->name = $request->post('name');
        $category->mother_category_id = $request->post('mother_category_id');

        $category->save();

        Helper::addActivity('category', $category->category_id, 'Category Created!');

        return Helper::redirectBackWithNotification('success', 'Category Created!');

    }

    public function processSubCategory(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'                      => ['required', 'string'],
            'mother_category_id'        => ['required', 'numeric'],
            'category_id'        => ['required', 'numeric'],

        ]);

        if ($validator->fails()) {
            return Helper::redirectBackWithValidationError($validator);
        }

        $subCategory = new SubCategory();

        $subCategory->name = $request->post('name');
        $subCategory->mother_category_id = $request->post('mother_category_id');
        $subCategory->category_id = $request->post('category_id');

        $subCategory->save();

        Helper::addActivity('sub_category', $subCategory->sub_category_id, 'Sub Category Created!');

        return Helper::redirectBackWithNotification('success', 'Sub Category Created!');

    }

    public function processManufacturer(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'                      => ['required', 'string'],
            'mother_category_id'        => ['required', 'numeric'],
            'category_id'        => ['required', 'numeric'],
            'sub_category_id'        => ['required', 'numeric'],

        ]);

        if ($validator->fails()) {
            return Helper::redirectBackWithValidationError($validator);
        }

        $manufacturer = new Manufacturer();

        $manufacturer->name = $request->post('name');
        $manufacturer->mother_category_id = $request->post('mother_category_id');
        $manufacturer->category_id = $request->post('category_id');
        $manufacturer->sub_category_id = $request->post('sub_category_id');

        $manufacturer->save();

        Helper::addActivity('manufacturer', $manufacturer->manufacturer_id, 'Manufacturer Created!');

        return Helper::redirectBackWithNotification('success', 'Manufacturer Created!');

    }
}
