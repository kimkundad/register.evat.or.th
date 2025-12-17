<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Primary Meta Tags -->
    <title>Electric Vehicle Association of Thailand (EVAT)</title>
    <meta name="title" content="Electric Vehicle Association of Thailand (EVAT)">
    <meta name="description" content="สมาคมยานยนต์ไฟฟ้าไทย (EVAT) ผู้นำความร่วมมือและพัฒนามาตรฐานอุตสาหกรรมยานยนต์ไฟฟ้าไทย เชื่อมโยงทุกภาคส่วน สร้างระบบนิเวศที่เข้มแข็ง เพื่อผลักดันประเทศไทยสู่ศูนย์กลางยานยนต์ไฟฟ้าแห่งภูมิภาค">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://honorluckydraw.com/">
    <meta property="og:title" content="Electric Vehicle Association of Thailand (EVAT)">
    <meta property="og:description" content="สมาคมยานยนต์ไฟฟ้าไทย (EVAT) ผู้นำความร่วมมือและพัฒนามาตรฐานอุตสาหกรรมยานยนต์ไฟฟ้าไทย เชื่อมโยงทุกภาคส่วน สร้างระบบนิเวศที่เข้มแข็ง เพื่อผลักดันประเทศไทยสู่ศูนย์กลางยานยนต์ไฟฟ้าแห่งภูมิภาค">
    <meta property="og:image" content="{{ url('img/honor/224402.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://honorluckydraw.com/">
    <meta property="twitter:title" content="Electric Vehicle Association of Thailand (EVAT)">
    <meta property="twitter:description" content="สมาคมยานยนต์ไฟฟ้าไทย (EVAT) ผู้นำความร่วมมือและพัฒนามาตรฐานอุตสาหกรรมยานยนต์ไฟฟ้าไทย เชื่อมโยงทุกภาคส่วน สร้างระบบนิเวศที่เข้มแข็ง เพื่อผลักดันประเทศไทยสู่ศูนย์กลางยานยนต์ไฟฟ้าแห่งภูมิภาค">
    <meta property="twitter:image" content="{{ url('img/honor/224402.jpg') }}">


    <link rel="stylesheet" href="{{ url('/home/assets/css/honor.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<style>
.imei-group {
    display: flex;
    gap: 10px;
    align-items: center;
}

.btn-check-imei {
    background: #000;
    padding: 10px 16px;
    border: none;
    color: white;
    border-radius: 8px;
    cursor: pointer;
    white-space: nowrap;
}

.imei-status {
    font-size: 22px;
    margin-left: 10px;
    font-weight: bold;
}

.imei-status.success {
    color: #28a745;
}

.imei-status.error {
    color: #dc3545;
}

.imei-input {
    border: 1px solid #cbd5e1;   /* ปกติ */
}

.imei-input.error {
    border: 1px solid #dc3545;   /* แดงเมื่อผิด */
}

.imei-input.success {
    border: 1px solid #28a745;   /* เขียวเมื่อถูก */
}

.imei-note {
    font-size: 14px;
    color: #555;
    margin-top: 5px;
    line-height: 1.5;
}


</style>
<style>
    .hbd-wrapper {
        display: flex;
        gap: 10px;
    }

    .hbd-select {
        flex: 1;
        padding: 12px;
    }
    </style>
<body>

    <div class="page-wrapper2">

        <!-- Header -->
        <header class="page-header">
            <a href="{{ url('/') }}">
                <img src="{{ url('img/honor/logo-evat.png') }}" alt="HONOR logo" style="margin-left:20px">
            </a>
            <!-- ปุ่มออกจากระบบบนขวา -->
            <a href="{{ url('/logout-honor') }}" class="btn-logout-header">
                <i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ
            </a>
        </header>

        <!-- Main Content -->
        <main class="page-content">
            <div class="regis-container">
                <h1 class="regis-title">ส่งข้อมูลการซื้อ <br> Submit purchase information</h1>
                <p class="regis-subtitle">
                    กรอกข้อมูลการซื้อสินค้าของคุณให้ครบถ้วน เพื่อรับสิทธิ์ลุ้นรางวัล <br>Fill in your purchase details completely to qualify for a lucky draw
                </p>

                <form method="POST" action="{{ url('/regis_user_upslip') }}" onsubmit="return validateForm();" class="regis-form"
                    enctype="multipart/form-data">
                    @csrf

                    <label for="purchase_day">วันที่ซื้อสินค้า (Purchase date)</label>

                    <div class="hbd-wrapper">

                        {{-- ⭐ DAY --}}
                        <select name="purchase_day" id="purchase_day" class="regis-input hbd-select" required>
                            <option value="">วัน</option>
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ sprintf('%02d', $i) }}">{{ $i }}</option>
                            @endfor
                        </select>

                        {{-- ⭐ MONTH --}}
                        <select name="purchase_month" id="purchase_month" class="regis-input hbd-select" required>
                            <option value="">เดือน</option>
                            <option value="01">มกราคม</option>
                            <option value="02">กุมภาพันธ์</option>
                            <option value="03">มีนาคม</option>
                            <option value="04">เมษายน</option>
                            <option value="05">พฤษภาคม</option>
                            <option value="06">มิถุนายน</option>
                            <option value="07">กรกฎาคม</option>
                            <option value="08">สิงหาคม</option>
                            <option value="09">กันยายน</option>
                            <option value="10">ตุลาคม</option>
                            <option value="11">พฤศจิกายน</option>
                            <option value="12">ธันวาคม</option>
                        </select>

                        {{-- ⭐ YEAR (พ.ศ.) --}}
                        @php
                            $thisYearTH = date('Y') + 543;
                            $startYearTH = $thisYearTH + 1;  // ซื้อย้อนหลังได้ 3 ปี (ปรับได้ตามต้องการ)
                        @endphp

                        <select name="purchase_year" id="purchase_year" class="regis-input hbd-select" required>

                            @foreach (range($thisYearTH, $startYearTH) as $y)
                                <option value="{{ $y }}">{{ $y }}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="purchase_date" id="purchase_date">
                    </div>



                    {{-- <label>หมายเลข IMEI เครื่อง</label>
                    <input type="text" name="imei" id="imei" maxlength="15" class="regis-input"
                        placeholder="กรอกหมายเลข IMEI 15 หลัก" required>
                    <p id="imei-error" class="input-error" style="display:none;">กรุณากรอก IMEI ให้ถูกต้อง (15
                        หลักตัวเลขเท่านั้น)</p> --}}


                        <label>หมายเลข IMEI เครื่อง (Enter 15-digit IMEI number)</label>
                        <div class="imei-group">
                            <input
                                type="text"
                                name="imei"
                                id="imei"
                                maxlength="15"
                                class="regis-input imei-input"
                                placeholder="กรอกหมายเลข IMEI 15 หลัก"
                                required
                            >

                            <button type="button" id="check-imei-btn" class="btn-check-imei" style="font-family: 'Anuphan', sans-serif;font-size: 18px;padding: 16px 16px;">
                                Verify
                            </button>

                            <span id="imei-status" class="imei-status"></span>
                        </div>

                        <p class="imei-note">
                            <strong>**หมายเหตุ:</strong><br>
                            • สามารถตรวจสอบหมายเลข IMEI ได้โดยกด *#06# บนโทรศัพท์<br>
                            • ใช้หมายเลข IMEI 1 เพื่อลงทะเบียนลุ้นรางวัลได้ 1 สิทธิ์<br>
                            • ผู้ลงทะเบียน 1 คน สามารถลงทะเบียนได้มากกว่า 1 สิทธิ์
                        </p>
                        <p class="imei-note">
                            <strong>**Remarks:</strong><br>
                            • You can check the IMEI number by dialing *#06# on your phone<br>
                            • Use IMEI 1 to register and receive 1 entry for the lucky draw<br>
                            • One registrant can register for more than one entry
                        </p>

                        <p id="imei-error" class="input-error" style="display:none;">กรุณากรอก IMEI ให้ถูกต้อง</p>

                    <label>ร้านค้าที่ซื้อ (Store)</label>

                    <select name="store_name_select" id="store_name_select" class="regis-input" required>
                        <option value="">เลือกร้านค้า / Store</option>
                        <option value="HONOR EXPERIENCE STORE">ร้าน HONOR EXPERIENCE STORE</option>
                        <option value="Banana">ร้านในเครือ Banana</option>
                        <option value="IT CITY | CSC">ร้านในเครือ IT CITY | CSC</option>
                        <option value="Jaymart Group">ร้านในเครือ Jaymart Group</option>
                        <option value="TG">ร้านในเครือ TG</option>
                        <option value="Power Mall">ร้านในเครือ Power Mall</option>
                        <option value="Advice">ร้านในเครือ Advice</option>
                        <option value="AIS Shop และ Telewiz">ร้าน AIS Shop และ Telewiz</option>
                        <option value="True Shop">ร้าน True Shop</option>
                        <option value="Dtac Shop">ร้าน Dtac Shop</option>
                        <option value="Lazada">Lazada</option>
                        <option value="Shopee">Shopee</option>
                        <option value="Tiktok">Tiktok</option>
                        <option value="other">อื่นๆ โปรดระบุ…</option>
                    </select>

                    <!-- Input ขึ้นเฉพาะเมื่อเลือก อื่นๆ -->
                    <input
                        type="text"
                        id="store_name_other"
                        name="store_name"
                        class="regis-input mt-10"
                        placeholder="กรุณากรอกชื่อร้านค้า"
                        style="display:none;"
                    >


                    <label>อัปโหลดใบเสร็จ (ภาพ JPG/PNG/PDF)</label>
                    <input type="file" name="receipt_file" id="receipt_file" class="regis-input"
                        accept=".jpg,.jpeg,.png,.pdf" required>
                    <!-- 🔽 ตรงนี้คือจุดแสดง preview -->
                    <div id="preview-container" class="mt-10">
                        <img id="preview-image" style="max-width: 100%; display: none; border-radius: 8px;"
                            alt="Preview Receipt">
                        <p id="preview-filename" class="info-text" style="display:none;"></p>
                    </div>

                    <p class="info-text">ขนาดไฟล์ไม่เกิน 5MB / 1 ใบเสร็จต่อ 1 สิทธิ์</p>


                    <div class="text-center">
                        <button type="submit" class="btn-confirm mt-20">ส่งข้อมูลเข้าร่วมกิจกรรม</button>
    <br>  <br>
                        <!-- 🔴 ปุ่มออกจากระบบ -->

                    </div>

                    <p class="info-text">
                        เมื่อส่งข้อมูลสำเร็จ ระบบจะแสดงข้อความยืนยัน และนับสิทธิ์ของคุณอัตโนมัติ <br>
                        Once the information is successfully submitted, the system will display
a confirmation message and automatically count your entries
                    </p>
                        <br>  <br>
                </form>
            </div>
        </main>

        <!-- Footer -->
        <footer class="page-footer2">
        <div class="copyright2">
               สมาคมยานยนต์ไฟฟ้าไทย ©2025 All rights reserved. Web <br>
               Design by Idea Vivat.
                <a href="{{ url('/terms') }}" class="footer-link">เงื่อนไขกิจกรรม</a> |
                <a href="{{ url('/privacy-policy') }}" class="footer-link">นโยบายคุ้มครองข้อมูลส่วนบุคคล</a>
            </div>
    </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
document.getElementById("store_name_select").addEventListener("change", function() {
    const otherInput = document.getElementById("store_name_other");

    if (this.value === "other") {
        otherInput.style.display = "block";
        otherInput.required = true;
    } else {
        otherInput.style.display = "none";
        otherInput.required = false;

        // เมื่อเลือกอย่างอื่น ให้ส่งค่าสำเร็จตามร้านนั้น ๆ
        document.getElementById("store_name_other").value = this.value;
    }
});
</script>


    <script>
  document.getElementById('receipt_file').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const image = document.getElementById('preview-image');
    const filename = document.getElementById('preview-filename');

    if (!file) return;

    const fileType = file.type;
    const validImageTypes = ['image/jpeg', 'image/png'];

    if (validImageTypes.includes(fileType)) {
      const reader = new FileReader();
      reader.onload = function (e) {
        image.src = e.target.result;
        image.style.display = 'block';
        filename.style.display = 'none';
      };
      reader.readAsDataURL(file);
    } else if (fileType === 'application/pdf') {
      image.style.display = 'none';
      filename.textContent = `📄 ไฟล์ PDF: ${file.name}`;
      filename.style.display = 'block';
    } else {
      image.style.display = 'none';
      filename.textContent = 'ไฟล์ไม่รองรับ กรุณาเลือก JPG, PNG หรือ PDF';
      filename.style.display = 'block';
    }
  });
</script>


<script>
function validateForm() {

    // ------------------------------
    // 1) ตรวจวันที่ซื้อสินค้า (วัน / เดือน / ปี พ.ศ.)
    // ------------------------------
    let d = document.getElementById("purchase_day").value;
    let m = document.getElementById("purchase_month").value;
    let y_th = document.getElementById("purchase_year").value;

    if (!d || !m || !y_th) {
        Swal.fire({
            icon: "warning",
            title: "กรุณาเลือกวันที่ซื้อสินค้าให้ครบถ้วน"
        });
        return false;
    }

    // แปลง พ.ศ. → ค.ศ.
    let y_ad = parseInt(y_th) - 543;
    let selectDate = new Date(`${y_ad}-${m}-${d}`);
    let today = new Date();

    if (isNaN(selectDate.getTime())) {
        Swal.fire({
            icon: "error",
            title: "วันที่ไม่ถูกต้อง",
            text: "กรุณาตรวจสอบอีกครั้ง"
        });
        return false;
    }

    if (selectDate > today) {
        Swal.fire({
            icon: "error",
            title: "ข้อมูลไม่ถูกต้อง",
            text: "วันที่ซื้อสินค้าต้องไม่เกินวันปัจจุบัน"
        });
        return false;
    }

    // ส่งค่า purchase_date เป็น ค.ศ. ไป backend
    document.getElementById("purchase_date").value = `${y_th}-${m}-${d}`;


    // ------------------------------
    // 2) ตรวจสอบ IMEI (ต้องตรวจสอบก่อนส่ง)
    // ------------------------------
    if (!window.imei_valid) {
        Swal.fire({
            icon: "error",
            title: "กรุณากดปุ่มตรวจสอบ IMEI ก่อนส่งข้อมูล"
        });
        return false;
    }

    // ผ่านทั้งหมด → ส่งฟอร์มได้
    return true;
}
</script>
 <!-- JS ตรวจสอบ IMEI -->
<script>
document.getElementById("check-imei-btn").addEventListener("click", function () {

    let imei = document.getElementById("imei").value.trim();
    let status = document.getElementById("imei-status");
    let error = document.getElementById("imei-error");
    let imeiInput = document.getElementById("imei");

    status.innerHTML = "";
    status.className = "imei-status";

    if (!/^\d{15}$/.test(imei)) {
        error.style.display = "block";
        imeiInput.classList.add("error");
        status.innerHTML = "✕";
        status.classList.add("error");
        window.imei_valid = false;
        return;
    }

    error.style.display = "none";

    fetch("{{ url('/check-imei') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ imei: imei })
    })
    .then(res => res.json())
    .then(data => {

        imeiInput.classList.remove("error", "success");

        if (data.valid) {
            imeiInput.classList.add("success");
            status.classList.add("success");
            status.innerHTML = "✓";
            window.imei_valid = true;

        } else {
            imeiInput.classList.add("error");
            status.classList.add("error");
            status.innerHTML = "✕";
            window.imei_valid = false;

            alert(data.used ? "หมายเลข IMEI นี้ถูกใช้สิทธิ์แล้ว" : data.message);
        }
    });
});


</script>



</body>

</html>
