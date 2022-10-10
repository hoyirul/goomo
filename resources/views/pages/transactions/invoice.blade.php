<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bookstore | 2022</title>
  <style>
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');  */

    body{
      font-family: sans-serif;
      padding: 10px;
    }

    .text-center{
      text-align: center;
    }

    table{
      border: 1px solid #eee;
      border-collapse: collapse;
      width: 100%
    }

    th{
      font-family: sans-serif;
      padding: 10px;
      font-size: 10pt;
      text-align: left;
      border: 1px solid #eee;
    }

    td{
      padding: 10px;
      font-size: 10pt;
      border: 1px solid #eee;
    }

    .container{
      width: 100%;
    }

    .badge{
      padding: 2px 8px;
      border-radius: 0px;
      font-family: sans-serif;
      font-size: 6pt;
    }

    .bg-badge-success{
        background-color: #cbeae4 !important;
    }

    .bg-badge-grey{
        background-color: #e3e3e3 !important;
    }

    .bg-badge-danger{
        background-color: #f4d5d8 !important;
    }

    .bg-badge-info{
        background-color: #caefff !important;
    }

    .font-medium{
      font-family: sans-serif;
      font-size: 10pt;
    }

    .font-semibold{
      font-family: sans-serif;
    }
  </style>
</head>
<body>
  
  <div class="container">

    <div class="row main mb-1">
      <div class="col-md-12 mb-3">
        <p class="float-start font-semibold">{{ $title = 'Transaction Detail - '.$orders->id }}</p>
      </div>

      <p class="float-start font-medium">Customer Detail :</p>
      <table border="1" class="table fs-normal table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col"># Transaction ID</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Order Date</th>
            <th scope="col">Comments</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#{{ $orders->id }}</td>
            <td>{{ $orders->customer->name }}</td>
            <td>{{ $orders->order_date }}</td>
            <td>{{ $orders->comments }}</td>
            <td style="text-align: center">
              @if ($orders->status == 'unpaid')
                <span style="color: #dc3545" class="badge bg-badge-danger px-3 py-2 font-medium text-danger rad-6 fs-small">Unpaid</span>
              @else
                <span style="color: #54a591" class="badge bg-badge-success px-3 py-2 font-medium color-primary rad-6 fs-small">Paid</span>
              @endif
            </td>
          </tr>
        </tbody>
      </table>

      <p class="float-start font-medium">Order Details :</p>
      <table border="1" class="table fs-normal table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col" class="text-center" style="width: 50px">#ID</th>
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
            <th style="font-weight: bold" scope="col">Rp. {{ number_format($total) }}</th>
          </tr>
        </tbody>
      </table>

    </div>
    <br>
    <div class="p-3"></div>
    <footer style="text-align: center; font-size: 10pt">
      <p style="color: gray" class="text-center fs-normal">&copy; 2022 All Rights Reserved | Bookstore 2022</p>
    </footer>
  </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>