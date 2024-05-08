<div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Admin-Categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" name="category_image" class="form-control" accept="image/*" id="input_scr" onchange="previewFile()">
                        @error('category_image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_en">Category Name (English)</label>
                                <input class="form-control" type="text" name="name_en" id="name_en" value="{{ $category->translate('en')->name }}" required>
                                @error("name_en")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_ar">Category Name (Arabic)</label>
                                <input class="form-control" type="text" name="name_ar" id="name_ar" value="{{ $category->translate('ar')->name }}" required>
                                @error("name_ar")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" id="name" class="form-control" placeholder="" value="{{ $category->slug }}" name="slug">
                                @error("slug")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div>
                                <input type="radio" name="type" id="radio2" class="radio" value="1" @if($category->parent_id == null) checked @endif />
                                <label for="radio2">Main Category</label>
                            </div>
                            @error("type")
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div>
                                <input type="radio" name="type" id="radio3" class="radio" value="2" @if($category->parent_id !== null) checked @endif/>
                                <label for="radio3">Sub-category</label>
                            </div>
                            @error("type")
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row col-md-12 @if($category->parent_id !== null) '' @else hidden @endif" id="cats_list">
                        <div class="col-md-12">
                            <label for="projectinput1">Select Main Category</label>
                            <select name="parent_id" class="select2 form-control">
                                <optgroup label="Please Select Main Category">
                                    @if($categories && $categories->count() > 0)
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" @if($cat->id == $category->parent_id) selected @endif>{{ $cat->name }}</option>
                                        @endforeach
                                    @endif
                                </optgroup>
                            </select>
                            @error('parent_id')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror
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
