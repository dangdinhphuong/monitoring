this.displayCurrentTime(); // Gọi lần đầu khi component được tạo
setInterval(this.displayCurrentTime, 1000); // Cập nhật thời gian mỗi giây
function displayCurrentTime() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';

    if (hours < 10) {
        hours = '0' + hours;
    }

    if (minutes < 10) {
        minutes = '0' + minutes;
    }
    formattedTime = hours + ':' + minutes + ' ' + ampm;
    $('.time').text(formattedTime);
}

