@extends("master")
@section("content")
<div class="container col-9 col-md-7 col-lg-7 center">
    <form action="/update/{{$user['id']}}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" value="{{$user->name}}" name="name" id="" required>
            @error("name")
            <p style="color:red">{{$errors->first("name")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Age:</label>
            <input type="text" class="form-control" placeholder="Enter age" name="age" value="{{$user->age}}" required>
            @error("age")
            <p style="color:red">{{$errors->first("age")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" class="custom-select">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{$user->email}}" required>
            @error("email")
            <p style="color:red">{{$errors->first("email")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" placeholder="Enter address" name="address" rows="4" required>{{$user->address}}</textarea>
        </div>
        <div class="form-group">
            <label for="communication">Ready to work ?</label>
            <div class="form-check">
                <label class="form-check-label" for="yes">
                    <input type="radio" class="form-check-input" name="ready" value="yes" checked>Yes
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="no">
                    <input type="radio" class="form-check-input" name="ready" value="no">No
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-success mx-3">Update</button>
        <a class="btn btn-primary mx-3" href="/view">Go back</a>
    </form>
</div>
@endsection