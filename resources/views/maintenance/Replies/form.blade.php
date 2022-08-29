<div class=" checkbox">
    <input name="done" @checked(true) class="form-check-input" type="checkbox" value="1"
        id="flexCheckIndeterminate">
    <label class="form-check-label" for="flexCheckIndeterminate">
        تم الانجاز
    </label>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">نوع الصيانة </label>
    <div class="col-md-2">
        <select name="maintenance_type" id="" style="width: 215px">
            <option value="">اختر نوع الصيانة</option>
            <option value="طلب شراء" {{ $reply->floor_number == 'طلب شراء"' ? 'selected' : '' }}>طلب شراء"</option>
            <option value="عقد" {{ $reply->floor_number == 'عقد' ? 'selected' : '' }}>عقد</option>
            <option value="فاتورة" {{ $reply->floor_number == 'فاتورة' ? 'selected' : '' }}>فاتورة</option>

        </select>
    </div>
</div>
<div class="form-group col-md-2">
    <button type="submit"  class="btn btn-large btn-lg btn-primary font-weight-bold" style="margin-right: 250px; margin-top: 50px;">حفظ </button>
</div>
