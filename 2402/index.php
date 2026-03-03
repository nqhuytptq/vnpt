<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Routers\QuanLyChung;
use App\Routers\QuanLyDiem;
use App\Routers\QuanLyGiangDay;
use App\Routers\QuanLyGvcn;
use App\Routers\QuanLyHocSinhLop;
use App\Routers\QuanLyKhoiMon;

$quanly = $_GET['quanly'] ?? 'chung';

switch ($quanly) {
    case 'diem':
        QuanLyDiem::run();
        break;

    case 'giangday':
        QuanLyGiangDay::run();
        break;

    case 'gvcn':
        QuanLyGvcn::run();
        break;

    case 'hocsinhlop':
        QuanLyHocSinhLop::run();
        break;

    case 'khoimon':
        QuanLyKhoiMon::run();
        break;

    default:
        QuanLyChung::run();
        break;
}