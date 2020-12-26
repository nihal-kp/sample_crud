@extends("master")
@section("content")
<div class="container col-9">
    <table class="table">
    <tr>
        <th>Name:</th> <td>{{$user->name}}</td>
    </tr>
    <tr>
        <th>Age:</th> <td>{{$user->age}}</td>
    </tr>
    <tr>
        <th>Gender:</th> <td>{{$user->gender}}</td>
    </tr>
    <tr>
        <th>Email:</th> <td>{{$user->email}}</td>
    </tr>
    <tr>
        <th>Address:</th> <td>{{$user->address}}</td>
    </tr>
    <tr>
        <th>Ready to work:</th> <td>{{$user->ready_to_work}}</td>
    </tr>
    </table>
    <a class="btn btn-primary" href="/edit/{{$user['id']}}">Edit</a>
    <br> <br>
    <form method="POST" action="/delete/{{$user['id']}}">
        @csrf
        @method("DELETE")
        <button onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection