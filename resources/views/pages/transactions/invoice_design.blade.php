<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bookstore | 2022</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('ui/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('ui/css/utilities.css') }}">
</head>
<body class="bg-light">
  
  <div class="container px-12 mt-3">
    <div class="p-3"></div>

    <div class="row main mb-1">
      <div class="col-md-12 mb-3">
        <h5 class="float-start font-semibold">{{ $title = 'Transaction Detail - '.$orders->id }}</h5>
      </div>

      <h6 class="float-start font-medium">Customer Detail</h6>
      <table class="table fs-normal table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col"># Transaction ID</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Order Date</th>
            <th scope="col">Comments</th>
            <th scope="col" class="text-center">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#{{ $orders->id }}</td>
            <td>{{ $orders->customer->name }}</td>
            <td>{{ $orders->order_date }}</td>
            <td>{{ $orders->comments }}</td>
            <td class="text-center">
              @if ($orders->status == 'unpaid')
                <span class="badge bg-badge-danger px-3 py-2 font-medium text-danger rad-6 fs-small">Unpaid</span>
              @else
                <span class="badge bg-badge-success px-3 py-2 font-medium color-primary rad-6 fs-small">Paid</span>
              @endif
            </td>
          </tr>
        </tbody>
      </table>

      <h6 class="float-start font-medium">Order Details</h6>
      <table class="table fs-normal table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">Book Name</th>
            <th scope="col">Qty x Price</th>
            <th scope="col">Discount</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($order_details as $item)
            <tr>
              <th scope="row" class="text-center">{{ $loop->iteration }}</th>
              <td>{{ $item->book->title }}</td>
              <td>{{ $item->qty.' x Rp. '.number_format($item->price) }}</td>
              <td>{{ $item->discount }}%</td>
              <td>Rp. {{ number_format($item->subtotal) }}</td>
            </tr>
          @endforeach
          <tr class="font-semibold">
            <th scope="col" class="text-center">#</th>
            <th style="text-align: right" scope="col" colspan="3">Total</th>
            <th scope="col">Rp. {{ number_format($total) }}</th>
          </tr>
        </tbody>
      </table>

    </div>
    <div class="p-3"></div>
    <footer>
      <p class="text-center fs-normal">&copy; 2022 All Rights Reserved | Bookstore 2022</p>
    </footer>
  </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>