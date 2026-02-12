CREATE DATABASE bai_11_1;

CREATE TABLE hoc_sinh (
    hoc_sinh_id int NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
    ho_ten varchar(100) NOT NULL,
    ngay_sinh date NOT NULL,
    phai varchar(50)
);
CREATE TABLE mon_hoc (
    mon_id int NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
    ten_mon VARCHAR(50) NOT NULL
);
create TABLE khoi (
    khoi_id int NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
    ten_khoi VARCHAR(10) NOT NULL
);

create TABLE giao_vien(
    gv_id int NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
    ho_ten VARCHAR(50) NOT NULL,
    dia_chi VARCHAR(25)

);
CREATE TABLE loai_kiem_tra(
    loai_kt_id int NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
    ten_loai VARCHAR(50) NOT NULL,
    he_so int NOT NULL
    );
create TABLE lop (
    lop_id int NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
    khoi_id int, gvcn_id int,
    ten_lop VARCHAR(10) NOT NULL,
    nam_hoc VARCHAR(9) NOT NULL,
    FOREIGN KEY (khoi_id) REFERENCES khoi(khoi_id),
    FOREIGN KEY (gvcn_id) REFERENCES giao_vien(gv_id)

);
create TABLE hoc_sinh_lop(
    hoc_sinh_id INT,
    lop_id int,
    nam_hoc VARCHAR(9) NOT NULL,
    PRIMARY KEY (hoc_sinh_id, lop_id),
    FOREIGN KEY (hoc_sinh_id) REFERENCES hoc_sinh(hoc_sinh_id),
    FOREIGN KEY (lop_id) REFERENCES lop(lop_id)
);

create TABLE giang_day(
    gv_id int , lop_id int ,mon_id int,
    nam_hoc VARCHAR(9) NOT NULL,
    PRIMARY KEY (gv_id, lop_id,mon_id),  
    FOREIGN KEY (gv_id) REFERENCES giao_vien(gv_id),
    FOREIGN KEY (lop_id) REFERENCES lop(lop_id),
    FOREIGN KEY (mon_id) REFERENCES mon_hoc(mon_id)

    

);

create TABLE khoi_mon (
    khoi_id int,
    mon_id int,
    PRIMARY KEY (khoi_id, mon_id),  
    FOREIGN KEY (khoi_id) REFERENCES khoi(khoi_id),
    FOREIGN KEY (mon_id) REFERENCES mon_hoc(mon_id)
    
);
CREATE TABLE diem(
    diem_id int NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
    hoc_ky int NOT NULL,
    hoc_sinh_id int ,lop_id int,mon_id int,loai_kt_id int,
    nam_hoc VARCHAR(9) NOT NULL,
    diem FLOAT,
    FOREIGN KEY (hoc_sinh_id) REFERENCES hoc_sinh(hoc_sinh_id),
    FOREIGN KEY (lop_id) REFERENCES lop(lop_id),
    FOREIGN KEY (mon_id) REFERENCES mon_hoc(mon_id),
    FOREIGN KEY (loai_kt_id) REFERENCES loai_kiem_tra(loai_kt_id)
);

INSERT INTO hoc_sinh (ho_ten, ngay_sinh)
VALUES ('Nguyễn Quang Huy', '2003-12-21');
INSERT INTO mon_hoc(ten_mon) VALUES ('Toán');
INSERT INTO khoi (ten_khoi) VALUES ('12');
INSERT INTO giao_vien (ho_ten, dia_chi) VALUES ('Nguyễn Huyền Linh', 'Yên Bái');
INSERT INTO loai_kiem_tra (ten_loai, he_so) VALUES ('15 phút', '1');
INSERT INTO lop (khoi_id, gvcn_id, ten_lop, nam_hoc)
VALUES (1, 1, '12A1', '2025-2026');
INSERT INTO hoc_sinh_lop (hoc_sinh_id, lop_id, nam_hoc)
VALUES (1, 1, '2025-2026');
INSERT INTO giang_day (gv_id, lop_id, mon_id, nam_hoc)
VALUES (1, 1, 1, '2025-2026');
INSERT INTO khoi_mon (khoi_id, mon_id)
VALUES (1, 1);
INSERT INTO diem (hoc_ky,hoc_sinh_id,lop_id,mon_id,loai_kt_id,nam_hoc,diem)
VALUES (1, 1, 1, 1, 1, '2025-2026', 10);

-- Tính điểm trung bình 1 học kỳ với 1 môn, tât cả môn với 1 hs
SELECT 
    hoc_sinh.hoc_sinh_id as MaHS,
    hoc_sinh.ho_ten as TenHS,
    mon_hoc.ten_mon as TenMon,
    diem.hoc_ky as HocKy,
    AVG(diem.diem) as TBMon
FROM diem
JOIN hoc_sinh ON diem.hoc_sinh_id = hoc_sinh.hoc_sinh_id
JOIN mon_hoc ON diem.mon_id = mon_hoc.mon_id
WHERE hoc_sinh.hoc_sinh_id = 1
  AND diem.hoc_ky = 1
  GROUP BY mon_hoc.mon_id, mon_hoc.ten_mon;
-- Tính % HS khá, giỏi, TB trong 1 lớp, 1 khối
-- xét điều kiện tốt nghiệp cho HS (học lực)
-- In phiếu lien lạc và học bạ cho HS
SELECT
    hoc_sinh.hoc_sinh_id AS MaHS,
    hoc_sinh.ho_ten AS TenHS,
    hoc_sinh.ngay_sinh AS NgaySinh,
    lop.ten_lop AS TenLop,
    lop.nam_hoc AS NamHoc,
    giao_vien.ho_ten AS TenGVCN,
    mon_hoc.ten_mon AS TenMon,
    diem.hoc_ky AS HocKy,
    SUM(diem.diem * loai_kiem_tra.he_so) / SUM(loai_kiem_tra.he_so) AS TBMon
FROM diem
JOIN hoc_sinh ON diem.hoc_sinh_id = hoc_sinh.hoc_sinh_id
JOIN mon_hoc ON diem.mon_id = mon_hoc.mon_id
JOIN lop ON diem.lop_id = lop.lop_id
JOIN giao_vien ON lop.gvcn_id = giao_vien.gv_id
JOIN loai_kiem_tra ON diem.loai_kt_id = loai_kiem_tra.loai_kt_id
WHERE hoc_sinh.hoc_sinh_id = 1
  AND diem.hoc_ky = 1
GROUP BY mon_hoc.mon_id, mon_hoc.ten_mon;


