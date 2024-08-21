const date = new Date();
const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
var data = date.toLocaleDateString('en-US', options);

const nowDateElement = document.getElementById("nowDate");
const currentDate = new Date().toLocaleString();
if (nowDateElement) {
  nowDateElement.textContent = data;
} else {
  console.error("Element with id 'nowDate' not found.");
}

var time = document.getElementById("time");
function updateTime() {
    const now = new Date();
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();
  
    // Add leading zero if hour is less than 10
    hours = hours < 10 ? `0${hours}` : hours;
  
    // Add leading zero if minute is less than 10
    minutes = minutes < 10 ? `0${minutes}` : minutes;
  
    // Add leading zero if second is less than 10
    seconds = seconds < 10 ? `0${seconds}` : seconds;
  
    const timeString = `${hours}:${minutes}:${seconds}`;
    time.innerHTML=timeString;
  }
  
  setInterval(updateTime, 1000);
  