@component('mail::message')
# ข้อความติดต่อสอบถาม ซื้อสินค้า ขอใช้บริการ จากเว็บไซต์
ชื่อผู้ติดต่อ {{$mydata['name']}}
อีเมล {{$mydata['email']}}
เบอร์ติดต่อ {{$mydata['phone']}}
ประเภทการติดต่อ {{$mydata['type']}}
{{$mydata['messenger']}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent