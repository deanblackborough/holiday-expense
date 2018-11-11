<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ExpenseController extends BaseController
{
    protected $display_navigation = true;

    public function addExpense(Request $request)
    {
        return view(
            'add-expense',
            [
                'display_navigation' => $this->display_navigation,
                'display_add_expense' => false,
                'nav_active' => 'add-expense'
            ]
        );
    }
}
