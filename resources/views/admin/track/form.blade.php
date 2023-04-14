<form action='{{url('admin/track-store')}}/{{@$data->id}}' method="post" name="track-form" id="track-form" enctype='multipart/form-data'>
    @csrf

    <div class="row ">
        <div class="form-group col-md-12">
            <label for="documents" class="form-label mb-1">
                <span class="required">
                    Title
                </span>
            </label>
           <input type="text" class="form-control" name="title" id="title" value="{{@$data->title}}">
            <label id="category-error" class="error" for="title" style="display: none"></label>
        </div>
        <div class="form-group col-md-12">
            <label for="documents" class="form-label mb-1">
                <span class="required">
                    Select Music Category
                </span>
            </label>
            <select class="form-control select2" id="category" name="category">
                <option value="">Select Category</option>
                @foreach($musicCategories as $category)
                    <option value="{{$category->id}}" {{$category->id == @$data->music_category_id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
            <label id="category-error" class="error" for="category" style="display: none"></label>
        </div>
    </div>

    <div class="form-group col-md-12">
        <label for="documents" class="form-label mb-1">
                <span class="required">
                    Track File
                </span>
        </label>
        <input type="file" class="form-control" name="track_file" id="track_file" accept="audio/mp3,video/mp4">
        <label id="category-error" class="error" for="track_file" style="display: none"></label>
    </div>

    <div class="form-group col-md-12">
        <label for="documents" class="form-label mb-1">
                <span class="required">
                    Track Thumbnail
                </span>
        </label>
        <input type="file" class="form-control" name="track_thumbnail" id="track_thumbnail" accept="image/png, image/jpg, image/jpeg">
        <label id="category-error" class="error" for="track_thumbnail" style="display: none"></label>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="field">
                <button type="submit" class="btn btn-sm btn-success btn-save">Save</button>
            </div>
        </div>
    </div>


</form>

<script>
    $("#track-form").validate({
        rules: {
            title: {
                required: true
            },
            category: {
                required: true
            },
            track_file: {
                required: true
            },
            track_thumbnail: {
                required: true
            },
        },
        messages: {
            title: {
                required: 'Title is required'
            },
            category: {
                required: 'Select a category'
            },
            track_file: {
                required: 'Choose a file'
            },
            track_thumbnail: {
                required: 'Choose a file'
            },
        },

        {{--submitHandler: function(form) {--}}

        {{--    var formData = new FormData();--}}
        {{--    formData.append('music_category_id', $('select#category option:selected').val());--}}
        {{--    formData.append('title', $('#title').val());--}}

        {{--    formData.append("track_file", $('track_file').files[0]);--}}
        {{--    formData.append("track_thumbnail", $('track_thumbnail').files[0]);--}}

        {{--    $.blockUI();--}}

        {{--    $.ajax({--}}
        {{--        url: '{{url("admin/track-store")}}',--}}
        {{--        type: "POST",--}}
        {{--        cache: false,--}}
        {{--        processData: false,--}}
        {{--        data: formData,--}}
        {{--        contentType: false,--}}
        {{--        success: function(res) {--}}
        {{--            $.unblockUI();--}}
        {{--            if (res.success = 1) {--}}
        {{--                Swal.fire('Success', 'Document Saved', 'success')--}}
        {{--                setTimeout(function() {--}}
        {{--                    window.location.reload();--}}
        {{--                }, 1000);--}}
        {{--            } else {--}}
        {{--                Swal.fire('Error', 'Document Not Saved', 'error')--}}
        {{--            }--}}
        {{--        },--}}
        {{--        error: function(error) {--}}
        {{--            $.unblockUI();--}}
        {{--        }--}}
        {{--    });--}}

        {{--}--}}
    });

</script>
