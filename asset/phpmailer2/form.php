<?php
require '../../fungsi.php';
$no=$_GET["no"];
$pen=$_GET["pen"];
$result = mysqli_query($conn,"SELECT * FROM $pen  ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);
$kategori = $row["kategori{$no}"];
$nilai = $row["tingkat{$no}"];
$harga = $row["harga{$no}"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Form Pendaftaran <?=$kategori;?> </title>
    <style>
body{
  background: url(img/tugu2.jpg);
  background-repeat: no-repeat;
  background-size: cover;
}
.h {
  color: #fff;
}
.input {
  width: 100%;
  padding-top: 10px;
  padding-left: 20px;
  padding-right: 20px;
}
.input h2 {
  font-size: 30px;
  color: #333;
  font-weight: 500;
}
.input .inputBox {
  position: relative;
  width: 100%;
  margin-top: 10px;
}
.input .inputBox input,
.input .inputBox textarea {
  width: 100%;
  padding: 5px 0;
  font-size: 16px;
  margin: 10px 0;
  border: none;
  border-bottom: 2px solid #333;
  outline: none;
  resize: none;
}
.input .inputBox span {
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
.input .inputBox input:focus ~ span,
.input .inputBox input:valid ~ span,
.input .inputBox textarea:focus ~ span,
.input .inputBox textarea:valid ~ span {
  color: #fff;
  font-size: 14px;
  transform: translateY(-25px);
}
    </style>
</head>
<body>
<section>
  <div class="container mt-3 mb-5">
    <center class="h">
      <img src="img/ssci2.png" width="200px" />
        <h3>FORM Pendaftaran</h3>
        <h4><?=$kategori;?> | <?=$nilai;?> |  <?=$harga;?></h4>
    </center>
    <form action="daftar.php?kategori=<?=$kategori;?>&nilai=<?=$nilai;?>&harga=<?=$harga;?>&no=<?=$no;?>&pen=<?=$pen;?>" method="POST" enctype="multipart/form-data" >
    <div class="row">
      <div class="col-md-6">
            <div class="input">
              <div class="inputBox">
                    <input type="text" required="required" name="nama" autocomplete="off"/>
                    <span>Nama Siswa</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="tempat_lahir" autocomplete="off"/>
                    <span>Tempat lahir</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="tgl_lahir" autocomplete="off"/>
                    <span>Tanggal lahir</span>
              </div>
              <div class="inputBox">
                    <input type="text"  required="required" name="email" autocomplete="off"/>
                    <span>Email siswa</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="hp" autocomplete="off"/>
                    <span>Telepon Siswa</span>
              </div>
              <div class="inputBox">
                    <textarea required="required" name="alamat" autocomplete="off"></textarea>
                    <span>Alamat Siswa</span>
              </div>
              <div class="inputBox">
              <input type="text"  required="required" name="sekolah" autocomplete="off"/>
                    <span>Asal Sekolah Siswa</span>
              </div>
              <div class="form-group">
                <label for="tahu" class="control-label" style="color:#fff">Darimana Mengetahui SSCI</label>
                  <select name="promosi" class="form-control" id="tahu" autocomplete="off">
                        <option>Pilih</option>
                        <option>Website</option>
                        <option>Google</option>
                        <option>Social Media</option>
                        <option data-bs-toggle="modal" data-bs-target="#exampleModal">Rekomendasi Teman</option>
                  </select>
              </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rekomendasi Teman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                       <input type="text" name="promosi" placeholder="Nama teman anda" style="width: 100%;">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
      </div>
      <div class="col-md-6">
            <div class="input">
              <div class="inputBox">
                    <input type="text" required="required" name="ortu" autocomplete="off"/>
                    <span>Ortu</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="emailortu" autocomplete="off"/>
                  <span>Email Ortu</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="pekerjaanortu" autocomplete="off"/>
                    <span>Pekerjaan Ortu</span>
              </div>
              <div class="inputBox">
                    <input type="text" required="required" name="hportu" autocomplete="off"/>
                    <span>Telepon Ortu</span>
              </div>
              <div class="inputBox">
                    <textarea required="required" name="alamatortu" autocomplete="off"></textarea>
                    <span>Alamat Ortu</span>
              </div>
              <div class="form-group">
                <label for="tahu" class="control-label" style="color:#fff">Pilihan Jadwal</label>
                  <select name="jadwal" class="form-control" id="tahu" autocomplete="off">
                        <option>Pilih</option>
                        <option>Senin-Rabu-Jumat sesi 1 </option>
                        <option>Senin-Rabu-Jumat sesi 2 </option>
                        <option>Selasa-Kamis-Sabtu sesi 1</option>
                        <option>Selasa-Kamis-Sabtu sesi 2</option>
                  </select>
              </div>
              <br>
              <span style="color:#fff">Kirim foto</span><input type="file" name="foto"><br><br>
              <span style="color:#fff">Kirim file</span><input type="file" name="img">
            </div>
      </div>
    </div>
    <center><input type="submit" class="btn btn-outline-success btn-sm" name="SEND" value="SEND" /></center>
    </form>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
