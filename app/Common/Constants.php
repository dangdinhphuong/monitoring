<?php

namespace App\Common;

class Constants{
    const DISABLE = 2;
    const ENABLED = 1;
    const DISABLE_ACCOUNT = 0;
    const ENABLED_ACCOUNT = 1;
    
    const STATUS_CUSTOMER = [
        self::DISABLE => 'Ngưng hoạt động',
        self::ENABLED => 'Đang hoạt động',
    ];
    const STATUS_PRODUCTS = [
        self::DISABLE_ACCOUNT => 'Ngưng hoạt động',
        self::ENABLED_ACCOUNT => 'Đang hoạt động',
    ];
    const STATUS_BLOGS = [
        self::DISABLE_ACCOUNT => 'Chưa duyệt bài viết',
        self::ENABLED_ACCOUNT => 'Đã duyệt bài viết',
    ];
    const CUSTOMER = 0;
    const ADMIN = 1;
    const ACCOUNTANT = 2;
    const ROLE = [
        self::ADMIN => 'Quản lí cấp cao',
        self::ACCOUNTANT => 'Kế toán',
        self::CUSTOMER => 'Người dùng',
    ];

    const WAIT_FOR_CONFIRMATION = 0;
    const CONFIRMED = 1;
    const PACKING = 2;
    const Being_transported =3;
    const Delivered =4;
    const Delivery_Successful =5;
    const Delivery_failed =6;
    const Cancel_order =6;

    const STATUS_ORDER = [
        self::WAIT_FOR_CONFIRMATION =>'Chờ xác nhận',
        self::CONFIRMED =>'Đã xác nhận',
        self::PACKING  =>'Đang đóng gói',
        self::Being_transported =>'Đang vận chuyển',
        self::Delivered =>'Đã giao hàng',
        self::Delivery_Successful=>'Giao thành công',
        self::Delivery_failed =>'Giao thất bại',
        self::Cancel_order =>'Hủy đơn hàng'
    ];
    const STATUS_CONTATCT = [
        self::WAIT_FOR_CONFIRMATION =>'Chờ xác nhận',
        self::CONFIRMED =>'Đã xác nhận',
        self::PACKING  =>'Đã hủy',
    ];
}