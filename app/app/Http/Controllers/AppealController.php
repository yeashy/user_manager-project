<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class AppealController extends Controller
{
    public function list(): View
    {
        $appealsPagination = request()->user()->appeals()->paginate(10);

        $message = Session::get('success');
        $error = Session::get('error');

        return view('pages.appeal.client.list')
            ->with([
                'appeals' => $appealsPagination->items(),
                'currentPage' => $appealsPagination->currentPage(),
                'totalPages' => $appealsPagination->lastPage()
            ])
            ->with(compact('message', 'error'));
    }

    public function new(): View
    {
        return view('pages.appeal.client.show');
    }
}
