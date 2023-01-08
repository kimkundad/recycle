@extends('layouts.template')

@section('stylesheet')
@stop('stylesheet')

@section('content')


<div class="ps-deal-of-day mt-30 pb-0px">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>ติดต่อเรา</h3>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="ps-vendor-banner bg--cover" data-background="{{ url('img/bg-contact.png') }}" style="background: url({{ url('img/bg-contact.png') }});">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-md-3">
                <div class="set-box-green-800">
                    <div class="box-green-800">
                        <h4>ที่อยู่</h4>
                        <p>บริษัท วงษ์พาณิชย์ รีไซเคิล ระยอง จำกัด</p>
                        <p>ที่อยู่ 1/1 หมู่ 4 ต.นิคมพัฒนา อ.นิคมพัฒนา จ.ระยอง 21180</p>
                        <h4 class="mt-10">ช่องทางการติดต่อ</h4>
                        <p>สำนักงาน : 038-606-338,038-606-339<br>
                        แฟกซ์ :  038-606-340<br>
                        โทรศัพท์ : 063-901-0974<br>
                        อีเมล : sales@wongpanit-rayong.com</p>
                    </div>
                </div>
            </div>
            <div class="col col-md-7">
                <div class="d-flex justify-content-end bg-white-con">
                    <form class="ps-form--contact-us">
                        <h3>ติดต่อเรา</h3>
                        <p class="fs-16 fw-700">ท่านสามารถติดต่อสอบถาม ซื้อสินค้า ขอใช้บริการ ผ่านช่องทางด้านล่าง</p>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุชื่อ-นามสกุลของคุณ" name="name" id='name' required />
                                    <label for="name" class="form__label">ชื่อ-นามสกุล</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุอีเมลของคุณ" name="email" id='email' required />
                                    <label for="email" class="form__label">อีเมล</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุเบอร์โทรศัพท์ของคุณ" name="phone" id='phone' required />
                                    <label for="phone" class="form__label">เบอร์โทรศัพท์</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="กรุณาเลือกหัวข้อที่ต้องการ" name="name" id='name' required />
                                    <label for="name" class="form__label">หัวข้อที่ต้องการติดต่อ</label>
                                </div>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุข้อความที่ต้องการ" name="massage" id='massage' required />
                                    <label for="massage" class="form__label">ข้อความ (500/500)</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-20">
                            <a class="ps-btn--fullwidth-green btn-block" href="#" style="border-radius: 5px">ส่งข้อความ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>


<div class="ps-contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15562.683656431534!2d101.1492991!3d12.7998603!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x23f4b615e2e82d1c!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4p-C4h-C4qeC5jOC4nuC4suC4k-C4tOC4iuC4ouC5jOC4o-C4teC5hOC4i-C5gOC4hOC4tOC4pSDguKPguLDguKLguK3guIcg4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1673203663218!5m2!1sth!2sth" height="500"></iframe>
</div>


@endsection

@section('scripts')
@stop('scripts')