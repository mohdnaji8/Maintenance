<div class="row">
    <input type="hidden" name="order_id" class="form-control" placeholder="Enter text"
        value="{{ $order_id }}">
    <div class="form-group">
        <label class="col-md-2 control-label"> تم الانجاز </label>
        <div class="col-md-2">
            <span>
                 <input name="done" checked onclick="valueChanged()" class="form-check-input" type="checkbox" value="1" id="done">
                 تم الإنجاز
            </span>
        </div>
    </div>
</div>
<div class="row ifcheckbox">
    <div class="form-group">
        <label class="col-md-2 control-label">نوع الصيانة </label>
        <div class="col-md-2">
            <select name="maintenance_type"  class="if_checkbox_value" id="" style="width: 215px">
                <option value="">اختر نوع الصيانة</option>
                <option value="طلب شراء" {{ $reply->floor_number == 'طلب شراء' ? 'selected' : '' }}>طلب شراء</option>
                <option value="عقد" {{ $reply->floor_number == 'عقد' ? 'selected' : '' }}>عقد</option>
                <option value="فاتورة" {{ $reply->floor_number == 'فاتورة' ? 'selected' : '' }}>فاتورة</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group ">
        <label class="col-md-2 control-label">الملاحظات </label>
    </div>
    <div class="form-group col-md-4">
        <textarea class="" name="noticies" id="" cols="41" rows="5"> {{ $reply->noticies }} </textarea>
    </div>
</div>
<div class="row ifcheckbox">
    <div class="form-group ">
        <label class="col-md-2 control-label">جهة التنفيذ </label>
        <div class="col-md-2">
            <input type="text" name="foundation" class="form-control if_checkbox_value" placeholder="Enter text" style="width: 215px"
                   value="{{ $reply->foundation }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-2" style="margin-top: 10px">
        <button type="submit" class="btn btn-large btn-lg btn-primary font-weight-bold">حفظ </button>
    </div>
</div>

<script>
        function valueChanged() {
            if($('#done').is(":checked"))
            {
                $(".ifcheckbox").show();
            }
            else
            {
                $(".ifcheckbox").hide();
                $(".if_checkbox_value").val('');
            }
        }
</script>
