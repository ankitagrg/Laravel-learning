<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Title</title>
</head>

<body>
  <div class="container my-5 py-5">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($images as $image)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $image->title }}</td>
                <td><a target="_blank" href="{{ url('uploads/' . $image->image) }}"><img width="50"
                      src="{{ asset('uploads/' . $image->image) }}" alt=""></a></td>
                <td>
                  <a href="{{ route('images.edit', $image->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <form onsubmit="return confirm('Are you sure?')" action="{{ route('images.destroy', $image->id) }}"
                    method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
