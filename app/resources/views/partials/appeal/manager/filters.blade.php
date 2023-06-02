<div class="card mb-3">
    <form action="{{route('answer.list')}}" method="get">
        <div class="card-body">
            <h5 class="card-title mb-3">
                Всего обращений: {{ $appealsCount }}
            </h5>

            <div class="filters">
                <div class="input-group">
                    <input type="date" class="form-control" id="date_from" name="date_from" value="{{$dateFrom ?? null}}">
                    <span class="input-group-text"> - </span>
                    <input type="date" class="form-control" id="date_to" name="date_to" value="{{$dateTo ?? null}}">
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Применить фильтры</button>
            <button type="reset" class="btn btn-secondary">Очистить</button>
        </div>
    </form>
</div>
