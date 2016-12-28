<html>
<head>
    <script>
        /*
        script is made to check the hash posted
         */
        var hash = '<?php echo $hash ?>';
        function submitPayuForm() {
            if(hash == '') {
                console.log('empty hash');
            }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
        }
        document.cookie = 'userdata' + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
    </script>
</head>
<body onload="submitPayuForm()">
{!! Form::open(['url' => $action, 'name' => 'payuForm']) !!}
<input type="hidden" name="key" value="{{$key}}">
<input type="hidden" name="surl" value="{{$surl}}">
<input type="hidden" name="furl" value="{{$furl}}">
<input type="hidden" name="txnid" value="{{$txnid}}">
<input type="hidden" name="amount" value="{{$amount}}">
<input type="hidden" name="productinfo" value="{{$productinfo}}">
<input type="hidden" name="firstname" value="{{$firstname}}">
<!--<input type="hidden" name="service_provider" value="payu_paisa">-->
<input type="hidden" name="email" value="{{$email}}">
<input type="hidden" name="phone" value="{{$phone}}">
<input type="hidden" name="hash" value="{{$hash}}">
{!! Form::close() !!}
</body>
</html>
