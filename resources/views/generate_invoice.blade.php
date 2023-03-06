<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Home Shine</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{$data['invoice']->id}}</span> <br>
                    <span>Date: {{$data['invoice']->created_at}}</span> <br>
                    <span>Zip code : {{$data['invoice']->zip}}</span> <br>
                    <span>Address: #{{$data['invoice']->address . ',' .$data['invoice']->city}}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{$data['invoice']->id}}</td>
                

                <td>Full Name:</td>
                <td>{{$data['user']->name}}</td>
            </tr>
            <tr>

                <td>Email Id:</td>
                <td>{{$data['invoice']->email}}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{$data['invoice']->created_at}}</td>

                <td>Phone:</td>
                <td>{{$data['invoice']->phone}}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>Cash on Delivery</td>

                <td>Address:</td>
                <td>{{$data['invoice']->address . ',' .$data['invoice']->city}}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{$data['invoice']->status}}</td>

                
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Sku</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['orderDetail'] as $product)
           
            <tr>
                <td width="10%">{{$product->product_id}}</td>
                <td width="10%">{{$product->sku}}</td>
                <td width="10%">{{$product->singlePrice}}</td>
                <td width="10%">{{$product->quantity}}</td>
                <td width="15%" class="fw-bold">{{$product->singlePrice * $product->quantity}}</td>
                
            </tr>
            @endforeach
           
            <tr>
                
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">{{$data['total'] }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with Home Shine
    </p>

</body>
</html>