var seconds = 3600; //the number of seconds to count down
var timer; //the variable that holds the setInterval function
function countdown() {
  seconds--; //decrement the seconds
  console.log(seconds)
  if (seconds == 0) { //if the countdown is over
    clearInterval(timer); //clear the timer
    alert("Session Timeout")
    window.location.href = "login.php"; //redirect to the login page
  }
}
function startTimer() {
  timer = setInterval(countdown, 1000); //start the countdown
}

function remaining(){
    var resecond=520;
}