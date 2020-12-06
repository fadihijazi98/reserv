<div dir="rtl" class="modal fade" id="passengerModel" tabindex="-1" aria-labelledby="passengerModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">معلومات راكب جديد</h5>

                <button type="button" class="close absolute left-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="/passenger" method="post">

                <div class="modal-body">


                    @csrf

                    <input hidden name="trip_id" id="trip_id" value="" />

                    <div class="form-group">
                        <input type="text" class="form-control" name="name"
                               placeholder="اسم الراكب" value="{{ auth()->guest() ? '' : auth()->user()->name }}">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="phone"
                               placeholder="رقم هاتف الراكب">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="address"
                               placeholder="العنوان">
                    </div>


                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-dark">قم بالحجز</button>

                </div>

            </form>


        </div>
    </div>
</div>
