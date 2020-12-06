<div dir="rtl" class="modal fade" id="driverModel" tabindex="-1" aria-labelledby="driverModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">سائق جديد</h5>

                <button type="button" class="close absolute left-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="/drivers" method="post" enctype="multipart/form-data">

                <div class="modal-body">


                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="اسم السائق">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="رقم هاتفه">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="city" placeholder="مدينته">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="vehicle_capacity" placeholder="عدد الركاب لمركبته">
                    </div>

                    <div class="form-group text-right">

                        <label class="btn btn-outline-primary" for="imgInp">
                            <input id="imgInp" type="file" style="display:none;" name="img">
                            <span id="image">اختر صورة شخصيه ل السائق</span>
                        </label>

                        <div class="w-32 h-32 flex justify-content-center items-center border-dashed border-2 border-gray-400">
                            <img id="blah" src="/user.jpeg" alt="your image" class="w-32 h-32 rounded-full p-2" />
                        </div>


                    </div>



                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">اضافة</button>

                </div>

            </form>


        </div>
    </div>
</div>
