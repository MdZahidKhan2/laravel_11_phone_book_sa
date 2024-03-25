<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phone Book </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            @include('error')
            <div class="col-12">
                <h3>Update Contact</h3>
                <form class="form-group" action="{{ route('contactEdit',$contact->id) }}" method="POST">
                    @csrf {{-- {{ csrf_field() }} This is  anader Method  --}}
                    <input type="text" name="name" value="{{ $contact->name }}" class="form-control"><br>
                    <input type="email" name="email" value="{{ $contact->email }}" class="form-control"><br>
                    <input type="number" name="contact" value="{{ $contact->contact }}" class="form-control"><br>
                    <input type="submit" name="submit" value="Update Contact"
                        class="btn form-control btn-outline-primary">
                </form>
            </div>
        </div>



    </div>

</body>

</html>
