function pushToast(message, code) {
  var snackbar_box = document.getElementById("snackbar");
  const codes = ['success', 'warning', 'error'];
  
  // Set the message content
  snackbar_box.innerHTML = message;
  
  // Set the background color based on the code
  switch (code) {
    case codes[0]:
      snackbar_box.style.backgroundColor = 'var(--success)';
      break;
    case codes[1]:
      snackbar_box.style.backgroundColor = 'var(--warning)';
      break;
    case codes[2]:
      snackbar_box.style.backgroundColor = 'var(--error)';
      break;
    default:
      snackbar_box.style.backgroundColor = 'var(--color)'; // Default color
  }
  
  // Show the snackbar
  snackbar_box.classList.add("show");

  // Hide the snackbar after 5 seconds
  setTimeout(function () { 
    snackbar_box.classList.remove("show"); 
  }, 5000);
}
