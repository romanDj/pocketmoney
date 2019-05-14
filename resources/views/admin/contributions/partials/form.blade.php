<div class="form-group">
    <label for="">Название</label>
    <input type="text" class="form-control" name="name" placeholder="Название" value="{{$credit->name ?? old('name') ?? ""}}">
</div>
@if( $errors->first('name'))
<p class="text-danger">{{ $errors->first('name') }}</p>
@endif
<div class="form-group">
    <label for="">Проценты</label>
    <input type="text" class="form-control" name="percent" placeholder="Проценты" value="{{$credit->percent ?? old('percent') ?? ""}}">
</div>
@if( $errors->first('percent'))
    <p class="text-danger">{{ $errors->first('percent') }}</p>
@endif
<div class="form-group">
    <label for="">Минимальный срок(мес.)</label>
    <input type="text" class="form-control" name="min_term" placeholder="Минимальный срок" value="{{$credit->min_term ?? old('min_term') ?? ""}}">
</div>
@if( $errors->first('min_term'))
    <p class="text-danger">{{ $errors->first('min_term') }}</p>
@endif
<div class="form-group">
    <label for="">Требуемые документы</label>
    <textarea class="form-control" name="requirements">{{$credit->requirements ?? old("requirements") ?? ""}}</textarea>
</div>
@if( $errors->first('requirements'))
    <p class="text-danger">{{ $errors->first('requirements') }}</p>
@endif
<hr>

<input type="submit" class="btn btn-success" value="Сохранить">
