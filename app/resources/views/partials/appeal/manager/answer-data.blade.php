@php
    use App\Models\Answer;
    use App\Models\Appeal;
@endphp

@php
    /** @var Appeal $appeal */
    /** @var Answer $answer */
    $answer = $appeal->answer;
    $isNew = is_null($answer);
@endphp

<form action="/client-appeals/{{$appeal->id}}" method="post">
    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title">
                Ответ
            </h4>
            @csrf
            <div class="mb-3 form-floating">
                <textarea
                    class="form-control"
                    placeholder="Введите текст ответа..."
                    id="text"
                    name="text"
                    style="height: 100px"
                    @if(!$isNew)
                        disabled
                    @endif
                >{{ $isNew ? old('text') : $answer->text}}</textarea>
                <label for="text">Текст ответа</label>
                @if($errors->has('text'))
                    <span class="text-danger">
                        {{$errors->first('text')}}
                    </span>
                @endif
            </div>
        </div>
        <div class="card-footer d-flex @if($isNew) justify-content-between @else justify-content-end @endif ">
            @if($isNew)
                <button type="submit" class="btn btn-success">Ответить</button>
            @endif

            <a href="/client-appeals" class="btn btn-secondary">Вернуться к списку</a>
        </div>
    </div>
</form>
