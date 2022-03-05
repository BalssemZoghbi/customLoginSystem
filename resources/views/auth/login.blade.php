<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h4>Login</h4>
                <hr>
                <form action="{{route('login-user')}}" method="post">
                @if(Session::has('success'))
                  <div class="alert alert-success">
                      {{Session::get('success')}}
                  </div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">
                      {{Session::get('fail')}}
                  </div>
                  @endif
                  @csrf
                <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter full email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="paasword">Password</label>
                        <input type="password" class="form-control" placeholder="Enter full Password" name="password" value="{{old('password')}}">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>

                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn brn-block btn-primary" type="submit">Login</button>
                   </div> 
                   <br>
            <a href="registration">New User !! Register Here.</a>
                </form>
            </div>
           
        </div>
    </div>
</body>
</html>