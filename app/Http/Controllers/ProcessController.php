<?php

namespace App\Http\Controllers;

use App\Request\Api;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

class ProcessController extends BaseController
{
    public function processAddExpense(Request $request)
    {
        $item = null;
        $item_category = null;
        $item_sub_category = null;

        $item = Api::getInstance()
            ->protected()
            //->redirectOnFailure('IndexController@recent')
            ->post(
                Config::get('web.config.api_uri_items'),
                [
                    'description' => $request->input('description'),
                    'effective_date' => $request->input('effective_date'),
                    'total' => $request->input('total'),
                    'percentage' => $request->input('percentage')
                ],
                'expense-not-added-item'
            );

        if ($item !== null) {
            $item_category = Api::getInstance()
                ->protected()
                //->redirectOnFailure('IndexController@recent')
                ->post(
                    Config::get('web.config.api_uri_items') . '/' .
                        $item['id'] . '/category',
                    [
                        'category_id' => $request->input('category_id')
                    ],
                    'expense-not-added-item-category'
                );
        }

        if ($item !== null && $item_category !== null) {
            $item_sub_category = Api::getInstance()
                ->protected()
                //->redirectOnFailure('IndexController@recent')
                ->post(
                    Config::get('web.config.api_uri_items') . '/' .
                        $item['id'] . '/category/' . $item_category['id'] .
                        '/sub_category',
                    [
                        'sub_category_id' => $request->input('sub_category_id')
                    ],
                    'expense-not-added-item-sub-category'
                );
        }

        if ($item !== null && $item_category !== null && $item_sub_category !== null) {
            $request->session()->flash('status', 'expense-added');
            return redirect()->action('SummaryController@summary');
        } else {
            $request->session()->flash('status', 'expense-not-added');
            return redirect()->action('SummaryController@summary');
        }
    }
}
