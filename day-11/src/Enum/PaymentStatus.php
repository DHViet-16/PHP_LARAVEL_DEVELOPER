<?php
namespace Admin\PhpLaravel84Days\Enum;
enum PaymentStatus: string
{
    case Pending = 'pending';
    case Paid = 'paid';
    case Failed = 'failed';
}
