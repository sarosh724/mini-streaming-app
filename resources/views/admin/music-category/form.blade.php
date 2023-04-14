<form action="{{url('admin/music-category-store/'.@$data->id)}}" method="post" class="form" id="music-category-form" name="music-category-form">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <label for="name" class="form-label">
                <span class="required">Name</span>
            </label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{@$data->name}}" required>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="field">
                    <button type="submit" class="btn btn-sm btn-primary "> <i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#music-category-form").validate({
            rules: {
                name: {
                    required: true
                },
            },
            submitHandler:function(form){
                return true;
            }
        });
    });

</script>
