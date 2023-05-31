<?php
// membuat instance
$dataJurusan=NEW Jurusan;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<div class="">
<div class="">
<div class="container p-7 col-sm-9">
<h3 class="mb-4 mt-4">Daftar Jurusan</h3>
<div>
<a class="btn btn-primary btn-sm" href="index.php?file=jurusan&aksi=tambah" role="button">
<i class="fa fa-plus p-1"></i>Tambah Data Jurusan</a><br/>
</div>
<table border="2" width="" class="table table-hover table-striped table-bordered "></br>
<thead>
<tr class="bg-warning">
<th scope="col-1">No.</th>
<th scope="col-2">Id Jurusan</th>
<th scope="col-3">Nama Jurusan</th>
<th scope="col-4">Aksi</th>
</tr>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataJurusan->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisJurusan){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisJurusan->id_jurusan.'</td>
<td>'.$barisJurusan->nama_jurusan.'</td>
<td>
<a class="btn btn-success btn-sm"
href="index.php?file=jurusan&aksi=edit&id_jurusan='.$barisJurusan->id_jurusan.' "><i class="fa fa-pencil p-1"></i>Edit</a>
<a class="btn btn-danger btn-sm"
href="index.php?file=jurusan&aksi=hapus&id_jurusan='.$barisJurusan->id_jurusan.'"><i class="fa fa-trash p-1"></i>Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>
</div>
</div>
</div>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<div class="container">
<div class="card mt-5 col-sm-7">
<div class="card-header bg-warning">
<h3><b>Form Tambah</b></h3>
</div>
<div class="card-body">
<form method="POST" action="index.php?file=jurusan&aksi=simpan">
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Id</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtId" placeholder="Masukan Id" required>
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Nama Jurusan</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtNama" placeholder="Masukan Nama">
</div>
</div>
<p>
<button type="submit" class="btn btn-primary" name="tombolSimpan"><i class="fa fa-floppy-o p-1" aria-hidden="true"></i>Simpan</button></p>
</form>
  </div>
  <div class="card-footer text-muted"><p></br>
  </p>
  </div>
</div>
</div>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'id_jurusan'=>$_POST['txtId'],
'nama_jurusan'=>$_POST['txtNama'],
);
// simpan siswa dengan menjalankan method simpan
$dataJurusan->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=jurusan&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data siswa
$jurusan=$dataJurusan->detail($_GET['id_jurusan']);
$html =null;
$html .='<div class="container">
<div class="card mt-5 col-sm-7">
<div class="card-header bg-warning">
<h3><b>Form Edit</b></h3>
</div>
<div class="card-body">
<form method="POST" action="index.php?file=jurusan&aksi=update">
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Id</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtId" value="'.$jurusan->id_jurusan.'" placeholder="Masukan Id">
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Nama Jurusan</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtNama" value="'.$jurusan->nama_jurusan.'"placeholder="Masukan Nama">
</div>
</div>
<p><input type="submit" class="btn btn-primary " name="tombolSimpan" value="Simpan"/></p>
</form>
  </div>
  <div class="card-footer text-muted"><p></br>
  </p>
  </div>
</div>
</div>';
echo $html;
}
// aksi edit data
else if ($_GET['aksi']=='update') {
$data=array(
'id_jurusan'=>$_POST['txtId'],
'nama_jurusan'=>$_POST['txtNama'],
);
$dataJurusan->update($_POST['txtId'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=jurusan&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataJurusan->hapus($_GET['id_jurusan']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=jurusan&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
