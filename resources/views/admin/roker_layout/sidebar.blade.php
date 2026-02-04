<div class="sidebar-wrapper" data-simplebar="true" style="font-family:'Chakra Petch', sans-serif;">
    <div class="sidebar-header">
        <div>
            <img src="{{url('rocker');}}/aru_images/aru-logo-h50.png" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Web Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->

    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('admin/profile'); }}">
                <div class="parent-icon"><i class="bx bx-user"></i></div>
                <div class="menu-title">โปรไฟล์ผู้ใช้</div>
            </a>
        </li>
        <li class="menu-label">จัดการเว็บไซต์</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-alt"></i></div>
                <div class="menu-title">หน้าแรกและสื่อ</div>
            </a>
            <ul>
                <li> <a href="{{ url('admin/webaru-exec-groups'); }}"><i class='bx bx-group'></i>ผู้บริหารมหาวิทยาลัย</a></li>
                <li> <a href="{{ url('admin/webaru-sliders'); }}"><i class='bx bx-images'></i>สไลด์ข่าว 1920</a></li>
                <li> <a href="{{ url('admin/webaru-carousels'); }}"><i class='bx bx-news'></i>สไลด์ข่าว 1440 </a></li>
                <li> <a href="{{ url('admin/webaru-arunews'); }}"><i class='bx bx-news'></i>ข่าว ARU News</a></li>
                <li> <a href="{{ url('admin/webaru-tabs/1'); }}"><i class='bx bx-bell'></i>ประชาสัมพันธ์ทั่วไป</a></li>
                <li> <a href="{{ url('admin/webaru-tabs/2'); }}"><i class='bx bx-briefcase-alt-2'></i>จัดซื้อจัดจ้าง</a></li>
                <li> <a href="{{ url('admin/webaru-tabs/3'); }}"><i class='bx bx-user-plus'></i>รับสมัครงาน</a></li>
                <li> <a href="{{ url('admin/webaru-tabs/4'); }}" style=" font-size:13px;"><i class='bx bx-calendar'></i>ปฏิทินการศึกษา (ภาคปกติ)</a></li>
                <li> <a href="{{ url('admin/webaru-tabs/5'); }}" style=" font-size:13px;"><i class='bx bx-calendar-check'></i>ปฏิทินการศึกษา (กศ.บป)</a></li>
                <li> <a href="{{ url('admin/webaru-galleries'); }}"><i class='bx bx-camera'></i>คลังภาพกิจกรรม</a></li>
                <li> <a href="{{ url('admin/webaru-admit'); }}"><i class='bx bx-id-card'></i>ประกาศผลรับเข้า</a></li>
                <li> <a href="{{ url('admin/webaru-faq'); }}"><i class='bx bx-help-circle'></i>คำถามที่พบบ่อย</a></li>
            </ul>
        </li>

        <li class="menu-label">ศูนย์รับเรื่องร้องเรียน</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-conversation"></i></div>
                <div class="menu-title">งานร้องเรียน</div>
            </a>
            <ul>
                <li> <a href="{{ url('admin/webaru-complaints-dashboard'); }}"><i class='bx bx-line-chart'></i>ภาพรวมระบบ</a></li>
                <li> <a href="{{ url('admin/webaru-complaint-direct-grid'); }}"><i class='bx bx-phone-call'></i>สายตรงอธิการ</a></li>
                <li> <a href="{{ url('admin/webaru-complaints-grid'); }}"><i class='bx bx-file'></i>เรื่องร้องเรียนทั่วไป</a></li>
                <li> <a href="{{ url('admin/webaru-complaint-documents'); }}"><i class='bx bx-folder'></i>เอกสารประกอบ</a></li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
