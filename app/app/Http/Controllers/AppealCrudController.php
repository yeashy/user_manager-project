<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppealRequest;
use App\Models\Appeal;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AppealCrudController extends Controller
{
    public function create(CreateAppealRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $user->appeals()->create($request->validated());

        return redirect('/appeals')->with('success', 'Обращение успешно создано');
    }

    public function read(Appeal $appeal)
    {

    }

    public function update(CreateAppealRequest $request, Appeal $appeal): RedirectResponse
    {
        $appeal->update($request->validated());

        return redirect('/appeals')->with('success', 'Обращение успешно изменено');
    }

    public function delete(Appeal $appeal)
    {
        $appeal->delete();

        return redirect('/appeals')->with('success', 'Обращение успешно удалено');
    }
}
