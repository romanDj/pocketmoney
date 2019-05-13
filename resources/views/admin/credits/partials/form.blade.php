<div class="form-group">
    <label for="">Название</label>
    <input type="text" class="form-control" name="name" placeholder="Название" value="{{$credit->name ?? ""}}">
</div>

<div class="form-group">
    <label for="">Проценты</label>
    <input type="text" class="form-control" name="percent" placeholder="Проценты" value="{{$credit->percent ?? ""}}">
</div>

<div class="form-group">
    <label for="">Минимальный срок(мес.)</label>
    <input type="text" class="form-control" name="min_term" placeholder="Минимальный срок" value="{{$credit->min_term ?? ""}}">
</div>

<div class="form-group">
    <label for="">Требуемые документы</label>
    <textarea class="form-control" name="requirements">{{$credit->requirements ?? ""}}</textarea>
</div>

<hr>

<input type="submit" class="btn btn-success" value="Сохранить">
