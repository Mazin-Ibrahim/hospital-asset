<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <table>
     <thead>
      <tr>
        <th style="padding:20px; margin: 20px; border: 1px solid">By any User</th>
        <th style="padding:20px; margin: 20px; border: 1px solid">Asset Name</th>
        <th style="padding:20px; margin: 20px; border: 1px solid">Opreation Type</th>
        <th style="padding:20px; margin: 20px; border: 1px solid">Quantity</th>
        <th style="padding:20px; margin: 20px; border: 1px solid">Date</th>
        
      </tr>
     </thead>
     <tbody>
      @foreach($trans as $tran)
      <tr>
        <td style="padding:20px; margin: 20px;">{{ $tran->user->name }}</td>
        <td style="padding:20px; margin: 20px;"> {{ $tran->asset->name }}</td>
        <td style="padding:20px; margin: 20px;"> {{ $tran->operation() }} </td>
        <td style="padding:20px; margin: 20px;"> {{ $tran->quantity }} </td>
        <td style="padding:20px; margin: 20px;"> {{ $tran->date }}</td>
      </tr>
      @endforeach
     </tbody>
  </table>
</body>
</html>