<center><h1>Sale API RESPONSE</h1></center><hr>

@if ($hashValidated == 'CORRECT' && $responseCode == '00')
    <h4>Your Transaction ID for Order {{ $txnRefNo }} is {{ $pgTxnId }}.</h4>
    <h4>We have received a payment of Rs. {{ $amount/100 }}. Your order will soon be shipped.</h4>
@elseif ($hashValidated == 'CORRECT' && $responseCode == 'CAN')
    <h4>Your Transaction ID for Order {{ $txnRefNo }} is {{ $pgTxnId }}.</h4>
    <h4>Your order is cancelled. {{ $message }}</h4>
@else
    <h4>Your Transaction ID for Order {{ $txnRefNo }} is {{ $pgTxnId }}.</h4>
    <h4>Your payment is not processed. {{ $message }}</h4>
@endif

<h4>Complete Response from PG For reference :</h4>
<style type="text/css">
    * { font-family:sans-serif; }
    h1 { font-size: 20px; font-weight: 600; margin-bottom: 5px; color: #08185A; }
    h4 { text-align: center; }
    .shade { height: 30px; background-color: #E1E1E1; }    
</style>
<table width="60%" align="center" border="0" cellpadding='0' cellspacing='0'>
    @foreach($dataFromPostFromPG as $key => $_responseArray)
        <tr class="{{ $loop->iteration % 2 == 0 ? 'shade' : '' }}">
            <td><strong><em>{{ $key }}</em></strong></td>
            <td>{{ $_responseArray }}</td>
        </tr>
    @endforeach
</table> 