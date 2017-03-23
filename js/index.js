localStorage.setItem("name", "li");
var h2_height = $("h2").height();
var h = $(window).height() - h2_height - 300;
$("#content").css({
    "height": h,
});
var ws = new WebSocket("ws://192.168.1.116:9502?name=" + localStorage.getItem("name"));

ws.onopen = function () {
    $(".msg").text("握手成功");
    heartCheck.reset();
};

var heartCheck = {
    timeout: 50000,//50ms
    timeoutObj: null,
    reset: function () {
        clearTimeout(this.timeoutObj);
        this.start();
    },
    start: function () {
        this.timeoutObj = setInterval(function () {
            var time = Date.parse(new Date()) / 1000;
            ws.send("HeartBeat" + time);
        }, this.timeout)
    }
}

// 接受到的消息
ws.onmessage = function (e) {
    $("#content").append("<div class='sw'><span>" + e.data + " </span></div>");
};
// 出错信息
ws.onerror = function (e) {
    for (var p in e) {
        $(".msg").text(e.type);
    }
};
// 点击发送
$("#send").on("click", function () {
    var msg = $("#message").val();
    if (msg == '') {
        return;
    }
    ws.send(msg);
    $("#content").append("<div class='me'><span>" + msg + " </span></div>");
    $("#message").val("");
    heartCheck.reset();
});

// 关闭连接
ws.onclose = function (e) {
    var msg = "默认消息";
    switch (ws.readyState) {
        case 0:
            msg = "连接尚未建立";
            break;
        case 1:
            msg = "已经建立";
            break;
        case 2:
            msg = "正在关闭";
            break;
        case 3:
            msg = "已经关闭或不可用";
            break;
        default:
    }

    $(".msg").text(msg);
};

// TODO 修改
$(document).keydown(function (event) {
    if (event.keyCode == 13) {
        $("#send").click();
    }
});
