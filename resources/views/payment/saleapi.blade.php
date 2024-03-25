<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><title>Sale API</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('payment/style.css') }}">
<script type="text/javascript">
    function showhide(payment_type) {
        if ( payment_type == "wt" || payment_type == "") {
            document.getElementById("Name").style.display = 'none';
            document.getElementById("CardNo").style.display = 'none';
            document.getElementById("CardExpiry").style.display = 'none';
            document.getElementById("CVV").style.display = 'none';

            document.getElementById("Name").style.display = 'none';  
            document.getElementById("FirstName").style.display = 'none';
            document.getElementById("LastName").style.display = 'none';

            document.getElementById("Address").style.display = 'none';
            document.getElementById("Street").style.display = 'none';

            document.getElementById("City").style.display = 'none';
            document.getElementById("ZIP").style.display = 'none';
            document.getElementById("State").style.display = 'none';

            document.getElementById("Address").style.display = 'none';
          
            document.getElementById("bankCodetr").style.display = 'none';
         
        }else if (payment_type == "nb"){

            document.getElementById("CardNo").style.display = 'none';
            document.getElementById("CardExpiry").style.display = 'none';
            document.getElementById("CVV").style.display = 'none';
          	 
            document.getElementById("Name").style.display = 'table-row';
            document.getElementById("FirstName").style.display = 'table-row';
            document.getElementById("LastName").style.display = 'table-row';

            document.getElementById("Address").style.display = 'table-row';
            document.getElementById("Street").style.display = 'table-row';

     	    document.getElementById("City").style.display = 'table-row';
            document.getElementById("ZIP").style.display = 'table-row';
            document.getElementById("State").style.display = 'table-row';

            document.getElementById("Address").style.display = 'table-row';

            document.getElementById("bankCodetr").style.display = 'table-row';

    	}else {
        	document.getElementById("CardNo").style.display = 'table-row';
            document.getElementById("CardExpiry").style.display = 'table-row';
            document.getElementById("CVV").style.display = 'table-row';
    		
    		document.getElementById("Name").style.display = 'none';
            document.getElementById("FirstName").style.display = 'none';
            document.getElementById("LastName").style.display = 'none';

            document.getElementById("Address").style.display = 'none';
            document.getElementById("Street").style.display = 'none';

            document.getElementById("City").style.display = 'none';
            document.getElementById("ZIP").style.display = 'none';
            document.getElementById("State").style.display = 'none';
            
    		document.getElementById("bankCodetr").style.display = 'none';
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
        <tr>
            <td colspan="2"><h3>ORDER PARAMETERS:</h3></td>
        </tr>
        <tr>
            <td><strong><em>Merchant Txn. Ref. No: *</em></strong></td>
            <td><input class="textbox"type="text" name="TxnRefNo" id="TxnRefNo" value="" size="40" maxlength="40"/></td>
        </tr>
        <tr>
            <td><strong><em>Amount in rupees: *</em></strong></td>
            <td><input class="textbox"type="text"  name="Amount" id="Amount" value="" size="40" maxlength="12"/></td>
        </tr>
        <tr>
            <td><strong><em>Currency Code: *</em></strong></td>
            <td><input class="textbox"type="text"  name="Currency" id="Currency" value=""  size="40" maxlength="40"/></td>
        </tr>
        <tr>
            <td><strong><em>Txn Type: *</em></strong></td>
            <td><input class="textbox"type="text"  name="TxnType" id="TxnType" value="Pay" size="40" maxlength="40" readonly/></td>
        </tr>
        <tr>
            <td><strong><em>Order Info: </em></strong></td>
            <td><input class="textbox"type="text"  name="OrderInfo" id="OrderInfo"  size="40" maxlength="40"/></td>
        </tr>
        <tr>
            <td><strong><em>CardHolder Email: </em></strong></td>
            <td><input class="textbox"type="text"  name="Email" id="Email" value="" size="40" maxlength="40"/></td>
        </tr>
        <tr>
            <td><strong><em>CardHolder Phone: </em></strong></td>
            <td><input class="textbox"type="text"  name="Phone" id="Phone" value="" size="40" maxlength="40"/></td>
        </tr>
		<tr>
          <td colspan="2"><h3>USER DEFINED FIELDS: </h3></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 01: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF01" id="UDF01" value="" size="40" maxlength="500"/></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 02: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF02" id="UDF02" value="" size="40" maxlength="500"/></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 03: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF03" id="UDF03" value="" size="40" maxlength="500"/></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 04: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF04" id="UDF04" value="" size="40" maxlength="500"/></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 05: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF05" id="UDF05" value="" size="40" maxlength="500"/></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 06: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF06" id="UDF06" value="" size="40" maxlength="500"/></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 07: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF07" id="UDF07" value="" size="40" maxlength="500"/></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 08: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF08" id="UDF08" value="" size="40" maxlength="500"/></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 09: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF09" id="UDF09" value="" size="40" maxlength="500"/></td>
        </tr>
        <tr>
            <td><strong><em>User Defined Field 10: </em></strong></td>
            <td><input class="textbox"type="text"  name="UDF10" id="UDF10" value="" size="40" maxlength="500"/></td>
       </tr>
        
		<tr>
          <td colspan="2"><b>&nbsp;</b></td>
        </tr>
		
		<tr>
            <td><h3>PAYMENT METHOD: *</h3></td>
            <td>
                <label for="one"><input type="radio" id="one" name="payOpt" value="cc"  onchange="showhide(this.value);" />Credit card</label>
                <label for="two"><input type="radio" id="two" name="payOpt" value="dc" onchange="showhide(this.value);"/>Debit Card</label>
                <label for="three"><input type="radio" id="three" name="payOpt" value="nb"  onchange="showhide(this.value);"/>NetBanking</label>
                <label for="four"><input type="radio" id="four" name="payOpt" value="wt" onchange="showhide(this.value);"/>Wallet </label>
                <label for="seven"><input type="radio" checked="checked" id="seven"  name="payOpt" value="" onchange="showhide(this.value);" />3-Party</label>
            </td> 
        </tr>
        
		<tr><td colspan="2"></td></tr>
        <tr id="CardNo" >
        <td><strong><em>Card Number: * </em></strong></td>
        <font color="red"></font> </td><td>
        <input class="textbox"type="text"  name="CardNumber" id="CardNumber" value="" ><td>

        <tr id="CardExpiry">
        <td><strong><em>Expiry Date: (MMYYYY): * </em></strong></td>
        <font color="red"></font> </td><td>
        <input class="textbox"type="text"  name="ExpiryDate" id="ExpiryDate" value="" ><td></tr>

        <tr id="CVV">
            <td><strong><em>CVV2/CVD2 Number: * </em></strong></td>
            <td><input class="textbox"type="password"  name="CardSecurityCode" id="CardSecurityCode" value="" ></td>
        </tr>
 
        <tr id="bankCodetr">
            <td><strong><em>Bank ID for NetBanking: * </em></strong></td>
            <td><input class="textbox"type="text"  name="bankCode" id="bankCode" value="" ></td>
        </tr>

        <tr id="Name">
            <td><strong><em>CardHolder Name: * </em></strong></td>
            <td>
                <input class="textbox"type="text"  name="FirstName" id="FirstName" placeholder="Firstname" value="" >
        		<input class="textbox"type="text"  name="LastName" id="LastName" placeholder="Lastname" value="" >
            </td>
        </tr>

        <tr id="Address">
            <td><strong><em>CardHolder Address: * </em></strong></td>
            <td>
                <input class="textbox"type="text"  name="Street" id="Street" placeholder="Street" value="" > 
                <input class="textbox"type="text"  name="City" id="City" placeholder="City" value="" > 
                <input class="textbox"type="text"  name="ZIP" id="ZIP" placeholder="Zip" value="" > 
                <input class="textbox"type="text"  name="State" id="State" placeholder="State" value="" >
            </td>
        </tr>
		
		<tr>
            <td>&nbsp;</td>
		</tr>
        <tr>    
            <td>&nbsp;</td>
            <td><input type="submit" name="SubButL" value="Submit"/></td>
        </tr>
	</table>
    </form>

</body>
</body>
</html>
