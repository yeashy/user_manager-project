<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class AppealController extends Controller
{
    public function list(): View
    {
        $appealsPage = request()->user()->appeals()->paginate(10);

        $message = Session::get('success');
        $error = Session::get('error');

        return view('pages.appeal.list')
            ->with([
                'appeals' => $appealsPage->items(),
                'currentPage' => $appealsPage->currentPage(),
                'totalPages' => $appealsPage->lastPage()
            ])
            ->with(compact('message', 'error'));
    }

    public function new(): View
    {
        return view('pages.appeal.show');
    }
}
