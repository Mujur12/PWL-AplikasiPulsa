create database pwl_pos_2020;
use pwl_pos_2020;

create table barang(
  id_barang int not null primary key auto_increment,
  kode_barang varchar(20) not null,
  nama_barang varchar(50),
  harga_barang int,
  stock_barang int,
  gambar_barang text,
  unique(kode_barang)
);
