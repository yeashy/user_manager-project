<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Contracts\View\View;
class AppealController extends Controller
{
    public function list(): View
    {
        $appeals = Appeal::query()->get();

        return view('pages.appeal.list')
            ->with(compact('appeals'));
    }

    public function new(): View
    {
        return view('pages.appeal.show');
    }
}
