<!DOCTYPE html>
<html>
<head>
    <title>Shorten Url</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <h1>Shorten Url</h1>
   
    <div class="card">
      <div class="card-header">
        <form method="POST" action="{{ route('generate.shorten.link.post') }}">
            @csrf
            <div class="input-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="Enter Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <input type="text" name="url" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Generate Shorten Url</button>
              </div>
            </div>
        </form>
      </div>
      <div class="card-body">
   
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
   
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Short</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shortLinks as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->url }}</td>
                            <td><a href="{{ route('shorten.link', $row->short) }}" target="_blank">{{ route('shorten.link', $row->short) }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
   
</div>
    
</body>
</html>