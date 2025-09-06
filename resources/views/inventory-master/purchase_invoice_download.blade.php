<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>{{  $in_out_type_text_display??"N/A" }}</title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      font-size: 12px;
      background: #fff;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 100%;
      max-width: 700px;
      margin: 0 auto;
      padding: 20px;
    }
    .header,
    .section,
    .footer {
      border: 1px solid #ccc;
      margin-bottom: 20px;
      padding: 15px;
    }
    .section table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    .section table th,
    .section table td {
      border: 1px solid #ddd;
      padding: 8px;
    }
    .section table th {
      background: #f9f9f9;
    }
    .text-right {
      text-align: right;
    }
    .title {
      font-size: 18px;
      font-weight: bold;
      color: #d00;
    }
  </style>
</head>
<body>
  <div class="container">

    <div class="header">
      <table width="100%">
        <tr>
          <td>
            <h2>ERP System</h2>
          </td>
          <td class="text-right">
            <div class="title">Invoice</div>
            <div>ORDER #{{ $inventory_data->id }}</div>
            <div>Date: {{ (date('F jS Y', strtotime($inventory_data->order_date))); }}</div>
            <div>Address: 20 Cooper Square, New York, NY 10003, USA</div>
          </td>
        </tr>
      </table>
      <p>Hello, Dear</p>
    </div>

    <div class="section">
      <h3>Order Details</h3>
      <table>
        <thead>
          <tr>
            <th>Item</th>
            <th>Item Rate</th>
            <th>Quantity</th>
            <th class="text-right">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <td>Beats Studio Over-Ear Headphones</td>
            <td>MH792AM/A</td>
            <td>1</td>
            <td class="text-right">$299.95</td>
            <td class="text-right">$299.95</td>
          </tr> -->
          @php $total = 0 @endphp
          @foreach ($item_data  as $key=>$single_item) 
          @php $single_total = 0; @endphp
            <tr>
              <td >{{ ucfirst($single_item->name) }}</td>
              <td class="text-right">{{ "₹".$single_item->rate }}</td>
              <td >{{ $inventory_data->qty }}</td>
              
              @php
                  $total = $total + ($single_item->rate * $inventory_data->qty);
                  $single_total =  ($single_item->rate * $inventory_data->qty);
              @endphp
              <td class="text-right">{{  "₹".$single_total }}</td>
          </tr>  
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="section">
      <h3>Summary</h3>
      <table>
        <tr>
          <td class="text-right">Subtotal</td>
          <td class="text-right">{{ "₹".$total }}</td>
        </tr>
        <tr>
          <td class="text-right">Vat Tax</td>
          <td class="text-right">{{  "₹. 0.0" }}</td>
        </tr>
        <tr>
          <td class="text-right"><strong>Grand Total (Incl. Tax)</strong></td>
          <td class="text-right"><strong>{{ "₹".$total }}</strong></td>
        </tr>
      </table>
    </div>
    <div class="section">
      <table width="100%">
        <tr>
          <td>
            <strong>Invoice Type :</strong>
            <br>{{ $in_out_type_text_display??"N/A" }}
          </td>
        </tr>
      </table>
    </div>

    <div class="footer">
      <p>Have a nice day.</p>
    </div>

  </div>
</body>
</html>
