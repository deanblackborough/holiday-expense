<?php

namespace App\Http\Controllers;

use App\Request\Api;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

class SummaryController extends BaseController
{
    protected $display_navigation = true;
    protected $display_add_expense = true;

    public function summary(Request $request)
    {
        $summary = Api::getInstance()
            ->public()
            ->redirectOnFailure('ErrorController@requestStatus')
            ->get(Config::get('web.config.api_uri_summary_categories_expanded'));

        return view(
            'summary',
            [
                'display_navigation' => $this->display_navigation,
                'display_add_expense' => $this->display_add_expense,
                'nav_active' => 'summary'
            ]
        );
    }
}
