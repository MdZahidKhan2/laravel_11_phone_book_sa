<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phone Book </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Navbar</a>
          <div class="d-flex">
            <a href="{{ route('logout') }}">{{ Auth::user()->name }}( Logout)</a>
          </div>
        </div>
      </nav>
        <div class="row">
            @if(session('success'))
            <li class="alert alert-success">{{ session('success') }}</li>
            @endif
            @include('error')
            <div class="col-12">
                <h3>Add Contact</h3>
                <form class="form-group" action="{{ route('creatContact') }}" method="POST">
                    @csrf {{-- {{ csrf_field() }} This is  anader Method  --}}
                    <input type="text" name="name" class="form-control"><br>
                    <input type="email" name="email" class="form-control"><br>
                    <input type="number" name="contact" class="form-control"><br>
                    <input type="submit" name="submit" value="Add Contact" class="btn form-control btn-outline-primary">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @forelse ($contacts as $key => $contact) 
                      <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>
                            <a href="{{ route('showEdit',$contact->id) }}">Update</a>
                            <a onclick="return confirm('Are You Sure?')" href="{{ route('ContactDelete',$contact->id) }}">Delete</a>
                        </td>
                      </tr>
                      @empty 
                        <tr>
                            <td class="text-center" colspan="5">No Data!</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                
            </div>
        </div>

    </div>
    
</body>
</html>