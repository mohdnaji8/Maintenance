<style>
    .verticalLine {
        border-right: 1px solid black;
        height: 300px;
    }
</style>
<div class="col-md-5">
    <form action="{{ route('admin.replies.store') }}" method="POST">
        @csrf
        <div class="row">
            <input type="hidden" id="order_id" name="order_id" value="{{ $order_id }}">
            <div class="form-group">
                <label class="col-md-2 control-label"> تم الانجاز </label>
                <div class="col-md-2">
                    <span>
                        <input name="done" checked onclick="valueChanged()" class="form-check-input" type="checkbox"
                            value="1" id="done">
                        تم الإنجاز
                    </span>
                </div>
            </div>
        </div>
        <div class="row ifcheckbox">
            <div class="form-group">
                <label class="col-md-2 control-label">نوع الصيانة </label>
                <div class="col-md-2">
                    <select name="maintenance_type" class="if_checkbox_value" id="maintenance_type1"
                        style="width: 215px">
                        <option value="">اختر نوع الصيانة</option>
                        <option value="طلب شراء" {{ $reply->floor_number == 'طلب شراء' ? 'selected' : '' }}>طلب شراء
                        </option>
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
                    <input type="text" name="foundation" class="form-control if_checkbox_value"
                        placeholder="Enter text" style="width: 215px" value="{{ $reply->foundation }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-2" id="main_submit" style="margin-top: 10px">
                <button type="submit" class="btn btn-large btn-lg btn-primary font-weight-bold">حفظ </button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-1 verticalLine"></div>
<div class="col-md-6" id="buy_order">
    <div class="header row">
        <div class="col-md-7">
            <h3>طلب شراء</h3>
        </div>
        <div class="col-md-5" style="margin-top: 30px">
            <div class="col-md-4">
                <input type="button" class="btn btn-default" value="اضافة عنصر جديد" onclick="addField();">
            </div>

            <div class="col-md-3"></div>
            <div class="col-md-5">
                <input type="button" class="btn btn-default" value="حفظ الطلب" onclick="buyOrderSubmit()">
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped table-hover table-bordered dataTable no-footer">
            <thead>
                <tr role="row">
                    <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                        style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                        id="seq" tabindex="0" class="sorting_asc">
                        العنصر
                    </th>
                    <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                        style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                        tabindex="0" class="sorting_asc">
                        الكمية
                    </th>
                    <th aria-label=" Username : activate to sort column descending" aria-sort="ascending"
                        style="width: 120px;" colspan="1" rowspan="1" aria-controls="sample_editable_1"
                        tabindex="0" class="sorting_asc">
                        السعر
                    </th>
                </tr>
            </thead>
            <form action="" id="buy-order-form">
                <tbody id="myTable">
                    <tr>
                        <td><input type="text" class="item0" name="item0"></td>
                        <td><input type="number" class="quantity0" name="quantity0"></td>
                        <td><input type="number" class="price0" name="price0"></td>

                    </tr>
                </tbody>
            </form>
        </table>
    </div>
</div>
<script src="{{ asset('') }}assets/jquery-3.0.0.js"></script>
<script>
    window.onload = function() {
        $("#buy_order").hide();

    }
    $("#maintenance_type1").change(function() {
        if ($(this).val() == "0") {
            $("#buy_order").hide();
            $("#main_submit").show();
        }
        if ($(this).val() == "طلب شراء") {
            $("#buy_order").show();
            $("#main_submit").hide();
        }
        if ($(this).val() == "عقد") {
            $("#buy_order").hide();
            $("#main_submit").show();

        }
        if ($(this).val() == "فاتورة") {
            $("#buy_order").hide();
            $("#main_submit").show();
        }
    });

    function buyOrderSubmit(argument) {
        var order_id = $('#order_id').val();
        var trcount = $('#myTable tr').length;
        var data = [];
        var i;
        for (i = 0; i < trcount; i++) {
            data[i] = [];
        }
        for (i = 0; i < trcount; i++) {
            data[i][0] = $('.item' + i).val();
            data[i][1] = $('.quantity' + i).val();
            data[i][2] = $('.price' + i).val();
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route('admin.buyorder.store') }}',
            type: "POST",
            data: {
                arr: data,
                order_id: order_id
            },
            success: function(response) {
                document.getElementById("myTable").innerHTML = "";
                $("#main_submit").show();
                toastr.success('تمت اضافة طلب الشراء بنجاح');
            },
            error: function(response) {
                $("#main_submit").show();
                document.getElementById("myTable").innerHTML = "";
                toastr.success('تم اضافة طلب الشراء بنجاح');
            }
        });
    }

    function addField(argument) {
        var myTable = document.getElementById("myTable");
        var currentIndex = myTable.rows.length;
        var currentRow = myTable.insertRow(-1);

        var linksBox = document.createElement("input");
        linksBox.setAttribute("name", "item" + currentIndex);
        linksBox.setAttribute("class", "item" + currentIndex);

        var keywordsBox = document.createElement("input");
        keywordsBox.setAttribute("name", "quantity" + currentIndex);
        keywordsBox.setAttribute("type", "number");
        keywordsBox.setAttribute("class", "quantity" + currentIndex);

        var violationsBox = document.createElement("input");
        violationsBox.setAttribute("name", "price" + currentIndex);
        violationsBox.setAttribute("type", "number");
        violationsBox.setAttribute("class", "price" + currentIndex);

        var addRowBox = document.createElement("input");
        addRowBox.setAttribute("type", "button");
        addRowBox.setAttribute("value", "Add another line");
        addRowBox.setAttribute("onclick", "addField();");
        addRowBox.setAttribute("class", "button");

        var currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(linksBox);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(keywordsBox);

        currentCell = currentRow.insertCell(-1);
        currentCell.appendChild(violationsBox);

    }

    function valueChanged() {
        if ($('#done').is(":checked")) {
            $(".ifcheckbox").show();
            $("#main_submit").show();
        } else {
            $(".ifcheckbox").hide();
            $(".if_checkbox_value").val('');
            $("#buy_order").hide();
            $("#main_submit").show();
        }
    }
</script>
