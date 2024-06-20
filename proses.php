<?php
class Motor {
    public $nama,
            $waktu,
            $diskon,
            $jenis;
    protected $pajak;
    private $Scooter,
            $Sport,
            $Vespa,
            $Cross;
    protected $listMember = ['Sehun', 'Songkang', 'Sunjae', 'Suho'];

    public function __construct (){
        $this->pajak = 10000;
    }

    public function setHarga ($jenis1, $jenis2, $jenis3, $jenis4) {
        $this->Scooter = $jenis1;
        $this->Sport = $jenis2;
        $this->Vespa = $jenis3;
        $this->Cross = $jenis4;
    }

    public function getHarga(){
        $data["Scooter"] = $this->Scooter;
        $data["Sport"] = $this->Sport;
        $data["Vespa"] = $this->Vespa;
        $data["Cross"] = $this->Cross;
        return $data;
    }
}
class Rental extends Motor {
    public function setMember() {
        $member = in_array($this->nama, $this->listMember) ? "Member" : "Non Member";
        return $member;
    }

    public function getDiskon(){
        $diskon = ($this->setMember() == "Member") ? "5" : "0";
        return $diskon;
    }

    public function TotalBayar(){
        $dataHarga = $this->getHarga();
        $hargaRental = $this->waktu * $dataHarga[$this->jenis];
        $hargaPajak = $this->pajak;
        $hargaBayar = $hargaRental + $hargaPajak;
        $diskonMember = $hargaBayar * 0.05;
        if($this->setMember() == "Member") {
            $TotalBayar = $hargaBayar - $diskonMember;
        } else {
            $TotalBayar = $hargaBayar;
        }
        return $TotalBayar;
    }


    public function cetakPembelian(){
        echo "<center>";
        echo $this->nama . " berstatus sebagai " . $this->setMember() . ", maka anda mendapatkan diskon sebesar " . $this->getDiskon() . "%" . "<br>";
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari" . "<br>";
        echo "Harga rental perharinya: Rp. " . number_format($this->getHarga()[$this->jenis], 0, '', '.') . "<br>";
        echo "Besar yang harus dibayar adalah Rp" . number_format($this->TotalBayar(), 0, '', '.');
        echo "</center>";
    }
}
?>
