<div class="form-group">
    <label for="">Название</label>
    <input type="text" class="form-control" name="name" placeholder="Название" value="{{$offer->name ?? ""}}">
</div>

<div class="form-group">
    <label for="">Процент</label>
    <input type="text" class="form-control" name="percent" placeholder="Процент" value="{{$offer->percent ?? ""}}">
</div>

<div class="form-group">
    <label for="">Минимальный срок</label>
    <input type="text" class="form-control" name="min_term" placeholder="Минимальный срок"
           value="{{$offer->min_term ?? ""}}">
</div>

<div class="form-group">
    <label for="">Требования</label>
    <textarea name="requirements" class="form-control" placeholder="Требования"
              value="{{$offer->requirements ?? ""}}"></textarea>
</div>

<div class="form-check">
    <input id="replenishment" type="checkbox" class="form-check-input" name="isReplenishment"
           value="{{$offer->isReplenishment ?? ""}}">
    <label for="replenishment">пополняемый</label>
</div>

<div class="form-check">
    <input id="withdrawal" type="checkbox" class="form-check-input" name="isWithdrawal"
           value="{{$offer->isWithdrawal ?? ""}}">
    <label for="withdrawal">возможность снятия</label>
</div>

<div class="form-check">
    <input id="capitalization" type="checkbox" class="form-check-input" name="isCapitalization"
           value="{{$offer->isCapitalization ?? ""}}">
    <label for="capitalization">капитализация</label>
</div>

<input type="hidden" name="type_id" value="{{$offer->type_id ?? ""}}">

<hr>

<input type="submit" class="btn btn-success" value="Сохранить">
