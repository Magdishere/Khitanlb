<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Admin-Categories.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name_en">Category Name (English)</label>
                            <input class="form-control" type="text" name="name_en" id="name_en" value="{{ old('name_en') }}" required>
                            @error("name_en")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="name_ar">اسم القسم (Arabic)</label>
                            <input class="form-control" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}" required>
                            @error("name_ar")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="slug">Slug</label>
                            <input type="text" id="slug" class="form-control" placeholder="Enter Slug" value="{{ old('slug') }}" name="slug">
                            @error("slug")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Category Image</label>
                            <input type="file" name="category_image" accept="image/*" class="form-control">
                            @error('category_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="radio" name="type" id="radio2" class="radio" value="1" checked/>
                            <label for="radio2">Main Category</label>
                            @error("type")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="radio" name="type" id="radio3" class="radio" value="2"/>
                            <label for="radio3">Sub-category</label>
                            @error("type")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3 hidden" id="cats_list">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="parent_id">Select Main Category</label>
                                <select name="parent_id" class="select2 form-control">
                                    <optgroup label="Please Select Main Category">
                                        @if($categories && $categories->count() > 0)
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('parent_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Coupon</button>
                </div>
            </form>
        </div>
    </div>
</div>
