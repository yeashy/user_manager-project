<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAppealRequest;
use App\Models\Appeal;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class AppealCrudController extends Controller
{
    public function create(CreateAppealRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $user->appeals()->create($request->validated());

        return redirect('/appeals')->with('success', 'Обращение успешно создано');
    }

    public function read(int $id)
    {
        $appeal = Appeal::query()->find($id);

        if (!$appeal) {
            return redirect('/appeals')->with('error', 'Обращение не найдено');
        }

        if (!request()->user()->appeals->contains($appeal)) {
            return redirect('/appeals')->with('error', 'У вас нет прав на просмотр этого обращения');
        }

        return view('pages.appeal.show')->with(compact('appeal'));
    }

    public function update(CreateAppealRequest $request, int $id): RedirectResponse
    {
        $appeal = Appeal::query()->find($id);

        if (!$appeal) {
            return redirect('/appeals')->with('error', 'Обращение не найдено');
        }

        if (!request()->user()->appeals->contains($appeal)) {
            return redirect('/appeals')->with('error', 'У вас нет прав на редактирование этого обращения');
        }

        $appeal->update($request->validated());

        return redirect('/appeals')->with('success', 'Обращение успешно изменено');
    }

    public function delete(int $id): RedirectResponse
    {
        $appeal = Appeal::query()->find($id);

        if (!$appeal) {
            return redirect('/appeals')->with('error', 'Обращение не найдено');
        }

        if (!request()->user()->appeals->contains($appeal)) {
            return redirect('/appeals')->with('error', 'У вас нет прав на удаление этого обращения');
        }

        $appeal->delete();

        return redirect('/appeals')->with('success', 'Обращение успешно удалено');
    }
}
