<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #000000;
  color: white;
}
</style>
</head>
<body>

<h2>ERP System</h2>
<h4>Item Lits</h4>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>SKU</th>
    <th>Category Name</th>
    <th>Sub-Category Name</th>
    <th>Product Type</th>
    <th>RATE</th>
    <th>QTY</th>
    <th>GST</th>
  </tr>
  @foreach ($items as $key=>$item)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->sku }} </td>
        <td>{{ ucfirst($item->parent_category_name) }} </td>
        <td>{{ ucfirst($item->parent_subcategory_name) }} </td>
        <td>{{ ($item->product_type=="mfg")?"Manufacture":"Ready Made"  }} </td>
        <td>{{ $item->rate }} </td>
        <td>{{ $item->child_qty }} </td>
        <td>{{ $item->gst }} </td>
    </tr>
    @endforeach
</table>

</body>
</html>


