<!-- Modal -->
<div class="modal fade" id="edit{{ $coupon->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin-coupons.update', $coupon->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Code
                                </label>
                                <input class="form-control" type="text" name="code" id="code" placeholder="Enter Coupon Code" value="{{ $coupon->code }}" required>
                                @error("code")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Discount
                                </label>
                                <input class="form-control" type="number" name="discount" id="discount" placeholder="Add Discount Value" value="{{ $coupon->discount }}" required>
                                @error("discount")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Number of Uses
                                </label>
                                <input class="form-control" type="number" name="uses" id="uses" placeholder="Enter # of Uses" value="{{ $coupon->uses }}" required>
                                @error("uses")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Max # of Uses
                                </label>
                                <input class="form-control" type="number" name="max_uses" id="max_uses" placeholder="Max Number of Uses" value="{{ $coupon->max_uses }}" required>
                                @error("max_uses")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Max Value
                                </label>
                                <input class="form-control" type="text" name="max_value" placeholder="Enter Max Value" id="max_value" value="{{ $coupon->max_value }}" required>
                                @error("max_value")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Expiary Date
                                </label>
                                <input class="form-control" type="datetime-local" name="expires_at" id="expires_at" value="{{ $coupon->expires_at }}" required>
                                @error("expires_at")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
