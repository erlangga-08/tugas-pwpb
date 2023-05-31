<?php
class Mahasiswa extends Database
{
    public function tampil()
    {
        // 1. mysqli_query
        $sql = $this->mysqli->query("SELECT * FROM mahasiswa") or die($this->CekError());
        while ($data = $sql->fetch_object()) {
            $dataMahasiswa[] = $data;
        }
        // 2. jika datanya ada
        if (isset($dataMahasiswa)) {
            // 3. memberikan nilai balik atas data yang diambil dari db
            return $dataMahasiswa;
        }
        // 4. menutup koneksi db,procedural== mysqli_close()
        $this->TutupKoneksi();
    }
    public function detail($nim)
    {
        // 1. mysqli_query
        $sql = $this->mysqli->query("SELECT * FROM mahasiswa WHERE
        nim='" . $nim . "'") or die($this->CekError());
        $dataMahasiswa = $sql->fetch_object();
        // 2. jika datanya ada
        if (isset($dataMahasiswa)) {
            // memberikan nilai balik atas data yang diambil dari db
            return $dataMahasiswa;
        }
        // 3. menutup koneksi db,procedural== mysqli_close()
        $this->TutupKoneksi();
    }
    function update($nim, $data)
    {
        // 1. memecah array menjadi string
        $script_update_temp = null;
        foreach ($data as $field => $value) {
            $script_update_temp .= $field . "='" . $value . "',";
        }
        // 2. menghilangkan tanda koma pada akhir string
        $script_update = rtrim($script_update_temp, ',');
        // 3. menghilangkan tanda koma pada akhir string
        $this->mysqli->query("UPDATE mahasiswa SET " . $script_update .
        " WHERE nim='" . $nim . "'") or die($this->CekError());
        // 4. tutup koneksi
        $this->TutupKoneksi();
    }
    function hapus($nim)
    {
        // 1. Jalankan perintah delete query
        $this->mysqli->query("DELETE FROM mahasiswa WHERE nim='$nim'");
        // 2. tutup koneksi
        $this->TutupKoneksi();
    }
    function simpan($data)
    {
        // 1. membuat 2 kolom bantu
        $kolom_nya = null;
        $nilai_nya = null;
        // 2. memecah antara kolom dan nilai
        foreach ($data as $kolom => $nilai) {
            $kolom_nya .= $kolom . ",";
            $nilai_nya .= "'" . $nilai . "',";
        }
        // 3. menghilangkan tanda koma pada masing2 variabel,untuk mengindari error mysql
        $kolom_nya_baru = rtrim($kolom_nya, ',');
        $nilai_nya_baru = rtrim($nilai_nya, ',');
        // 4. membuat syntax sql untuk simpan
        $sql_simpan = "INSERT INTO mahasiswa 
        (" . $kolom_nya_baru . ")VALUES (" . $nilai_nya_baru . ")";
        // 5. menjalankan perintah sql diatas dan mencek error
        $this->mysqli->query($sql_simpan) or
            die($this->CekError());
        // 6. close koneksi
        $this->TutupKoneksi();
    }
}
?>