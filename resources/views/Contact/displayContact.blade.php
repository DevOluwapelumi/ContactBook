@extends('Contact.index')

@section('content')
<div class="container">
    {{-- {[id(Auth::user())]} --}}
    @if (Auth::user())
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped mt-5">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone Nos</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="col-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allcontact as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td> <div class="text-center">
                                <img src="/images/{{$contact->user_profile}}" alt="" style="max-width: 30px; height: auto; border-radius: 50%;">
                            </div></td>
                            <td>{{ $contact->full_name }}</td>
                            <td>{{ $contact->gender }}</td>
                            <td>{{ $contact->phone_number }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td>{{ $contact->updated_at }}</td>
                            <td>
                                <a href="/displaynote/delete/{{$contact->id}}"><button class="btn btn-danger">Delete</button></a>
                                <a href="/displaynote/edit/{{$contact->id}}"><button class="btn btn-success ms-3">Edit</button></a>
                              <a href="/viewnote/{{$contact->id}}"><button class="btn btn-primary ms-3">View Profile</button></a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                <div>You are currently logged out</div>
                <a href="/login" style="margin-left: 1rem;">Log in Here!</a>
            </div>
            @endif
            
        </div>
    </div>
</div>

@endsection