<div dir="rtl" class="modal fade" id="tripModel" tabindex="-1" aria-labelledby="tripModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">رحلة جديده</h5>

                <button type="button" class="close absolute left-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="/trips" method="post">
                @csrf

                <div class="modal-body">


                    <div class="form-group">

                        <p class="font-semibold text-gray-700 text-sm text-right p-2">السنة - اليوم - الشهر</p>
                        <input type="date" class="form-control" name="date"/>

                    </div>

                    <div class="form-group">

                        <p class="font-semibold text-gray-700 text-sm text-right p-2">ساعة الانطلاق</p>
                        <input type="time" class="form-control" id="appt" name="hour"
                               required>

                    </div>

                    <div class="form-group" dir="ltr">

                        <p class="font-semibold text-gray-700 text-sm text-right p-2">سائق  الرحلة</p>

                        <select class="custom-select" name="id_driver">

                            <option selected>اختر سائقاً</option>
                            @foreach($drivers as $driver)
                                <option value="{{$driver->id}}">{{$driver->name}}</option>
                            @endforeach

                        </select>


                    </div>

                    <div class="form-group" dir="ltr">
                        <p class="font-semibold text-gray-700 text-sm text-right p-2">وجهة الرحلة</p>
                        <select class="custom-select" name="id_destination">
                            <option selected>اختر الوجهه</option>
                            @foreach($destinations as $destination)
                                <option value="{{$destination->id}}">{{$destination->description}}</option>
                            @endforeach
                        </select>


                    </div>


                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">اضافة</button>

                </div>

            </form>


        </div>
    </div>
</div>
