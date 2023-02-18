    
    <script src="{{ url('assets/plugins/jquery.min.js') }}"></script>
    <script src="{{ url('assets/plugins/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ url('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ url('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/plugins/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/plugins/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ url('assets/plugins/slick/slick/slick.min.js') }}"></script>
    <script src="{{ url('assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slick-animation.min.js') }}"></script>
    <script src="{{ url('assets/plugins/lightGallery-master/dist/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ url('assets/plugins/sticky-sidebar/dist/sticky-sidebar.min.js') }}"></script>
    <script src="{{ url('assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ url('assets/plugins/gmap3.min.js') }}"></script>
    <!-- custom scripts-->
    <script src="{{ url('assets/js/main.js') }}?v{{time()}}"></script>

    <script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

    <script>

$('.img_ro').hover(function(){
  $(this).addClass("active_div", 3000);
}, function(){
  $(this).removeClass("active_div", 3000);
});




const shareButton = document.querySelectorAll(".bottomRight img")

const shareButton_list = document.querySelectorAll(".menu-sh .submenu li")

shareButton[0].addEventListener("click", (e) => {

  var img = document.getElementById('close_chat').src;

  if (img.indexOf('chat.png')!=-1) {
            document.getElementById('close_chat').src  = '{{ url('img/close_img.png') }}';
        }
         else {
           document.getElementById('close_chat').src = '{{ url('img/chat.png') }}';
       }

    for( let i=0; i < shareButton.length; i++ ) {
      shareButton_list[i].classList.toggle("open")
       shareButton[0].classList.remove("sent")
    }
})


    
    $(document).on('click','#btnSendData_mobile',function (event) {
      event.preventDefault();
      
      var form = $('#contactForm3')[0];
      var formData = new FormData(form);
      var name = document.getElementById("name3").value;
      var email = document.getElementById("email3").value;
      var msg = document.getElementById("massage3").value;
      var phone = document.getElementById("phone3").value;
      var type = document.getElementById("type3").value;
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

                const el = document.querySelector('#cart-mobile');
                el.classList.remove("active");
                $('#success_popup').modal('show');
                $("#name3").val('');
                $("#massage3").val('');
                $("#email3").val('');
                $("#phone3").val('');
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