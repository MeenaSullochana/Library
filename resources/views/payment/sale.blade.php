<!-- resources/views/sale.blade.php -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('payment/style.css') }}">
<form action="{{ $gatewayURL }}" method="post" name="server_request" id="sales-api-form" target="_top">
   @csrf
<input type="hidden" name="EncData" id="EncData" value="{{ $EncData }}">
    <input type="hidden" name="MerchantId" id="MerchantId" value="{{ $data['MerchantId'] }}">
    <input type="hidden" name="BankId" id="BankId" value="{{ $data['BankId'] }}">
    <input type="hidden" name="TerminalId" id="TerminalId" value="{{ $data['TerminalId'] }}">
    <input type="hidden" name="Version" id="Version" value="{{ $data['Version'] }}">
</form>
<script type="text/javascript">
    document.server_request.submit();
</script>