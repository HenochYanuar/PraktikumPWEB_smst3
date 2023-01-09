-- Active: 1673075016211@@127.0.0.1@3306@pweb_2022_kelas_1
drop database pweb_2022_kelas_1;
create database pweb_2022_kelas_1;
use pweb_2022_kelas_1;

create table mahasiswa(
    nim varchar(10) not null primary key,
    nama varchar(100) not null,
    tgl_lahir date not null,
    alamat text not null,
    jenis_kelamin enum('L','P') default 'L'
);

insert into mahasiswa values
('2142101545','Adi','2003-01-01','Jogja','L'),
('2142101546','Ida','2003-02-02','Jogja','P'),
('2142101547','Edi','2003-03-03','Jogja','L'),
('2142101548','Susi','2003-04-04','Jogja','P'),
('2142101549','Joko','2003-05-05','Jogja','L');

CREATE TABLE motor(
    id INT NOT NULL primary key auto_increment,
    plat_no VARCHAR(10) NOT NULL,
    merek VARCHAR(100),
    tipe VARCHAR(100),
    mahasiswa_nim VARCHAR(10) NOT NULL,
    foreign key(mahasiswa_nim) references mahasiswa(nim),
    CONSTRAINT plat_no_unique UNIQUE (plat_no)
);

INSERT INTO motor
VALUES (1, "AB 30", "Honda", "Beat", "2142101545");

ALTER TABLE motor ADD
gambar VARCHAR(100) DEFAULT NULL;

SELECT * from motor;