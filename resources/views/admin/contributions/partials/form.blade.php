<div class="form-group">
    <label for="">Название</label>
    <input type="text" class="form-control" name="name" placeholder="Название" value="{{$contribution->name ?? old('name') ?? ""}}">
</div>
@if( $errors->first('name'))
<p class="text-danger">{{ $errors->first('name') }}</p>
@endif
<div class="form-group">
    <label for="">Проценты</label>
    <input type="text" class="form-control" name="percent" placeholder="Проценты" value="{{$contribution->percent ?? old('percent') ?? ""}}">
</div>
@if( $errors->first('percent'))
    <p class="text-danger">{{ $errors->first('percent') }}</p>
@endif
<div class="form-group">
    <label for="">Минимальный срок(мес.)</label>
    <input type="text" class="form-control" name="min_term" placeholder="Минимальный срок" value="{{$contribution->min_term ?? old('min_term') ?? ""}}">
</div>
@if( $errors->first('min_term'))
    <p class="text-danger">{{ $errors->first('min_term') }}</p>
@endif


@if(isset($contribution))
<div class="form-check">
    <input id="replenishment" type="checkbox" class="form-check-input" name="isReplenishment"
           value="1"
            {{ $contribution->isReplenishment   ? 'checked' : '' }}>
    <label for="replenishment">пополняемый</label>
</div>

<div class="form-check">
    <input id="withdrawal" type="checkbox" class="form-check-input" name="isWithdrawal"
           value="1"
            {{$contribution->isWithdrawal   ? 'checked' : '' }}>
    <label for="withdrawal">возможность снятия</label>
</div>

<div class="form-check">
    <input id="capitalization" type="checkbox" class="form-check-input" name="isCapitalization"
           value="1"
            {{$contribution->isCapitalization ? 'checked' : ''}}>
    <label for="capitalization">капитализация</label>
</div>

@else
    <div class="form-check">
        <input id="replenishment" type="checkbox" class="form-check-input" name="isReplenishment"
               value="1"
                {{ old('isReplenishment')  ? 'checked' : '' }}>
        <label for="replenishment">пополняемый</label>
    </div>

    <div class="form-check">
        <input id="withdrawal" type="checkbox" class="form-check-input" name="isWithdrawal"
               value="1"
                {{ old('isWithdrawal')  ? 'checked' : '' }}>
        <label for="withdrawal">возможность снятия</label>
    </div>

    <div class="form-check">
        <input id="capitalization" type="checkbox" class="form-check-input" name="isCapitalization"
               value="1"
                {{ old('isCapitalization')  ? 'checked' : '' }}>
        <label for="capitalization">капитализация</label>
    </div>
@endif
<hr>

<input type="submit" class="btn btn-success" value="Сохранить">
