<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BLL | dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

  </head>
  <body>

  <div class="table-responsive col-lg-8">

    <table id="myTable" class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Author</th>
          <th scope="col">Publisher</th>
          <th scope="col">Created at</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->publisher }}</td>
            <td>{{ $post->created_at }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
  <script>
   new DataTable('#myTable', {
    layout: {
        topStart: {
            buttons: ['print']
        }
    }
});

  </script>

