var min = 0;
var sec = 30;

/* when start is clicked, timer starts with this function */
$("#start").on("click", function() {
    var duration = sec;
    var timer = duration, minutes, seconds;
    var counter = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        /* adds 0 to the front of the timer if < 10 */
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        $("#time").html(seconds);

        /* stops and clears timer */
        if (--timer < 0) {
            timer = duration;
            clearInterval(counter);
            var audio = new Audio('../../media/timeUp.mp3').play();
        }

        $("#stop").on("click", function() {
            clearInterval(counter);
        });
    }, 1000);
});

/* adds to the clock */
$("#plus10s").on("click", function() {
    sec = 10;
    $("#time").html(sec)
});
$("#plus30s").on("click", function() {
    sec = 30;
    $("#time").html(sec)
});

$("#plus1m").on("click", function() {
    sec = 60;
    $("#time").html(sec)
});

/* subtracts from the clock */

