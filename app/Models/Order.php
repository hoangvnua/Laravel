<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const CHO_XAC_NHAN = 0;
    const DONG_GOI_HANG = 1;
    const DANG_VAN_CHUYEN = 2;
    const GIAO_HANG_THAT_BAI = 3;
    const GIAO_HANG_THANH_CONG = 4;
    const HUY_DON_HANG = 5;

    protected $statusArr = [
        self::CHO_XAC_NHAN => 'Chờ xác nhận',
        self::DONG_GOI_HANG => 'Đóng gói hàng',
        self::DANG_VAN_CHUYEN => 'Đang vận chuyển',
        self::GIAO_HANG_THAT_BAI => 'Giao hàng thất bại',
        self::GIAO_HANG_THANH_CONG => 'Giao hàng thành công',
        self::HUY_DON_HANG => 'Đơn hàng bị hủy',
    ];

    // protected $statusColor = [
    //     self::CHO_XAC_NHAN => 'secondary',
    //     self::DONG_GOI_HANG => 'primary',
    //     self::DANG_VAN_CHUYEN => 'info',
    //     self::GIAO_HANG_THAT_BAI => 'warning',
    //     self::GIAO_HANG_THANH_CONG => 'success',
    //     self::HUY_DON_HANG => 'danger',
    // ];

    public function getStatusTextAttribute()
    {
        // return '<span class="badge badge-' . $this->statusColor[$this->status] . '">' . $this->statusArr[$this->status] . '<span>';
        return $this->statusArr[$this->status];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function getTotalFormatAttribute()
    {
        return number_format($this->money_total, 0, '', '.') . ' đ ';
    }
}
