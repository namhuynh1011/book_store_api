@component('mail::message')
# Xác nhận đơn hàng

Chào {{ $order->fullName }},

Cảm ơn bạn đã đặt hàng tại website của chúng tôi!

**Mã đơn hàng:** {{ $order->id }}  
**Tổng tiền:** {{ number_format($order->total, 0, ',', '.') }}₫

@component('mail::panel')
Đơn hàng sẽ được xử lý và giao đến địa chỉ:

{{ $order->address }}
@endcomponent

@component('mail::table')
| Sản phẩm        | Số lượng | Thành tiền     |
|:----------------|:---------|:---------------|
@foreach($order->details as $detail)
| {{ $detail->product->name }} | {{ $detail->quantity }} | {{ number_format($detail->product->price * $detail->quantity, 0, ',', '.') }}₫ |
@endforeach
@endcomponent
Nếu có bất kỳ thắc mắc nào, xin vui lòng liên hệ với chúng tôi tại số điện thoại 0374786427.

Cảm ơn bạn!  
@endcomponent
