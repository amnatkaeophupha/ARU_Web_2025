@extends('webaru_bs3/home_layout')
@section('content')
<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title" style="font-size:30px;">คณะผู้บริหารมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</h2>
                    <ul>
                        <li>
                            <a class="active" href="{{url('/')}}">หน้าแรก</a>
                        </li>
                        <li>
                            <a>แนะนำมหาวิทยาลัย</a>
                        </li>
                        <li>คณะผู้บริหาร</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start page content -->
<section class="lecturers-area ptb-80">
    <div class="container">
        <!-- อธิการบดี -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-20">
                    <h1 class="uppercase" style="font-family:'sarabun',sans-serif;font-size:24px;">อธิการบดี</h1>
                    <p>มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-business-man-alt-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-md-3 col-sm-6">
                <div class="single-lecturers">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/chusit.jpg')}}"></a>
                        <div class="img-title" >
                            <h3>รศ.ดร.ชูสิทธิ์ ประดับเพ็ชร์</h3>
                            <div class="aru-img-title">อธิการบดี</div>
                            <p> โทร. 035-276555 ต่อ 1001 </p>
                            <p>chusit.aru@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- รองอธิการบดี -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-20 mt-80">
                    <h1 class="uppercase" style="font-family: 'sarabun', sans-serif;font-size:24px;">รองอธิการบดี </h1>
                    <p>มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-users-alt-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" alt="" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>รศ.ดร.ธาตรี มหันตรัตน์</h3>
                            <div class="aru-img-title">ฝ่ายบริหารทรัพยากร</div>
                            <p>โทร. 035-276555 ต่อ 1006</p>
                            <p>dhatreecu24@hotmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" alt="" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>อาจารย์จิรศักดิ์ ชุมวรานนท์</h3>
                            <div class="aru-img-title">ฝ่ายยุทธศาสตร์และแผนงาน</div>
                            <p>โทร. 035-276555 ต่อ 1002</p>
                            <p>jirasak@aru.ac.th</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>ผศ.ดร.กรองทิพย์ เนียมถนอม</h3>
                            <div class="aru-img-title">ฝ่ายบริหารงานวิชาการ</div>
                            <p>โทร. 035-276555 ต่อ 1003</p>
                            <p>nkrongthip@aru.ac.th</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>ผศ.ดร.กมลวรรณ วรรณธนัง</h3>
                            <div class="aru-img-title">ฝ่ายวิจัย นวัตกรรม และพัฒนาท้องถิ่น</div>
                            <p>โทร. 035-276555 ต่อ 1005</p>
                            <p>duean_2520@hotmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>ผศ.ดร.สุดารัตน์ เกลี้ยงสอาด</h3>
                            <div class="aru-img-title">ฝ่ายพัฒนานักศึกษาและกิจการสภามหาวิทยาลัย</div>
                            <p>โทร. 035-276555 ต่อ 1013</p>
                            <p>Sudarat_k@hotmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ผู้ช่วยอธิการบดี -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-20 mt-80">
                    <h1 class="uppercase" style="font-family: 'sarabun', sans-serif;font-size:24px;">ผู้ช่วยอธิการบดี </h1>
                    <p>มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-users-alt-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" alt="" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>ผศ.ยุพิน พวกยะ</h3>
                            <div class="aru-img-title">ฝ่ายประกันคุณภาพการศึกษา</div>
                            <p>โทร. 035-276555 ต่อ 8082</p>
                            <p>pyupin@aru.ac.th</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" alt="" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>อาจารย์นรินทร์ อุ่นแก้ว</h3>
                            <div class="aru-img-title">ฝ่ายงานบริหารทั่วไปและกฎหมาย</div>
                            <p>โทร. 035-276555 ต่อ 1014</p>
                            <p>meeunkeaw0210@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>อาจารย์ ดร.กันยาลักษณ์ โพธิ์ดง</h3>
                            <div class="aru-img-title">ฝ่ายกิจการพิเศษ</div>
                            <p>โทร. 035-276555 ต่อ 2502</p>
                            <p>pkanyalag@aru.ac.th</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- คณะบดี -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-20 mt-80">
                    <h1 class="uppercase" style="font-family: 'sarabun', sans-serif;font-size:24px;">คณบดี</h1>
                    <p>มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-users-alt-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" alt="" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>ผศ.ดร.บริบูรณ์ ชอบทำดี</h3>
                            <div class="aru-img-title">คณบดีคณะครุศาสตร์</div>
                            <p>โทร. 035-322084 , 035-276581 ต่อ 4000</p>
                            <p>cboriboon@aru.ac.th</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" alt="" src="{{url('webaru/administrators/pakin.jpg')}}"></a>
                        <div class="img-title">
                            <h3>รศ.ดร.ภาคิน โชติเวศย์ศิลป์</h3>
                            <div class="aru-img-title">คณบดีคณะมนุษยศาสตร์และสังคมศาสตร์</div>
                            <p>โทร. 035-276555 ต่อ 4501</p>
                            <p> pakin@aru.ac.th</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/administrators/wimonpan.jpg')}}"></a>
                        <div class="img-title">
                            <h3>รศ.ดร.วิมลพรรณ รุ่งพรหม</h3>
                            <div class="aru-img-title">คณบดีคณะวิทยาศาสตร์และเทคโนโลยี</div>
                            <p>โทร. 035-276555 ต่อ 5001</p>
                            <p>rwimon@aru.ac.th</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>รศ.ดร.อภิชาติ พานสุวรรณ</h3>
                            <div class="aru-img-title">คณบดีบัณฑิตวิทยาลัย</div>
                            <p>โทร. 035-276555 ต่อ 7502</p>
                            <p>Apichat_asm@hotmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/administrators/somkiat.png')}}"></a>
                        <div class="img-title">
                            <h3>อาจารย์ ดร.สมเกียรติ แดงเจริญ</h3>
                            <div class="aru-img-title">คณบดีคณะวิทยาการจัดการ</div>
                            <p>โทร. 035-276555 ต่อ 8398</p>
                            <p>toatanu@aru.ac.th</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ผู้อำนายการ -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-20 mt-80">
                    <h1 class="uppercase" style="font-family: 'sarabun', sans-serif;font-size:24px;">ผู้อำนวยการ</h1>
                    <p>มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-users-alt-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" alt="" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>ผศ.ดร.เลิศชาย สถิตย์พนาวงศ์</h3>
                            <div class="aru-img-title">ผู้อำนวยการสถาบันวิจัยและพัฒนา</div>
                            <p>โทร. 035-276555 ต่อ 2101</p>
                            <p>lerdchai99@aru.ac.th</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" alt="" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>ผศ.สาโรช ปุริสังคหะ</h3>
                            <div class="aru-img-title">ผู้อำนวยการสำนักวิทยบริการและเทคโนโลยีสารสนเทศ</div>
                            <p>โทร. 035-276555 ต่อ 2501</p>
                            <p>Ipreds@yahoo.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>อาจารย์ ดร.สุรินทร์ ศรีสังข์งาม</h3>
                            <div class="aru-img-title">ผู้อำนวยการสถาบันอยุธยาศึกษา</div>
                            <p>โทร. 035-276555 ต่อ 2301</p>
                            <p>surin.thaiart@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-sm mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>นางลักขณา เตชวงษ์</h3>
                            <div class="aru-img-title">ผู้อำนวยการสำนักงานอธิการบดี</div>
                            <p>โทร. 035-276550 ต่อ 1015 และ 1000</p>
                            <p>tachawong.lakana@gmail.com/p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ประธานสภาคณาจารย์และข้าราชการ -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-20 mt-80">
                    <h1 class="uppercase" style="font-family: 'sarabun', sans-serif;font-size:24px;">ประธานสภาคณาจารย์และข้าราชการ</h1>
                    <p>มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา</p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-users-alt-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-50">
                <div class="single-lecturers mrg-xs4">
                    <div class="lecturers-img">
                        <a href="#"><img class="img-thumbnail" alt="" src="{{url('webaru/administrators/default_img.png')}}"></a>
                        <div class="img-title">
                            <h3>อาจารย์ ดร.นพดล ปรางค์ทอง</h3>
                            <div class="aru-img-title">ประธานสภาคณาจารย์และข้าราชการ</div>
                            <p>โทร. 035-276555 ต่อ 1004</p>
                            <p>nopphadonpr@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div> <!-- End container -->
</section> <!-- End section -->
<!-- End page content -->
@endsection
