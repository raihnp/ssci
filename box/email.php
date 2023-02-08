<?php
require '../fungsi.php';
$t = date('M-Y'); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <title>email</title>
      <style>

 .email{
  display: block;
  margin: auto;
  background: #a6ea33;
  width: 50%;
 }   
 .email h3{
  margin-top: 100px;
  padding: 20px;
 }
 @media (max-width: 575.98px) {
  .email{
  display: block;
  margin: auto;
  background: #a6ea33;
  width: 90%;
 }
 }
.contactForm {
  width: 100%;
  padding-top: 0px;
  padding-left: 10px;
  padding-right: 10px;
}
.contactForm h2 {
  font-size: 30px;
  color: #333;
  font-weight: 500;
}
.contactForm .inputBox {
  position: relative;
  width: 100%;
  margin-top: 10px;
}
.contactForm .inputBox input,
.contactForm .inputBox textarea {
  width: 100%;
  padding: 5px 0;
  font-size: 16px;
  margin: 10px 0;
  border: none;
  border-bottom: 2px solid #333;
  outline: none;
  resize: none;
}
.contactForm .inputBox span {
  position: absolute;
  left: 0px;
  top: 5px;
  padding: 5px;
  font-size: 16px;
  margin: 5px;
  pointer-events: none;
  transition: 0.5s;
  color: #666;
}
.contactForm .inputBox input:focus ~ span,
.contactForm .inputBox input:valid ~ span,
.contactForm .inputBox textarea:focus ~ span,
.contactForm .inputBox textarea:valid ~ span {
  color: #008037;
  margin-top: 5px;
  font-size: 14px;
  transform: translateY(-22px);
}
.contactForm .inputBox input[type="submit"] {
  width: 100px;
  background: #00bcd4;
  color: #fff;
  border: none;
  cursor: pointer;
  padding: 10px;
  font-size: 18px;
}
    </style>
  </head>
  <body>
<section class="email">
      <div class="container">
        <h3>Email</h3>
      <div class="contactForm">
                <form method="POST" action="../asset/phpmailer1/index.php">
                  <div class="inputBox">
                    <input type="text" name="nama" required="required" autocomplete="off"/>
                    <span>Nama Lengkap</span>
                  </div>
                  <div class="inputBox">
                    <input type="text" name="email" required="required" autocomplete="off"/>
                    <span>Email</span>
                  </div>
                  <div class="inputBox">
                    <input type="text" name="alamat" required="required" autocomplete="off"/>
                    <span>Alamat</span>
                  </div>
                  <div class="inputBox">
                    <textarea name="ket" required="required" autocomplete="off"></textarea>
                    <span>Pesan</span>
                  </div>
                  <center>
                    <input type="submit"class="btn btn-outline-success btn-sm mb-3"  name="SEND" value="SEND">
                  </center>
                </form>
              </div>
      </div>
    </section>

            <!--============================================================-->
 
  </body>
</html>
