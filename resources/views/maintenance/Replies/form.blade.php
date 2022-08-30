<div class="row">
    <input type="hidden" name="order_id" class="form-control" placeholder="Enter text" style="width: 215px"
        value="{{ $order_id }}">
    <div class=" checkbox">
        <input name="done" {{ $reply->done ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1"
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
</div>
<div class="row">
    <div class="form-group col-md-5">
        <label class="col-md-2 control-label">الملاحظات </label>
        <textarea name="noticies" id="" cols="51" rows="5"> {{ $reply->noticies }} </textarea>
    </div>
    <div class="form-group col-md-5">
        <label class="col-md-2 control-label">جهة التنفيذ </label>
        <input type="text" name="foundation" class="form-control" placeholder="Enter text" style="width: 215px"
            value="{{ $reply->foundation }}">
    </div>
</div>
<div class="form-group col-md-2">
    <button type="submit" class="btn btn-large btn-lg btn-primary font-weight-bold"
        style="margin-right: 250px; margin-top: 50px;">حفظ </button>
</div>
