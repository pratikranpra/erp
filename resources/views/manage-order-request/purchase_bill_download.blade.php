<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Billing Invoice</title>
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
            <div>ORDER #{{ $manageOrder->bill_no }}</div>
            <div>Order Date: {{ (date('F jS Y', strtotime($manageOrder->order_date))); }}</div>
            <div>Delivery Date: {{ (date('F jS Y', strtotime($manageOrder->delivery_date))); }}</div>
          </td>
        </tr>
      </table>
      <p>Hello, {{ $manageOrder->getCustomerName() }}. Thank you for shopping from our store and for your order.</p>
    </div>

    <div class="section">
      <h3>Order Details</h3>
      <table>
        <thead>
          <tr>
            <th>Item</th>
            <th>Item Rate</th>
            <th>Quantity</th>
            <th>Item Custom Data</th>
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
          @foreach ($orderItemLists  as $key=>$single_order_item) 
            <tr>
              <td >{{ ucfirst($single_order_item->item_name) }}</td>
              <td class="text-right">{{ "₹".$single_order_item->order_item_rate }}</td>
              <td >{{ $single_order_item->order_item_qty }}</td>
              <td >
              @php
                  $total = $total + ($single_order_item->order_item_rate * $single_order_item->order_item_qty);
                  $single_total =  ($single_order_item->order_item_rate * $single_order_item->order_item_qty);
                  $attributes = json_decode($single_order_item->order_item_custom_data, true); 
                  @endphp
                  <ul>
                      @foreach($attributes as $attribute)
                          @foreach($attribute as $key => $value)
                              <li><strong>{{ ucfirst(strtolower($key)) }}</strong>: {{ $value }}</li>
                          @endforeach
                      @endforeach
                  </ul>
              </td>
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
          <td class="text-right">Shipping & Handling</td>
          <td class="text-right">{{  "₹".$manageOrder->charge }}</td>
        </tr>
        <tr>
          <td class="text-right"><strong>Grand Total (Incl. Tax)</strong></td>
          <td class="text-right"><strong>{{ "₹".$total +  $manageOrder->charge }}</strong></td>
        </tr>
      </table>
    </div>
    <div class="section">
      <table width="100%">
        <tr>
          <td>
            <strong>Shipping Information :</strong>
            <br>{{ $manageOrder->getShippingAddress() }}
          </td>
          <td>
            <strong>Shipping Method</strong><br>
            {{ ($manageOrder->shopping_mode == 1)?"Air":(($manageOrder->shopping_mode == 2)?"Road":(($manageOrder->shopping_mode == 3)?"Transport":"Other"))  }}
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
