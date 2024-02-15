var seconds = "";

var running = false;
function secondPassed() {
    var heures = Math.round((seconds - 1800)/3600);
    var minutes = Math.round((seconds - 30)/60);
    var compteSeconds = seconds % 60;
    if (compteSeconds < 10) {
        compteSeconds = "0" + compteSeconds;
    }
    document.getElementById('countdown').innerHTML =  +heures+ " : " +minutes+ " : " +compteSeconds + " ";
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "TAPITRA NY LALAO";
    } else {
        seconds--;
    }
}

var startbutton="";
function start (startbutton) {
      setTimeout(function()
    {
        setToBlack(startbutton)
    }, 1000);
}

function stop1(){
    clearInterval(countdownTimer);
}
function min30(){
    seconds = 1800;
    document.getElementById('countdown').innerHTML = "30 minutes";
}
function min15(){
    seconds = 900;
    document.getElementById('countdown').innerHTML = "15 minutes";
}
function min20(){
    seconds = 1200;
    document.getElementById('countdown').innerHTML = "20 minutes";
}
function min45(){
    seconds = 2700;
    document.getElementById('countdown').innerHTML = "45 minutes";
}
function min5(){
    seconds = 300;
    document.getElementById('countdown').innerHTML = "5 minutes";
}