
<html>
<head>
<script type="text/javascript" src="js/adapter.min.js"></script>
<script type="text/javascript" src="js/vue.min.js"></script>
<script type="text/javascript" src="js/instascan.min.js"></script>
<link rel="stylesheet" href="../,,/../css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <video id="preview" width="100%"></video>
      </div> 
      <div class="col-md-6">
        <label>SCAN QR CODE</label>
        <input type="text" name="text" id="text" readonly="" placeholder="Scan Qr Code" class="form-control">
      </div>
    </div>
  </div>

  <!-- <script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
    Instascan.Camera.getCameras().than(function(cameras){
      if(cameras.length > 0){
        scanner.start(cameras[0]);
      }else{
        alert('no cameras found');
      }
    }).catch(function(e){
      console.error(e);
    });

    scanner.addListener('scan',function(c){
      document.getElementById('text').value=c;
    });


  </script>
 -->
  <script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
               alert('anda sudah absen');
               // document.forms[0].submit();
           });
        </script>
</body>
</html>