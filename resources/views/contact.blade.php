@extends('layouts.template')

@section('title')
ติดต่อเรา - wpnrayong
@stop

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

<div class="ps-vendor-banner bg--cover desktop-d" data-background="{{ url('img/bg-contact.png') }}" style="background: url({{ url('img/bg-contact.png') }});">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-md-3">
                <div class="set-box-green-800">
                    <div class="box-green-800">
                        <p style="margin-bottom: 4px; padding-bottom: 0px; font-size:16px">ที่อยู่</p>
                        <h4 style="margin-bottom: 4px;">สำนักงานใหญ่</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                        <p>ที่อยู่ 1/1 หมู่ 4 ต.นิคมพัฒนา อ.นิคมพัฒนา จ.ระยอง 21180</p>
                        <h4 style="margin-bottom: 4px;">สำนักงานสงขลา</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                        <p>ที่อยู่ 428 หมู่2 ต.พะวง อ.เมืองสงขลา จ.สงขลา 90100</p>
                        <h4 class="mt-10">ช่องทางการติดต่อ</h4>
                        <p>โทรศัพท์ : <a href="tel:{{ get_phone2() }}">{{ get_phone2() }}</a>, <a href="tel:{{ get_phone() }}">{{ get_phone() }}</a><br>
                        อีเมล : <a href="mailto: {{ get_email() }}">{{ get_email() }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col col-md-7">
                <div class="d-flex justify-content-end bg-white-con">
                    <form class="ps-form--contact-us" id="contactForm">
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
                                    <select class="form__field" aria-label="Select example" name="type" id='type'>
                                        <option>กรุณาเลือกหัวข้อที่ต้องการ</option>

                                        @isset($type_contact)
                                            @foreach ($type_contact as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endisset
                                       
                                    </select>
                                    <label for="name" class="form__label">หัวข้อที่ต้องการติดต่อ</label>
                                </div>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <textarea class="form__field" placeholder="ระบุข้อความที่ต้องการ" style="height:80px" maxlength="500" name="massage" id='massage'></textarea>
                                    <label for="massage" class="form__label">ข้อความ (<span id="count">500</span>/500)</label>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                            </div>
                        </div>
                        <div class="text-center mt-20">
                            <button  class="ps-btn--fullwidth-green btn-block" id="btnSendData" style="border-radius: 5px">ส่งข้อความ</button >
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="desktop-h">
    <div class="p-15">
        <div class="">
            <div class="box-green-800">
                <p style="margin-bottom: 4px; padding-bottom: 0px; font-size:16px">ที่อยู่</p>
                <h4 style="margin-bottom: 4px;">สำนักงานใหญ่</h4>
                <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                <p>ที่อยู่ 1/1 หมู่ 4 ต.นิคมพัฒนา อ.นิคมพัฒนา จ.ระยอง 21180</p>
                <h4 style="margin-bottom: 4px;">สำนักงานสงขลา</h4>
                <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                <p>ที่อยู่ 428 หมู่2 ต.พะวง อ.เมืองสงขลา จ.สงขลา 90100</p>
                <h4 class="mt-10">ช่องทางการติดต่อ</h4>
                <p>โทรศัพท์ : <a href="tel:{{ get_phone2() }}">{{ get_phone2() }}</a>, <a href="tel:{{ get_phone() }}">{{ get_phone() }}</a><br>
                อีเมล : <a href="mailto: {{ get_email() }}">{{ get_email() }}</a></p>
            </div>
        </div>
        <div class="d-15">
            <form class="ps-form--contact-us" id="contactForm2">
                <div class="row">
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="ระบุชื่อ-นามสกุลของคุณ" name="name" id='name2' required />
                            <label for="name" class="form__label">ชื่อ-นามสกุล</label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="ระบุอีเมลของคุณ" name="email" id='email2' required />
                            <label for="email" class="form__label">อีเมล</label>
                        </div>
                    </div>
                    <div class="col-xl-12col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="ระบุเบอร์โทรศัพท์ของคุณ" name="phone" id='phone2' required />
                            <label for="phone" class="form__label">เบอร์โทรศัพท์</label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <select class="form__field" aria-label="Select example" name="type" id='type2'>
                                <option>กรุณาเลือกหัวข้อที่ต้องการ</option>
                                @isset($type_contact)
                                    @foreach ($type_contact as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            <label for="name" class="form__label">หัวข้อที่ต้องการติดต่อ</label>
                        </div>
                    </div>
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <textarea class="form__field" placeholder="ระบุข้อความที่ต้องการ" style="height:80px" maxlength="500" name="massage" id='massage2'></textarea>
                            <label for="massage" class="form__label">ข้อความ (<span id="count2">500</span>/500)</label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                    </div>

                </div>
                <div class="text-center mt-20">
                    <button  class="ps-btn--fullwidth-green btn-block" id="btnSendData2" style="border-radius: 5px">ส่งข้อความ</button >
                </div>
            </form>
        </div>
    </div>
    <br>
</div>


<div class="ps-contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15562.683656431534!2d101.1492991!3d12.7998603!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x23f4b615e2e82d1c!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4p-C4h-C4qeC5jOC4nuC4suC4k-C4tOC4iuC4ouC5jOC4o-C4teC5hOC4i-C5gOC4hOC4tOC4pSDguKPguLDguKLguK3guIcg4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1673203663218!5m2!1sth!2sth" height="500"></iframe>
</div>


@endsection

@section('scripts')




<script>

$("#massage").keyup(function(){
  $("#count").text("" + (500 - $(this).val().length));
});
$("#massage2").keyup(function(){
  $("#count2").text("" + (500 - $(this).val().length));
});
    
    $(document).on('click','#btnSendData',function (event) {
      event.preventDefault();
      
      var form = $('#contactForm')[0];
      var formData = new FormData(form);
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var msg = document.getElementById("massage").value;
      var phone = document.getElementById("phone").value;
      var type = document.getElementById("type").value;
        console.log(formData)
    if(name == '' || msg == '' || email == '' || phone == '' || type == ''){
      swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");
    }else{
      $.LoadingOverlay("show", {
        background  : "rgba(255, 255, 255, 0.4)",
        image       : "{{ url('img/loading-gif.gif') }}",
        fontawesome : ""
      });
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
        }
    });
      $.ajax({
          url: "{{url('/api/add_contact')}}",
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          data: formData,
          processData: false,
          contentType: false,
          cache:false,
          type: 'POST',
          success: function (data) {
          //  console.log(data.data.status)
              if(data.data.status == 200){
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 0);
                $('#success_popup').modal('show');
                $("#name").val('');
                $("#massage").val('');
                $("#email").val('');
                $("#phone").val('');
              setTimeout(function(){
                //    window.location.replace("{{url('clients/success_payment/')}}/"+data.data.value);
              }, 3000);
              }else{
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 500);
                swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");
              }
          },
          error: function () {
          }
      });
    }
    });



    $(document).on('click','#btnSendData2',function (event) {
      event.preventDefault();
      
      var form = $('#contactForm2')[0];
      var formData = new FormData(form);
      var name = document.getElementById("name2").value;
      var email = document.getElementById("email2").value;
      var msg = document.getElementById("massage2").value;
      var phone = document.getElementById("phone2").value;
      var type = document.getElementById("type2").value;
        console.log(formData)
    if(name == '' || msg == '' || email == '' || phone == '' || type == ''){
      swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");
    }else{
      $.LoadingOverlay("show", {
        background  : "rgba(255, 255, 255, 0.4)",
        image       : "{{ url('img/loading-gif.gif') }}",
        fontawesome : ""
      });
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
        }
    });
      $.ajax({
          url: "{{url('/api/add_contact')}}",
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          data: formData,
          processData: false,
          contentType: false,
          cache:false,
          type: 'POST',
          success: function (data) {
          //  console.log(data.data.status)
              if(data.data.status == 200){
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 0);
                $('#success_popup').modal('show');
                $("#name2").val('');
                $("#massage2").val('');
                $("#email2").val('');
                $("#phone2").val('');
              setTimeout(function(){
                //    window.location.replace("{{url('clients/success_payment/')}}/"+data.data.value);
              }, 3000);
              }else{
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 500);
                swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");
              }
          },
          error: function () {
          }
      });
    }
    });
    </script>

@stop('scripts')