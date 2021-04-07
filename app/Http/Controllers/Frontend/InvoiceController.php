<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderItem;
use PDF;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $data = OrderItem::where('order_id',$id)->first();
        $pro = Product::where('id',$data->product_id)->first();
        $pdf = PDF::loadView('admin.order.invoice',compact('pro'));
        return $pdf->stream('invoice.pdf');
    }
}
