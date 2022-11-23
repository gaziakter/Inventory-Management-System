@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Show Message </h4>
                        <hr>
                            <div class="row">
                                <div class="col-md-2">Name</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-9"><p>{{$ShowMessage->name}}</p></div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-2">Email</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-9"><p>{{$ShowMessage->email}}</p></div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-2">Subject</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-9"><p>{{$ShowMessage->subject}}</p></div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-2">Mobile Number</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-9"><p>{{$ShowMessage->phone}}</p></div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-2">Message</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-9"><p>{{$ShowMessage->message}}</p></div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-2">Time</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-9"><p>{{Carbon\Carbon::parse($ShowMessage->created_at)->diffForHumans()}}</p></div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-9"><a href="{{route('delete.message', $ShowMessage->id)}}" class="btn btn-danger sm" title="Edit Data">Delete</i></a></div>
                            </div>
                            <!-- end row -->
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