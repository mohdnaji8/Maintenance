<div class="row">
    <div class="form-group">
        <label class="col-md-2 control-label">القسم الطالب للصيانة </label>
        <div class="col-md-2">
            <select name="requester_id" id="" style="width: 215px">
                <option value="">اختر القسم</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ old('requester_id', $order->requester_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="form-group">
        <label class="col-md-2 control-label">الدائرة </label>
        <div class="col-md-2">
            <select name="circle_id" id="" style="width: 215px">
                <option value="">اختر الدائرة</option>
                @foreach ($circles as $circle)
                    <option value="{{ $circle->id }}"
                        {{ old('circle_id', $order->circle_id) == $circle->id ? 'selected' : '' }}>
                        {{ $circle->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
<div class="row">
    <div class="form-group">
        <label class="col-md-2 control-label">اسم طالب الصيانة </label>
        <div class="col-md-2">
            <input type="text" name="employee" class="form-control" placeholder="Enter text"  style="width: 215px"
                value="{{ $order->employee }}">
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="form-group">
        <label class="col-md-2 control-label">تاريخ الطلب </label>
        <div class="col-md-2">
            <input type="date" value="{{ $order->date }}" name="date" class="form-control"
                placeholder="Enter text" style="width: 215px">
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label class="col-md-2 control-label">المبنى </label>
        <div class="col-md-2">
            <input type="number" name="building" value="{{ $order->building }}" class="form-control"  style="width: 215px"
                placeholder="Enter text">
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="form-group">
        <label class="col-md-2 control-label">رقم الطابق</label>
        <div class="col-md-2">
            <select name="floor_number" id="" style="width: 215px">
                <option value="">اختر الطابق</option>
                <option value="الأول" {{ $order->floor_number == 'الأول' ? 'selected' : '' }}>الأول</option>
                <option value="الثاني" {{ $order->floor_number == 'الثاني' ? 'selected' : '' }}>الثاني</option>
                <option value="الثالث" {{ $order->floor_number == 'الثالث' ? 'selected' : '' }}>الثالث</option>
                <option value="الرابع" {{ $order->floor_number == 'الرابع' ? 'selected' : '' }}>الرابع</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label class="col-md-2 control-label">رقم الغرفة</label>
        <div class="col-md-2">
            <input type="number" name="room_number" value="{{ $order->room_number }}" class="form-control"  style="width: 215px"
                placeholder="Enter text">
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"> نوع الصيانة</label>
        <div class="col-md-2">
            <select name="maintenance_type" id="" style="width: 215px">
                <option value="">اختر نوع الصيانة</option>
                <option value="تكييف" {{ $order->maintenance_type == 'تكييف' ? 'selected' : '' }}>تكييف</option>
                <option value="سباكة" {{ $order->maintenance_type == 'سباكة' ? 'selected' : '' }}>سباكة</option>
                <option value="كهرباء" {{ $order->maintenance_type == 'كهرباء' ? 'selected' : '' }}>كهرباء</option>
                <option value="هاتف" {{ $order->maintenance_type == 'هاتف' ? 'selected' : '' }}>هاتف</option>
                <option value="نجارة" {{ $order->maintenance_type == 'نجارة' ? 'selected' : '' }}>نجارة</option>
                <option value="دهان" {{ $order->maintenance_type == 'دهان' ? 'selected' : '' }}>دهان</option>
                <option value="مصعد" {{ $order->maintenance_type == 'مصعد' ? 'selected' : '' }}>مصعد</option>
                <option value="أخرى" {{ $order->maintenance_type == 'أخرى' ? 'selected' : '' }}>أخرى</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label class="col-md-2 control-label">رقم الهاتف </label>
        <div class="col-md-2">
            <input type="number" name="phone" value="{{ $order->phone }}" class="form-control"  style="width: 215px"
                placeholder="Enter text">
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="form-group">
        <label class="col-md-2 control-label">  فني الصيانة  </label>
        <div class="col-md-2">
            <select name="user_id" id="" style="width: 215px">
                <option value=""> اختر فني الصيانة   </option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                    {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
<div class="row">
    <div class="form-group col-md-5">
        <label class="col-md-2 control-label">الوصف </label>
        <textarea name="description" id="" cols="51" rows="5"> {{ $order->description }} </textarea>
    </div>
    <div class="col-md-1"></div>
    <div class="form-group col-md-2">
        <button type="submit"  class="btn btn-large btn-lg btn-primary font-weight-bold" style="margin-right: 250px; margin-top: 50px;">حفظ </button>
    </div>
</div>
