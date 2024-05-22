<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Sale API</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('payment/style.css') }}">
<script type="text/javascript">
function showhide(payment_type) {
    if (payment_type == "wt" || payment_type == "") {
        $("#Name, #CardNo, #CardExpiry, #CVV, #FirstName, #LastName, #Address, #Street, #City, #ZIP, #State, #bankCodetr").css('display', 'none');
    } else if (payment_type == "nb") {
        $("#CardNo, #CardExpiry, #CVV").css('display', 'none');
        $("#Name, #FirstName, #LastName, #Address, #Street, #City, #ZIP, #State, #bankCodetr").css('display', 'table-row');
    } else {
        $("#CardNo, #CardExpiry, #CVV").css('display', 'table-row');
        $("#Name, #FirstName, #LastName, #Address, #Street, #City, #ZIP, #State, #bankCodetr").css('display', 'none');
    }
}
</script>
<script>
    window.onload = function() {
        showhide("");
    }
</script>
</head>
<body>


<center><h1>Sale API</h1></center>
<hr>
<!-- The "Pay Now!" button submits the form and gives control to the form 'action' parameter -->
    <form action="/process-sale" method="post" accept-charset="ISO-8859-1">
@csrf
<!-- get user input -->
        <table width="80%" align="center" border="0" cellpadding='0' cellspacing='0'>
        <tr align="text-center">
            <td colspan="2"><h3>ORDER PARAMETERS</h3></td>
        </tr>
        <tr align="text-center">
            <td><strong><em>Merchant Txn. Ref. No *</em></strong></td>
            <td> : <input class="textbox"type="text" name="TxnRefNo" id="TxnRefNo" value="" size="40" maxlength="40"/></td>
        </tr>
        <tr align="text-center">
            <td><strong><em>Amount in rupees *</em></strong></td>
            <td> : <input class="textbox"type="text"  name="Amount" id="Amount" value="" size="40" maxlength="12"/></td>
        </tr>
        <tr align="text-center">
            <td><strong><em>Currency Code*</em></strong></td>
            <td> : <input class="textbox" type="text"  name="Currency" id="Currency" value=""  size="40" maxlength="40"/></td>
        </tr>
		{{-- <tr>
            <td>&nbsp;</td>
		</tr> --}}
        <tr>    
            <td>&nbsp;</td>
            <td><input type="submit" name="SubButL" value="Submit"/></td>
        </tr>
	</table>
    </form>

</body>
</html>
