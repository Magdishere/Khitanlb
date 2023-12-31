<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/carssection_trans.Add Section')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Admin-categories.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('Dashboard/carssection_trans.Car Type')}}</label>
                    <input type="text" name="type" class="form-control">
                    <label for="exampleInputPassword1">{{trans('Dashboard/carssection_trans.Description')}}</label>
                    <input type="text" name="description" class="form-control">
                    <label for="exampleInputPassword1">{{trans('Dashboard/carssection_trans.Number Of Cars')}}</label>
                    <input type="text" name="num_of_cars" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/carssection_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/carssection_trans.Save Changes')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
