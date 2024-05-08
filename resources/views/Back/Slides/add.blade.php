<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Slide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin-slides.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Slide Image</label>
                        <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(this)">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        {{-- @if($slide->image)
                            <img id="image-preview" src="{{ asset('../admin-assets/uploads/images/slides/' . $slide->image) }}" style="width: 150px; height: 100px" alt="Slide Image">
                        @else
                            <img id="image-preview" style="width: 50px; height: 50px" alt="No Image">
                        @endif --}}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Title (English)</label>
                                <input class="form-control" type="text" name="title_en" id="title_en"  required>
                                @error("title_en")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Title (Arabic)</label>
                                <input class="form-control" type="text" name="title_ar" id="title_ar"  required>
                                @error("title_ar")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Description
                                </label>
                                <input class="form-control" type="text" name="description_en" id="description_en"  required>
                                @error("description_en")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">الوصف
                                </label>
                                <input class="form-control" type="text" name="description_ar" id="description_ar"  required>
                                @error("description_ar")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">Button Content
                                </label>
                                <input class="form-control" type="text" name="link_en" id="link_en"  required>
                                @error("link_en")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">محتوى الزر
                                </label>
                                <input class="form-control" type="text" name="link_ar" id="link_ar" required>
                                @error("link_ar")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Slide</button>
                </div>
            </form>
        </div>
    </div>
</div>
