<?php

namespace App\Http\Controllers;

use App\Request\Api;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

class ExpenseController extends BaseController
{
    protected $display_navigation = true;

    public function addExpense(Request $request)
    {
        $sub_categories = Api::getInstance()
            ->public()
            //->redirectOnFailure('ErrorController@requestStatus')
            ->get(
                Config::get('web.config.api_uri_categories') .
                '/' . Config::get('web.config.api_category_id_1') .
                '/sub_categories'
            );

        return view(
            'add-expense',
            [
                'display_navigation' => $this->display_navigation,
                'display_add_expense' => false,
                'nav_active' => 'add-expense',
                'category_id_1' => Config::get('web.config.api_category_id_1'),
                'category_id_2' => Config::get('web.config.api_category_id_2'),
                'category_id_3' => Config::get('web.config.api_category_id_3'),
                'sub_categories' => $sub_categories
            ]
        );
    }

    public function subCategories(Request $request, string $category_identifier)
    {
        $sub_categories = Api::getInstance()
            ->public()
            //->redirectOnFailure('ErrorController@requestStatus')
            ->get(
                Config::get('web.config.api_uri_categories') .
                '/' . $category_identifier . '/sub_categories'
            );

        return response()->json($sub_categories, 200);
    }
}
