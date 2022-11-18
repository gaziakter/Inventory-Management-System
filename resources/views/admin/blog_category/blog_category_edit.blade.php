@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit blog category </h4>
                        <hr>
                        <form method="POST" action="{{route('update.blog.category')}}">
                            @csrf

                            <input type="hidden" name="id" value="{{$BlogCategory->id}}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Edit Blog Name</label>
                                <div class="col-sm-10">
                                    <input name="blog_category" value="{{$BlogCategory->blog_category}}" class="form-control" type="text" id="example-text-input">
                                    @error('blog_category')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update Category">
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#input_profile_picture').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#show_picture').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
</script>

@endsection