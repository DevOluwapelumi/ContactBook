@extends('Contact.index')

@section('content')
    
<div class="container">
    <div class="col-6 mx-auto shadow">
        <div class="shadow p-4 m-4">
            <h1 class="text-center text-info">Contact App</h1>
            <form action="/Contactapp_process" method="post">
                @csrf
                <input type="text" name="fullname" class="form-control my-3" placeholder="Enter Fullname">
                <input type="text" name="gender" class="form-control my-3" placeholder="Enter Gender">
                <input type="text" name="phonenumber" class="form-control my-3" placeholder="Enter Phone No">
                <input type="email" name="email" class="form-control my-3" placeholder="Enter Email">
                <input type="password" name="password" class="form-control my-3" placeholder="Enter Password">
                <textarea name="address" id="" cols="75" rows="5" placeholder="Enter Address"></textarea>
                <button type="submit" class="btn btn-primary w-100">Signup Here!</button>
            </form>
        </div>
    </div>
</div>
@endsection
