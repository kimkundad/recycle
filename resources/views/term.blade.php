@extends('layouts.template')

@section('title')
    @if (session()->get('locale') == 'th')
    นโยบายข้อมูลส่วนบุคคล - wpnrayong
    @else
    Personal information policy - wpnrayong
    @endif
@stop

@section('og')
    <meta property="og:url"           content="http://wpnrayong.com/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ get_title_facebook() }}" />
    <meta property="og:image"         content="{{ get_facebook_img() }}?v{{time()}}" />
    <meta property="og:description"   content="{{ get_facebook_detail() }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="314" />
@stop('og')

@section('stylesheet')
@stop('stylesheet')

@section('content')




<div class="ps-deal-of-day mt-10">
    <div class="container">
        @if (session()->get('locale') == 'th')
        <h4 class="mt-30 mb-30">นโยบายข้อมูลส่วนบุคคล</h4>
        <div class="ps-blog__content bor_shadow">
            <div class="blog_detail_in pt-10">
                <h4 class="mt-20">บริษัท วงษ์พาณิชย์ รีไซเคิล ระยอง จำกัด</h4>
                <p class="blog_date">ประกาศ ณ วันที่ 19 มีนาคม 2566</p>
                <p> บริษัท วงษ์พาณิชย์ รีไซเคิล ระยอง จำกัด (“บริษัทฯ”) ได้จัดให้มีประกาศนโยบายข้อมูลส่วนบุคคลฉบับนี้เพื่อให้ลูกค้าผลิตภัณฑ์และบริการของบริษัทฯ รวมถึงลูกค้ามุ่งหวัง ผู้ใช้ ผู้เข้าชม (“ท่าน” หรือ“ลูกค้า”) ได้รับทราบถึงนโยบายของบริษัทฯ เกี่ยวกับการเก็บรวบรวม การใช้ และการเปิดเผยข้อมูลส่วนบุคคล ซึ่งเป็นไปตามพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ. 2562 (“พรบ. คุ้มครองข้อมูลส่วนบุคคล”) กฎหมาย และกฎเกณฑ์ที่เกี่ยวข้อง โดยประกาศนโยบายข้อมูลส่วนบุคคลนี้จะแจ้งให้ท่านทราบถึงวิธีการที่บริษัทฯ เก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคลของท่าน ประเภทข้อมูล และวัตถุประสงค์ในการดำเนินการดังกล่าว รวมถึงรายละเอียดเกี่ยวกับระยะเวลาในการเก็บรักษาข้อมูล การเปิดเผยข้อมูลส่วนบุคคลให้แก่บุคคลภายนอก สิทธิของท่าน การรักษาความลับและความปลอดภัยของข้อมูลส่วนบุคคลของท่าน และวิธีการที่ท่านสามารถติดต่อบริษัทฯ </p>
                <p> <b>1. นิยามข้อมูลส่วนบุคคล</b> 
                    “ข้อมูลส่วนบุคคล” หมายถึง ข้อมูลเกี่ยวกับบุคคลซึ่งทำให้สามารถระบุตัวบุคคลนั้นได้ไม่ว่าทางตรงหรือทางอ้อม ทั้งนี้ เป็นไปตามกฎหมายที่ใช้บังคับ โดยไม่รวมถึงข้อมูลส่วนบุคคลของผู้ถึงแก่กรรม

                “ข้อมูลส่วนบุคคลที่มีความอ่อนไหว” หมายถึง ข้อมูลส่วนบุคคลเกี่ยวกับเชื้อชาติ เผ่าพันธุ์ ความคิดเห็นทางการเมือง ความเชื่อในลัทธิ ศาสนาหรือปรัชญา พฤติกรรมทางเพศ ประวัติอาชญากรรม ข้อมูลสุขภาพ ความพิการ ข้อมูลสหภาพแรงงาน ข้อมูลพันธุกรรม ข้อมูลชีวภาพ เช่น การสแกนลายนิ้วมือ การสแกนใบหน้า เป็นต้น หรือข้อมูลอื่นใดซึ่งกระทบต่อเจ้าของข้อมูลส่วนบุคคลในทํานองเดียวกันตามที่คณะกรรมการคุ้มครองข้อมูลส่วนบุคคลประกาศกำหนด
                </p>
                <br>
                <p> <b>2.1 การเก็บรวบรวมข้อมูลส่วนบุคคล</b> </p>
                <p>บริษัทฯ ทำการเก็บรวบรวมข้อมูลส่วนบุคคลและข้อมูลต่าง ๆ ของท่าน ดังต่อไปนี้                </p>

                <p> <b>1) ชื่อ และ นามสกุล</b> 
                </p>
                <p> <b>2) ที่อยู่</b> 
                </p>
                <p> <b>3) อีเมล</b></p>
                <p> <b>4) หมายเลขโทรศัพท์</b></p>
                <p> <b>5) ข้อมูลการติดต่อทางสื่อสังคมออนไลน์ (เช่น LINE ID, Facebook ID)
                </b></p>
                <p> <b>6) ข้อมูลส่วนบุคคล อื่น ๆ ที่ท่านได้ให้ไว้แก่บริษัทฯ
                </b> 
                </p>
                <br>
                <p><b>2.2 วิธีการเก็บรวบรวมข้อมูลส่วนบุคคล</b><br>
                    บริษัทฯ จะทำการเก็บรวบรวมข้อมูลส่วนบุคคลผ่านทางหลายช่องทาง บริษัทฯ จะได้รับข้อมูลของท่านโดยตรงกับบริษัทฯ หรือ ผ่านทางเว็บไซต์  www.wpnrayong.com หรือเว็บไซต์อื่น ๆ ของบริษัทฯ หรือจากแหล่งอื่นที่ไม่ใช่จากท่านโดยตรง เช่น จากองค์กรอื่นหรือผู้ให้บริการด้านการรักษาความปลอดภัย แพลตฟอร์มของสื่อสังคมออนไลน์ เป็นต้น
                </p>

                <Br>
                    <p><b>2.3 ระยะเวลาในการเก็บข้อมูลส่วนบุคคล

                        </b><br>
                        บริษัทฯ จะทำการเก็บรวบรวมข้อมูลส่วนบุคคลของท่านเพื่อใช้งานตามวัตถุประสงค์ที่แจ้งไว้เป็นระยะเวลาตราบเท่าที่ท่านยังเป็นลูกค้าของบริษัทฯ และจะเก็บและใช้งานต่อเนื่องไปเป็นเวลา 10 ปี หลังจากที่ท่านสิ้นสุดการเป็นลูกค้าของบริษัทฯ ทั้งนี้ เท่าที่จำเป็นตามวัตถุประสงค์ในการเก็บรวบรวมข้อมูลส่วนบุคคล หรือตามที่กฎหมายกำหนด 

                    </p>

                <br>
                <p> <b>3. วัตถุประสงค์ในการเก็บรวบรวมข้อมูลส่วนบุคคล
                </b> 
                </p>
                <p> บริษัทฯ จะเก็บรวบรวม ใช้ และ/หรือเปิดเผยข้อมูลต่าง ๆ รวมถึงข้อมูลส่วนบุคคลของท่าน เนื่องด้วยเป็นการจำเป็นเพื่อประโยชน์โดยชอบด้วยกฎหมายของบริษัทฯ หรือโดยได้รับความยินยอมจากท่าน หรือเนื่องด้วยเหตุอันชอบด้วยกฎหมายอื่น ๆ ทั้งนี้ เท่าที่จำเป็นเพื่อวัตถุประสงค์ ดังต่อไปนี้ 
                </p>

                <p>(1) เพื่อใช้ รวมไปถึงเพื่อบริหารและจัดการข้อมูลของท่านในการจัดกิจกรรมทางการตลาด ของบริษัทฯ ตามข้อกำหนดและเงื่อนไขในการเข้าร่วมกิจกรรมในแต่ละครั้ง
                </p>
                <p>(2) เพื่อให้ข้อมูล ให้คำแนะนำ ประชาสัมพันธ์ เกี่ยวกับ สินค้า บริการ หรือกิจกรรมทางการตลาดผ่านทางช่องทางที่ท่านให้ไว้ รวมถึงเพื่อการนำเสนอสินค้าและบริการของบริษัทฯ
                </p>
                <p>(3) เพื่อพัฒนาสินค้าและบริการ ตลอดจนกิจกรรมส่งเสริมการขายและกิจกรรมทางการตลาดของบริษัทฯ</p>
                <p>(4) เพื่อสื่อสาร ตอบกลับ และให้ความช่วยเหลือแก่ท่าน รวมถึงเพื่อการให้บริการหลังการขาย</p>
                <p>(5) เพื่อยืนยันการแสดงตัวตน ก่อนการให้บริการแก่ท่าน</p>
                <p>(6) เพื่อการวิจัยและพัฒนาสินค้าและบริการของบริษัทฯ</p>
                <p>(7) เพื่อให้บริการ และ/หรือเพื่อการติดต่อ สื่อสาร ส่งไปรษณีย์พัสดุ เช่น การติดต่อสอบถามถึงความพึงพอใจในสินค้าและบริการของบริษัทฯ การแจ้งเตือนกิจกรรมส่งเสริมการขายหรือให้ส่วนลดพิเศษ
                </p>
                <p>(8) เพื่อปฏิบัติตามสัญญา</p>
                <p>(9) เพื่อปฏิบัติตามกฎหมาย และ/หรือเพื่อประโยชน์สาธารณะ</p>
                <p>(10) เพื่อป้องกันหรือระงับอันตรายต่อชีวิต ร่างกาย หรือสุขภาพของบุคคล</p>
                <br>
                <p>หากท่านไม่ให้ข้อมูลส่วนบุคคลของท่านแก่บริษัทฯ อาจทำให้บริษัทฯ ไม่สามารถให้บริการแก่ท่านได้ในบางกรณี </p>
                <Br>
                    <p><b>4. การคุ้มครองข้อมูลส่วนบุคคล</b>
                    <br>
                    บริษัทฯ จะเก็บรักษาข้อมูลส่วนบุคคลของท่านไว้เป็นอย่างดีตามมาตรการเชิงเทคนิค และมาตรการเชิงบริหารจัดการ เพื่อรักษาความมั่นคงปลอดภัยในการประมวลผลข้อมูลส่วนบุคคลที่เหมาะสม และเพื่อป้องกันการละเมิดข้อมูลส่วนบุคคล การสูญหาย การเข้าถึง ทำลาย ใช้ แปลง แก้ไข การนำข้อมูลไปใช้ หรือเปิดเผยข้อมูลนอกวัตถุประสงค์ หรือโดยไม่มีอำนาจหรือโดยไม่ชอบ 
                    <br>
                    ทั้งนี้ ท่านมีความเป็นอิสระในการให้ความยินยอมในการที่บริษัทฯ จะเก็บรวบรวม ใช้ หรือเปิดเผย ข้อมูลส่วนบุคคลของท่าน บริษัทฯ จะไม่กำหนดเงื่อนไขในการให้ความยินยอมเพื่อให้เข้าถึงการรับบริการ หรือเข้าทำสัญญากับบริษัทฯ หากข้อมูลส่วนบุคคลนั้นไม่มีความจำเป็นหรือเกี่ยวข้องสำหรับการเข้าทำสัญญาหรือการรับบริการนั้นนอกจากนี้ บริษัทฯ ยังได้กำหนดให้พนักงาน บุคลากร ตัวแทน และผู้รับข้อมูลจากบริษัทฯ มีหน้าที่รักษาข้อมูลส่วนบุคคลของท่านไว้เป็นความลับและมีความปลอดภัยตามมาตรการที่บริษัทฯ กำหนด เมื่อต้องมีการดำเนินการใด ๆ กับข้อมูลส่วนบุคคลของท่าน 
                    <br>
                    ในกรณีที่ท่านเจ้าของข้อมูลส่วนบุคคลท่านใดเป็นผู้ยังไม่บรรลุนิติภาวะ ถือเป็นผู้เยาว์ตามประมวลกฎหมายแพ่งและพาณิชย์ การให้ความยินยอมของท่านต้องได้รับความยินยอมจากผู้ใช้อำนาจปกครองที่มีอำนาจกระทำแทนท่านด้วย หากผู้จะให้ความยินยอมนั้นเป็นผู้เยาว์ที่อายุไม่เกิน 10 ปี ต้องขอความยินยอมจากผู้ใช้อำนาจปกครองนั้นโดยตรง 
                    <br>
                    ในกรณีเจ้าของข้อมูลส่วนบุคคลท่านใดเป็นบุคคลไร้ความสามารถหรือบุคคลเสมือนไร้ความสามารถ ต้องขอความยินยอมจากผู้อนุบาลหรือผู้พิทักษ์ที่มีอำนาจกระทำการแทนบุคคลไร้ความสามารถหรือบุคคลเสมือนไร้ความสามารถนั้นแล้วแต่กรณี บริษัทฯ จะดำเนินการให้ข้อมูลของท่านนั้นถูกต้อง เป็นปัจจุบัน สมบูรณ์ และไม่ก่อให้เกิดความเข้าใจผิด

                    </p>

                    <br>
                    <p><b>5. การเปิดเผยข้อมูลส่วนบุคคล</b></p>
                    <p><b>5.1 ประเภทของผู้รับข้อมูลส่วนบุคคล</b> <br>
                        ในการดำเนินธุรกิจ บริษัทฯ มีความจำเป็นต้องเปิดเผยข้อมูลส่วนบุคคลที่จำเป็นให้กับ บริษัทผู้ให้บริการต่าง ๆ และบริษัทคู่ค้า ของบริษัทฯ เช่น การบริการวิเคราะห์ข้อมูลการตลาด การบริการขนส่งสินค้า การพัฒนาความคุ้มครองด้านความปลอดภัย การพัฒนาแอปพลิเคชัน การจัดกิจกรรมส่งเสริมการขาย การติดต่อสื่อสาร การส่งไปรษณีย์พัสดุต่าง ๆ และการเปิดเผยข้อมูลอื่น ๆ ตามวัตถุประสงค์ในการใช้ข้อมูลตามข้อ 3
                    </p>

                    <p><b>5.2 การส่งหรือโอนข้อมูลส่วนบุคคลไปยังต่างประเทศ</b><Br>
                        ในบางกรณีบริษัทฯ มีการโอนข้อมูลที่จัดเก็บไปยังฐานข้อมูลของบริษัทฯ บนเครื่องคอมพิวเตอร์ที่ตั้งอยู่ในต่างประเทศ ที่ดำเนินการและบริหารงานโดยคู่ค้าของบริษัทฯ ในต่างประเทศ  ซึ่งมีมาตรฐานการคุ้มครองข้อมูลส่วนบุคคลที่เพียงพอ ทั้งนี้ เป็นไปตามกฎหมายว่าด้วยการคุ้มครองข้อมูลส่วนบุคคลทั่วไปของประเทศไทยที่ใช้บังคับ โดยที่ข้อมูลเหล่านี้จะได้รับการดูแลรักษาความปลอดภัยอย่างเข้มงวด
                    </p>

                    <p><b>6. สิทธิของเจ้าของข้อมูลส่วนบุคคล</b><Br>
                        ท่านมีสิทธิดังต่อไปนี้ ทั้งนี้ ภายใต้หลักเกณฑ์ ตามกฎหมายว่าด้วยการคุ้มครองข้อมูลส่วนบุคคลทั่วไปของประเทศไทยที่ใช้บังคับ </p>
                        <p>(1) ท่านสามารถถอนความยินยอม โดยการติดต่อตามช่องทางที่บริษัทฯ จัดเตรียมไว้ตามข้อ 8 บริษัทฯ ขอเรียนว่า หากท่านถอนความยินยอม ท่านอาจจะเสียสิทธิได้รับข้อมูลข่าวสาร หรือ สิทธิประโยชน์ รวมถึง การติดต่อจากบริษัทฯ เพื่อสิทธิพิเศษและกิจกรรมต่าง ๆ ของบริษัทฯ
                        </p>
                        <p>(2) ท่านสามารถขอเข้าถึง ขอสำเนา ขอแก้ไขหรือปรับปรุงข้อมูลส่วนบุคคลของท่านที่อยู่ในความรับผิดชอบของบริษัทฯ ให้ถูกต้องเป็นปัจจุบัน สมบูรณ์ และไม่ก่อให้เกิดความเข้าใจผิด
                        </p>
                        <p>
                            (3) ท่านสามารถขอให้เปิดเผยถึงการได้มาซึ่งข้อมูลส่วนบุคคลของท่านที่ท่านไม่ได้ให้ความยินยอม
                        </p>
                        <p>
                            (4) ท่านมีสิทธิขอรับหรือขอให้บริษัทฯ ส่งหรือโอนข้อมูลส่วนบุคคลของท่านไปยังผู้ควบคุมข้อมูลส่วนบุคคลอื่นได้
                        </p>
                        <p>
                            (5) ท่านสามารถคัดค้านการเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคล หรือ ระงับการใช้ข้อมูลส่วนบุคคลในบางกรณี ตราบเท่าที่กฎหมายกำหนดไว้
                        </p>
                        <p>
                            (6) ท่านสามารถขอให้บริษัทฯ ลบ หรือทำลาย หรือทำให้ข้อมูลส่วนบุคคลเป็นข้อมูลที่ไม่สามารถระบุตัวบุคคลได้ในบางกรณี ตราบเท่าที่กฎหมายกำหนดไว้
                        </p>
                        <p>
                            (7) ท่านสามารถร้องเรียนต่อหน่วยงานของรัฐที่มีอำนาจ
                        </p>

                    <p><b>7. การปรับปรุงนโยบายข้อมูลส่วนบุคคล</b><Br>
                        บริษัทฯ ขอสงวนสิทธิ์ในการแก้ไขปรับปรุงนโยบายข้อมูลส่วนบุคคลฉบับนี้ได้ โดยบริษัทฯ จะแจ้งให้ท่านทราบถึงการแก้ไข เปลี่ยนแปลงดังกล่าว นอกจากนี้ บริษัทฯ อาจจะแจ้งให้ท่านทราบถึงรายละเอียดอื่นเกี่ยวกับข้อมูลส่วนบุคคลของท่านเพิ่มเติม เช่น วัตถุประสงค์ในการเก็บรวบรวมข้อมูลส่วนบุคคลของท่าน ในกรณีที่อยู่นอกเหนือจากนโยบายฉบับนี้ ทั้งนี้ การแก้ไขเปลี่ยนแปลงนโยบายข้อมูลส่วนบุคคลฉบับนี้ หรือรายละเอียดอื่นเกี่ยวกับข้อมูลส่วนบุคคลจะมีผลใช้บังคับทันทีที่บริษัทฯ ได้ดำเนินการแจ้งให้ท่านทราบตามวิธีการที่บริษัทฯ เห็นสมควร เว้นแต่เป็นกรณีที่บริษัทฯ จะต้องได้รับความยินยอมจากท่านตามกฎหมาย ซึ่งในกรณีเช่นนั้น การแก้ไขเปลี่ยนแปลงนโยบายข้อมูลส่วนบุคคลฉบับนี้ หรือรายละเอียดอื่นใดเกี่ยวกับนโยบายข้อมูลส่วนบุคคลจะมีผลใช้บังคับเมื่อบริษัทฯ ได้รับความยินยอมจากท่าน

                    </p>
                    <p><b>8. ติดต่อเรา</b><Br>
                        ในกรณีที่ท่านมีข้อสงสัย ข้อเสนอแนะ หรือข้อติชม เกี่ยวกับนโยบายฉบับนี้ หรือต้องการขอใช้สิทธิของท่าน ท่านสามารถติดต่อบริษัทฯ หรือเจ้าหน้าที่คุ้มครองข้อมูลส่วนบุคคล ผ่านช่องทางดังนี้
                        <Br>
                        - หมายเลขโทรศัพท์: 081 140 0850-1, 038 606338-40
                        <br>
                        - อีเมล: office@wongpanit-rayong.com
                        <Br>
                        - สถานที่ติดต่อ: บริษัท วงษ์พาณิชย์ รีไซเคิล ระยอง จำกัด  เลขที่ 1/1 หมู่ 4 ตำบลนิคมพัฒนา อำเภอนิคมพัฒนา จังหวัดระยอง 21180
                            <br>
                            บริษัทฯ ยินดีตอบข้อสงสัย รับฟังข้อเสนอแนะ และคำติชม อันจะเป็นประโยชน์ต่อการปรับปรุงการให้บริการของเว็บไซต์และการให้บริการของบริษัทฯ ต่อไป
                    </p>

                        <p><b>9. การเปลี่ยนแปลงนโยบายและแนวปฏิบัติคุ้มครองข้อมูลส่วนบุคคล
                        </b><Br>
                            หากมีการแก้ไขเปลี่ยนแปลงเงื่อนไขนโยบาย ฉบับนี้บริษัทฯ จะแจ้งให้ท่านทราบโดยเผยแพร่ผ่านช่องทางที่เหมาะสมของบริษัทฯ
                        </p>
            </div>
            
        </div>
        @else
        <h4 class="mt-30 mb-30">Personal information policy</h4>
        <div class="ps-blog__content bor_shadow">
            <div class="blog_detail_in pt-10">
                <h4 class="mt-20">Wongpanit Recycle Rayong Co., Ltd.</h4>
                <p class="blog_date">Announcement:  19 March 2023</p>
                <p> Wongpanit Recycle Rayong Co., Ltd. (the Company) arranged for this personal data policy to be 
                    announced in order to provide customers who use the Company's products and services including prospective customers, 
                    users, and visitors ("you" or the "customer") with knowledge about the Company's policy concerning collection, use, and 
                    disclosure of personal data in compliance with the Personal Data Protection Act of B.E. 2562 (2019) (Personal Data Protection Act), 
                    laws, and relevant regulations. This personal data policy notification will inform you about methods used by the Company to collect, 
                    use, or disclose your personal data, data types, and objectives of the aforementioned actions including information about data storage time, 
                    disclosure of personal data to outside persons, your rights, confidentiality and security of your personal and methods by which you can contact the Company. </p>
                <p> <b>1. Definition of Personal Data</b> 
                    "Personal Data" means data about a person capable of enabling direct or indirect identification of that person pursuant to enforced laws not including personal 
                    data of deceased persons. "Sensitive Personal Data" means personal data concerning nationality, ethnicity, political opinions, beliefs in cults, religious or 
                    philosophical beliefs, criminal records, health information, disability, labor union data, genetic data, and biological data such as fingerprint and facial scans, 
                    etc., or any other data that affect personal data owners similarly according to notifications and specifications made by the Personal Data Protection Commission.
                </p>
                <br>
                <p> <b>2.1 Personal Data Collection</b> </p>
                <p>The Company collects the following personal data and other data from you:               </p>

                <p> <b>1) First-Last Name</b> 
                </p>
                <p> <b>2) Address</b> 
                </p>
                <p> <b>3) Email</b></p>
                <p> <b>4) Telephone Number</b></p>
                <p> <b>5) Online Contact Information (such as LINE ID, Facebook ID)
                </b></p>
                <p> <b>6) Other Personal Information Provided to the Company
                </b> 
                </p>
                <br>
                <p><b>2.2 Personal Data Collection Methods</b><br>
                    The Company collects personal data via many channels. The Company will receive your data directly at the Company or 
                    via the website at www.wpnrayong.com or the Company's other websites or other sources that are indirect from you such as 
                    other organizations or security service providers and online social media platforms, etc.
                </p>

                <Br>
                    <p><b>2.3 Personal data storage time.

                        </b><br>
                        The Company will collect your personal data for use according to stated objectives for as long as you are the Company's customer and the Company will continue storing and using 
                        personal data for ten years after you are no longer the Company's customer as necessary according to personal data collection objectives or according to legal requirements.

                    </p>

                <br>
                <p> <b>3. Personal Data Collection Objectives
                </b> 
                </p>
                <p> The Company will collect, use and/or disclose data including your personal data out of the Company's legal needs or 
                    with your consent or due to other legal reasons for the following objectives:
                </p>

                <p>(1) To use and manage your data in organizing the Company's marketing activities according to specifications and conditions in joining each activity.
                </p>
                <p>(2) To provide data, recommendations, and advertisement about products, services or marketing activities via channels provided by you including to present the Company's goods and services.
                </p>
                <p>(3) To develop the Company's goods and services including sales promotion and marketing activities.</p>
                <p>(4) To communicate, reply, and provide assistance for you along with providing post-sale services.</p>
                <p>(5) To verify identities before providing services for you.</p>
                <p>(6) To research and develop the Company's goods and services.</p>
                <p>(7) To provide services and/or contact, communicate, deliver postal packages such as contacts and inquiries regarding satisfaction in the Company's 
                    goods and services and warnings about sales promotion activities or special discounts.
                </p>
                <p>(8) To comply with contracts.</p>
                <p>(9) To comply with laws and/or work for public benefit.</p>
                <p>(10) To prevent or stop danager to the lives, bodies or health of individuals.</p>
                <br>
                <p>If you do not provide your personal data for the Company, this may prevent the Company from being able to provide services for you in certain cases. </p>
                <Br>
                    <p><b>4. Personal Data Protection</b>
                    <br>
                    The Company will keep your personal data according to technical and management measures in order to maintain appropriate security and safety in
                     personal data processing and prevent unauthorized or illegal personal 
                     data violations, losses, access, damage, use, conversion, revision, use or disclosure outside of objectives.
                    <br>
                    You are free to provide consent to the company's collection, use or disclosure of your personal data. 
                    The company will not specify conditions for granting consent to access services or enter into agreements 
                    with the company if that personal data is not necessary or related to entry into agreements or use of services. 
                    Furthermore, the company requires the company's employees, personnel, representatives, and data recipients to maintain
                     confidentiality of your personal data including safety according to measures specified by the company when any action has to be taken with your personal data.
                    <br>
                    In cases where any personal data owner has not reached the age of legal majority and are considered to be a minor pursuant to the Civil and Commercial Code, your consent must also include consent from the person exercising guardianship authority on your behalf. If the person granting consent is a minor aged no more than 10 years, consent must be asked for from the person exercising guardianship authority directly.
                    <br>
                    In cases where any personal data owner is incompetent or quasi-incompetent, consent from a caregiver or guardian authorized to act on behalf of that incompetent or quasi-incompetent person is needed, depending on the case. The Company will take action to ensure that person's data is accurate, up-to-date, complete, and not misleading.

                    </p>

                    <br>
                    <p><b>5. Personal Data Disclosure</b></p>
                    <p><b>5.1 Types of personal data recipients.</b> <br>
                        In its business operations, the company needs to disclose necessary personal data to companies that provide services for the company and the company's trade partners such as providers of market data analysis services, product transportation services, security protection development, application development, sales promotion activities, communications, postal services, and other information disclosure according to objectives of data usage in Item 3.
                    </p>

                    <p><b>5.2 Sending or transfer of personal data abroad.</b><Br>
                        In some cases, the company may transfer data stored in the company's database on a computer located overseas, operated and managed by the company's trade partners with sufficient personal data protection standards in compliance with enforced laws on general personal data protection in Thailand. The data will be maintained under strict security measures.
                    </p>

                    <p><b>6.  Personal Data Owner Rights</b><Br>
                        You have the following rights under criteria in generally enforced personal data protection laws of Thailand. </p>
                        <p>(1) You can withdraw your consent via channels provided by the company in Item 8. The company would like to inform you that withdrawal of your consent may cause you to lose the right to receive news, information, or privileges including communications from the company regarding the privileges and activities.
                        </p>
                        <p>(2) You can request access, copies, revisions, or changes to your personal data that fall within the company's responsibility to ensure that they are accurate, up-to-date, complete, and non-misleading.
                        </p>
                        <p>
                            (3) You can request disclosure of the acquisition of your personal data to which you did not grant consent.
                        </p>
                        <p>
                            (4) You have the right to request or ask for the Company to send or transfer your personal data to other personal data controllers.
                        </p>
                        <p>
                            (5)  You can object to the collection, use, or disclosure of personal data or suspend the use of personal data in some cases only as prescribed by law.
                        </p>
                        <p>
                            (6) You can request the company to erase, destroy, or render personal data unidentifiable as prescribed by law.
                        </p>
                        <p>
                            (7) You can submit complaints to authorized government agencies.
                        </p>

                    <p><b>7. Revisions to the Personal Data Policy</b><Br>
                        The Company reserves the right to revise and improve this personal data policy. The Company will notify you of the aforementioned revisions and changes. Furthermore, the Company may notify you about other additional details concerning your personal data such as objectives in collecting your personal data in cases outside of this policy. Revisions and changes to this personal data policy or other details about personal data will be immediately effective when the Company notifies you by methods considered appropriate by the Company except in cases where the Company requires your legal consent. In such as case, revisions and changes to this personal data policy or any other information concerning the personal data policy will be effective when the Company receives your consent. 

                    </p>
                    <p><b>8. Contact Us</b><Br>
                        In cases where you have questions, recommendations or criticisms related to this policy or you want to exercise your rights, you can contact the Company or the personal data protection officer via the following channels:
                        <Br>
                            - Tel: 081 140 0850-1, 038 606338-40
                        <br>
                        - Email: office@wongpanit-rayong.com
                        <Br>
                            - Contact Address: Wongpanit Recycle Rayong Co., Ltd., Address No. 1/1, Village No. 4, Nikhom Pattana, Nikhom Pattana, Rayong, 21180
                            <br>
                            The company is willing to answer questions and listen to recommendations and criticisms, which will contribute to the improvements to its website's services and service provision.
                    </p>

                        <p><b>9. Changes to Policies and Personal Data Protection Guidelines.
                        </b><Br>
                            If there are changes to the terms of this policy, the company will inform you by disseminating information via its appropriate channels.
                        </p>
            </div>
            
        </div>
        @endif
    </div>
</div>

@endsection

@section('scripts')
@stop('scripts')