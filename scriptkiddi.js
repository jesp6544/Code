function bla() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    ctx.moveTo(0, 0);
    ctx.lineTo(1000, 700);
    ctx.stroke();
}

function start() {
    //waves();
    sun();
}

function sun() {
    window.setInterval(moveSun, 1000);
    function moveSun() {
        var c = document.getElementById("layer1");
        var width = c.width = innerWidth -8;
        var height = c.height = innerHeight-8;
        var ctx = c.getContext("2d");
        var tmpDate = new Date();
        var tmpHour = parseInt(tmpDate.getHours());
        var tmpMinut = parseInt(tmpDate.getMinutes());
        var tmpSec = parseInt(tmpDate.getSeconds());
        ctx.clearRect(0, 0, width, height);
        var color = "rgba(200, 200, 254, 1)";
        if (tmpHour > 22 || tmpHour < 6) {
            color = "rgba(30, 47, 58, 1)";
        }
        else {
            color = "rgba(255, 213, 74, 0.8)";
        }
        ctx.beginPath();
        ctx.arc(80, 80, 50, -5, Math.PI, false);
        ctx.fillStyle = color;
        ctx.fill();
        var curve = new CurveAnimator(
            [50, 300], [350, 300],
            [50, 100], [350, 100]
        );
    }
}
function waves() {
    var start = 0;
    var start2 = 0;
    var x = 40;
    var state = false;
    var placement = 75;
    var c1 = document.getElementById("layer2");
    //c.width = document.body.clientWidth;
    var ctx1 = c1.getContext("2d");
    var c2 = document.getElementById("layer3");
    var ctx2 = c2.getContext("2d");

    window.setInterval(wave, 50);
    window.setInterval(wave2, 50);
    function wave() {
        var cord = -100;
        ctx1.clearRect(0, 0, 900, 800);
        for (var i = 0; i < x; i++) { //x should be (page.width / 30)

            ctx1.beginPath();
            ctx1.arc(cord + start2, placement, 20, 0, Math.PI, state);
            ctx1.fillStyle = "rgba(0, 200, 254, 0.2)";
            ctx1.fill();
            //ctx.strokeStyle = '#550000';
            //ctx.stroke();
            cord = cord + 40;
            if (state) {
                state = false;
                placement = placement - 4;
            }
            else if (!state) {
                state = true;
                placement = placement + 4;
            }
            if (start2 > 80) {
                start2 = 0;
            }
        }
        start2 += 2;
    }
    function wave2() {
        var cord = -120;

        ctx2.clearRect(0, 0, c2.width, c2.height);
        for (var i = 0; i < x; i++) { //x should be (page.width / 30)
            ctx2.beginPath();
            ctx2.arc(cord + start, placement, 30, 0, Math.PI, state);
            //ctx.closePath();
            //ctx.lineWidth = 1;
            ctx2.fillStyle = "rgba(0, 120, 254, 0.2)";
            ctx2.fill();
            //ctx.strokeStyle = "rgba(50, 50, 254, 0.2)";
            //ctx.stroke();
            cord = cord + 60;
            if (state) {
                state = false;
                placement = placement - 4;
            }
            else if (!state) {
                state = true;
                placement = placement + 4;
            }
            if (start > 120) {
                start = 0;
            }
        }
        start++;
    }
}