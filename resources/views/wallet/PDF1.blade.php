<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Work Sans', sans-serif;
        }
    </style>
</head>

<body>
    {{-- <h1 class="text-center text-danger">{{ $title }}</h1>
    <p class="text-center">{{ $from }} - {{ $to }}</p> --}}
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody class="text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Payment Mode</th>
                    <th scope="col">Category</th>
                    <th scope="col">Account</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                </tr>
            </tbody>
            {{-- <tbody>
                @foreach ($data as $key => $income)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $income->mode }}</td>
                        <td>{{ $income['category_details']['name'] }}</td>

                        @if ($income['account_details'] != null)
                            <td>{{ $income['account_details']['account_name'] }}
                                ({{ $income['account_details']['account_number'] }})
                            </td>
                        @else
                            <td class="text-center">-</td>
                        @endif
                        <td>{{ $income->created_at->format('d-m-Y') }}</td>
                        <td>{{ $income->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="font-weight-bold">
                    <td colspan="5">Total Amount </td>
                    <td colspan="1">{{ $total }}</td>
                </tr>
            </tfoot> --}}
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
