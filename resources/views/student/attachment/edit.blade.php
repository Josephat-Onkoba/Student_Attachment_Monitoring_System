@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header - (Page-header)--->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Your Attachment details</h1>
                </div>
            </div>
        </div><!--/.container-fluid--->
    </section>
    <!---Main-content .-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!--left-column--->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="post" action="">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <h3>Company Information</h3>
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="companyname" value="{{$getRecord->company_name}}" required placeholder="Name of the Company">
                                </div>
                                <div class="form-group">
                                    <label>Company Type</label>
                                    <input type="text" class="form-control" name="companytype" value="{{$getRecord->company_type}}" required placeholder="Type of the Company">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="companylocation" value="{{$getRecord->location}}" placeholder="Location">
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="tel" class="form-control" name="companycontact" value="{{$getRecord->company_contacts}}" required placeholder="Contact">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="companyemail" value="{{$getRecord->company_email}}" required placeholder="Email Address">
                                </div>
                                <h3>Attachment Information</h3>
                                <div class="form-group">
                                    <label>Role/Position</label>
                                    <input type="text" class="form-control" name="attachmentrole" value="{{$getRecord->role}}" required placeholder="Role/Position">
                                </div>
                                <div class="form-group">
                                    <label>Duration Start</label>
                                    <input type="date" class="form-control" name="startduration" value="{{$getRecord->duration_start}}" required placeholder="When are you starting?">
                                </div>
                                <div class="form-group">
                                    <label>Duration End</label>
                                    <input type="date" class="form-control" name="endduration" value="{{$getRecord->duration_end}}" required placeholder="When are you completing?">
                                </div>
                                <h3>Company Supervisor Information</h3>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="firstname" value="{{$getRecord->supervisor_fname}}" required placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lastname" value="{{$getRecord->supervisor_lname}}" required placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" class="form-control" name="supervisorcontact" value="{{$getRecord->supervisor_phone}}" required placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <label>Email Address </label>
                                    <input type="email" class="form-control" name="supervisoremail" value="{{$getRecord->supervisor_email}}" required placeholder="Email Address">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.col (left) -->
            </div>
            <!--/.row -->
        </div><!--/.container-fluid -->
    </section>
    <!--/.content -->
</div>
@endsection