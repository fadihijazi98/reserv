<div dir="rtl" class="modal fade" id="cardModel" tabindex="-1" aria-labelledby="cardModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">رحلة جديده</h5>

                <button type="button" class="close absolute left-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="/cards" method="post">
                @csrf

                <div class="modal-body">


                    <div class="form-group" dir="ltr">
                        <p class="font-semibold text-gray-700 text-sm text-right p-2">حدد يوم الحجز</p>
                        <select class="custom-select" name="card" required>

                            <option value="0">بطاقة ل اليوم</option>
                            <option value="1">بطاقة  ل  الغد</option>
                            <option value="2">بطاقة ل بعد الغد</option>

                        </select>


                    </div>


                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">حجز</button>

                </div>

            </form>


        </div>
    </div>
</div>
