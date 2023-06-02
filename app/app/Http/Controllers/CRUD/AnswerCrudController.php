<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAnswerRequest;
use App\Models\Appeal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AnswerCrudController extends Controller
{
    public function read(int $appealId): View|RedirectResponse
    {
        $appeal = Appeal::query()->with('answer')->find($appealId);

        if (!$appeal) {
            return redirect('/client-appeals')->with('error', 'Обращение не найдено');
        }

        return view('pages.appeal.manager.show')
            ->with(compact('appeal'));
    }

    public function create(CreateAnswerRequest $request, int $appealId): RedirectResponse
    {
        /** @var Appeal $appeal */
        $appeal = Appeal::query()->with('answer')->with('user')->find($appealId);

        if (!$appeal) {
            return redirect('/client-appeals')->with('error', 'Обращение не найдено');
        }

        if (!is_null($appeal->answer)) {
            return redirect('/client-appeals')->with('error', 'У данного обращения уже есть ответ');
        }

        $appeal->answer()->create($request->validated());

        return redirect('/client-appeals')->with('success', 'Ответ успешно поставлен на отправку');
    }
}
