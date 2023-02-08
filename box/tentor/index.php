<html>
<head>
    <title></title>
<body>
    <div id="reader" style="width:100%"></div>
    <form action="index2.php" method="POST">
    <input type="hidden" name="text" id="text">
    </form>
</body>
<script src="html5-qrcode.min.js"></script>
<script>
   function onScanSuccess(decodedText, decodedResult) {
  console.log(`Code matched = ${decodedText}`, decodedResult);
}
const html5QrCode = new Html5Qrcode("reader");
const qrCodeSuccessCallback = (decodedText, decodedResult) => {
document.getElementById('text').value=decodedText, decodedResult;
document.forms[0].submit()
};
const config = { fps: 1, qrbox: { width: 500, height: 500 } };
html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);

</script>
</head>
</html>
