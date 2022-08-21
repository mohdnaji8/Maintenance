<div class="form-group">
    <label class="col-md-3 control-label"> القسم </label>
    <div class="col-md-3">
        <input type="text" name="name" class="form-control" placeholder="Enter text">
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">الدائرة </label>
    <div class="col-md-3">
        <select name="circle_id" id="" style="width: 240px">
            <option value="">اختر الدائرة</option>
            @foreach ($circles as $circle)
                <option value="{{ $circle->id }}"
                    {{ old('circle_id', $department->circle_id) == $circle->id ? 'selected' : '' }}>
                    {{ $circle->name }}</option>
            @endforeach
        </select>
    </div>
</div>
