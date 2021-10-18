 //Kiểm tra sau 5 phút không thao tác tự động đăng xuất
 var duration = 11; // duration timer in seconds

 setInterval(updateTimer, 1000);

 function updateTimer() {
     duration--;
     if (duration < 1) {
         window.location.href = window.location.protocol + "//" + location.host.split(":")[0] + "/dang-xuat";
     } else if (duration < 11) {
         swal({
             title: "Cảnh báo",
             text: "Hệ thống nhận thấy bạn không thao tác với phòng đấu giá trong 5 phút qua, hệ thống sẽ tự động đăng xuất sau 10 s. Nhấn OK để xác nhận hủy !",
             type: "error",
             timer: 10000,
             showConfirmButton: true
         });
         document.querySelector('.sweet-alert p').innerText = "Hệ thống sẽ tự động đăng xuất sau " + formatTime(duration);
     }

 }

 window.addEventListener("mousemove", resetTimer);

 function resetTimer() {
     duration = 300;
 }

 function formatTime(timeInSeconds) {
     var minutes = Math.floor(timeInSeconds / 60);
     var seconds = timeInSeconds % 60;
     if (minutes < 10) { minutes = "0" + minutes; }
     if (seconds < 10) { seconds = "0" + seconds; }
     return minutes + ":" + seconds;
 }