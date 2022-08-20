<div class="form-row">
    <div class="form-group">
        <label class="col-md-3 control-label">القسم الطالب للصيانة </label>
        <div class="col-md-3">
            <select name="requester_id" id="" style="width: 240px">
                <option value="">اختر القسم</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ old('requester_id', $order->requester_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">الدائرة </label>
        <div class="col-md-3">
            <select name="circle_id" id="" style="width: 240px">
                <option value="">اختر الدائرة</option>
                @foreach ($circles as $circle)
                    <option value="{{ $circle->id }}"
                        {{ old('circle_id', $order->circle_id) == $circle->id ? 'selected' : '' }}>
                        {{ $circle->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">اسم طالب الصيانة </label>
        <div class="col-md-3">
            <input type="text" name="employee" class="form-control" placeholder="Enter text">
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group">
        <label class="col-md-3 control-label">تاريخ الطلب </label>
        <div class="col-md-3">
            <input type="date" name="date" class="form-control" placeholder="Enter text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">المبنى </label>
        <div class="col-md-3">
            <input type="number" name="building" class="form-control" placeholder="Enter text">
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">رقم الغرفة</label>
    <div class="col-md-3">
        <select name="floor_number" id="" style="width: 240px">
            <option value="">اختر الطابق</option>
            <option value="الأول" {{ $order->floor_number == 'الأول' ? 'selected' : '' }}>الأول</option>
            <option value="الثاني" {{ $order->floor_number == 'الثاني' ? 'selected' : '' }}>الثاني</option>
            <option value="الثالث" {{ $order->floor_number == 'الثالث' ? 'selected' : '' }}>الثالث</option>
            <option value="الرابع" {{ $order->floor_number == 'الرابع' ? 'selected' : '' }}>الرابع</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">رقم الغرفة</label>
    <div class="col-md-3">
        <input type="number" name="room_number" class="form-control" placeholder="Enter text">
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">نوع الصيانة </label>
    <div class="col-md-3">
        <input type="text" name="maintenance_type" class="form-control" placeholder="Enter text">
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">رقم الهاتف </label>
    <div class="col-md-3">
        <input type="number" name="phone" class="form-control" placeholder="Enter text">
    </div>
</div><br>

<div class="form-group" style="margin-right: 20px">
    <label class="col-md-3 control-label">الوصف </label>
    <textarea name="description" id="" cols="70" rows="7"></textarea>
</div>
