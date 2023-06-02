<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListAnswerRequest;
use App\Models\Appeal;
use App\Models\Permission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnswerController extends Controller
{
    public function listAppeals(ListAnswerRequest $request): View
    {
        $appealsQuery = Appeal::query();

        $dateFrom = $request->get('date_from');
        $dateTo = $request->get('date_to');

        if ($dateFrom) $appealsQuery = $appealsQuery->whereDate('created_at', '>=', $dateFrom);

        if ($dateTo) $appealsQuery = $appealsQuery->whereDate('created_at', '<=', $dateTo);

        $appealsPagination = $appealsQuery->paginate(10);

        $message = Session::get('success');
        $error = Session::get('error');

        return view('pages.appeal.manager.list')
            ->with([
                'appeals' => $appealsPagination->items(),
                'appealsCount' => $appealsQuery->count(),
                'currentPage' => $appealsPagination->currentPage(),
                'totalPages' => $appealsPagination->lastPage()
            ])
            ->with(compact('message', 'error', 'dateFrom', 'dateTo'));
    }
}
