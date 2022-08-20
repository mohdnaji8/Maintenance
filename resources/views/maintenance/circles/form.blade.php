<div class="form-group">
    <label class="col-md-3 control-label"> الدائرة </label>
    <div class="col-md-3">
        <input type="text" name="name" class="form-control" placeholder="Enter text">
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">القسم </label>
    <div class="col-md-3">
        <select name="department_id" id="" style="width: 240px">
            <option value="">اختر القسم</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    {{ old('department_id', $circle->departmet_id) == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}</option>
            @endforeach
        </select>
    </div>
</div>
