@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">footer Setup </h4>
                        <hr>
                        <form method="POST" action="{{route('update.footer')}}">
                            @csrf

                            <input type="hidden" name="id" value="{{$footer->id}}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input name="phone" class="form-control" type="tel" value="{{$footer->phone}}" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <input name="short_description" class="form-control" type="text" value="{{$footer->short_description}}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input name="address" class="form-control" type="text" value="{{$footer->address}}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email Address</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" value="{{$footer->email}}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input name="facebook" class="form-control" type="text" value="{{$footer->facebook}}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input name="twitter" class="form-control" type="text" value="{{$footer->twitter}}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">copyright</label>
                                <div class="col-sm-10">
                                    <input name="copyright" class="form-control" type="text" value="{{$footer->copyright}}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update Footer">
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