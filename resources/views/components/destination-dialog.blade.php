<div dir="rtl" class="modal fade" id="destinationModel" tabindex="-1" aria-labelledby="destinationModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">وجهة جديدة</h5>

                <button type="button" class="close absolute left-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form action="/destinations" method="post">

                <div class="modal-body">


                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="مكان الوجهة">
                    </div>


                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">اضافة</button>

                </div>

            </form>


        </div>
    </div>
</div>
