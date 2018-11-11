<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class SummaryController extends BaseController
{
    protected $display_navigation = true;
    protected $display_add_expense = true;

    public function summary(Request $request)
    {
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
