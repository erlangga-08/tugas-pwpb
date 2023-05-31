<?php
// membuat instance
$dataMahasiswa=NEW Mahasiswa;
$dataJurusan=NEW Jurusan;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<div class="">
<div class="">
<div class="container p-7">
<h3 class="mb-4 mt-4">Daftar Mahasiswa</h3>
<a class="btn btn-primary btn-sm" href="index.php?file=mahasiswa&aksi=tambah" role="button">
<i class="fa fa-plus p-1"></i>Tambah Data Mahasiswa</a>
<div class="d-flex flex-row-reverse bd-highlight">
  <div class="bd-highlight">
  <a class="btn btn-primary btn-sm" target="_blank" href="cetak.php">PRINT</a>
  </div>
</div>
<table border="2" width="" class="table table-hover table-striped table-bordered"></br>
<thead>
<tr class="bg-warning">
<th scope="col">No.</th>
<th scope="col">Nim</th>
<th scope="col">Nama</th>
<th scope="col">Tempat Lahir</th>
<th scope="col">Tanggal Lahir</th>
<th scope="col">Jenis Kelamin</th>
<th scope="col">Alamat</th>
<th scope="col">Aksi</th>
</tr>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataMahasiswa->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisMahasiswa){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisMahasiswa->nim.'</td>
<td>'.$barisMahasiswa->nama.'</td>
<td>'.$barisMahasiswa->tempat_lahir.'</td>
<td>'.$barisMahasiswa->tgl_lahir.'</td>
<td>'.$barisMahasiswa->jenis_kelamin.'</td>
<td>'.$barisMahasiswa->alamat.'</td>
<td>
<a class="btn btn-success btn-sm"
href="index.php?file=mahasiswa&aksi=edit&nim='.$barisMahasiswa->nim.'"><i class="fa fa-pencil p-1"></i>Edit</a>
<a class="btn btn-danger btn-sm"
href="index.php?file=mahasiswa&aksi=hapus&nim='.$barisMahasiswa->nim.'"><i class="fa fa-trash p-1"></i>Hapus</a>
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
<div class="card mt-5 col-sm-8">
<div class="card-header bg-warning">
<h3><b>Form Tambah</b></h3>
</div>
<div class="card-body">
<form method="POST" action="index.php?file=mahasiswa&aksi=simpan">
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Nim</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtNim" placeholder="Masukan Nim" required>
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Nama Lengakp</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtNama" placeholder="Masukan Nama">
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Tempat Lahir</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtTempat" placeholder="Masukan Tempat Lahir">
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Tanggal Lahir</label>
<div class="mb-3 col-sm-4">
  <input type="date" class="form-control " id="exampleFormControlInput1" name="txtTanggal">
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Jenis Kelamin</label>
<div class="mb-3 col-sm-4">
<input type="radio" name="txtKelamin" value="laki-laki"/>Laki-laki
<input type="radio" name="txtKelamin" value="perempuan"/>Perempuan
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Alamat</label>
<div class="mb-3 col-sm-4">
  <input type="textarea" class="form-control " id="exampleFormControlInput1" name="txtAlamat">
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
'nim'=>$_POST['txtNim'],
'nama'=>$_POST['txtNama'],
'tempat_lahir'=>$_POST['txtTempat'],
'tgl_lahir'=>$_POST['txtTanggal'],
'jenis_kelamin'=>$_POST['txtKelamin'],
'alamat'=>$_POST['txtAlamat'],
);
// simpan siswa dengan menjalankan method simpan
$dataMahasiswa->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=mahasiswa&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data siswa
$mahasiswa=$dataMahasiswa->detail($_GET['nim']);
if($mahasiswa->jenis_kelamin == 'laki-laki'){
    $pilihL='checked';
    $pilihP=null;
} else {
    $pilihP='checked'; $pilihL= null;
}
$html =null;
$html .='<div class="container">
<div class="card mt-5 col-sm-8">
<div class="card-header bg-warning">
<h3><b>Form Tambah</b></h3>
</div>
<div class="card-body">
<form method="POST" action="index.php?file=mahasiswa&aksi=update">
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Nim</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtNim" placeholder="Masukan Nim" required value="'.$mahasiswa->nim.'">
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Nama Lengakp</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtNama" placeholder="Masukan Nama" value="'.$mahasiswa->nama.'">
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Tempat Lahir</label>
<div class="mb-3 col-sm-4">
  <input type="text" class="form-control " id="exampleFormControlInput1" name="txtTempat" placeholder="Masukan Tempat Lahir" value="'.$mahasiswa->tempat_lahir.'">
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Tanggal Lahir</label>
<div class="mb-3 col-sm-4">
  <input type="date" class="form-control " id="exampleFormControlInput1" name="txtTanggal" value="'.$mahasiswa->tgl_lahir.'">
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Jenis Kelamin</label>
<div class="mb-3 col-sm-4">
<input type="radio" name="txtKelamin" value="laki-laki" '.$pilihL.'/>Laki-laki
<input type="radio" name="txtKelamin" value="perempuan" '.$pilihP.'/>Perempuan
</div>
</div>
<div class="form-group row">
<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Alamat</label>
<div class="mb-3 col-sm-4">
  <input type="textarea" class="form-control " id="exampleFormControlInput1" name="txtAlamat" value="'.$mahasiswa->alamat.'">
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
// aksi edit data
else if ($_GET['aksi']=='update') {
$data=array(
'nim'=>$_POST['txtNim'],
'nama'=>$_POST['txtNama'],
'tempat_lahir'=>$_POST['txtTempat'],
'tgl_lahir'=>$_POST['txtTanggal'],
'jenis_kelamin'=>$_POST['txtKelamin'],
'alamat'=>$_POST['txtAlamat']
);
$dataMahasiswa->update($_POST['txtNim'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=mahasiswa&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataMahasiswa->hapus($_GET['nim']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=mahasiswa&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>