function startTime() {
  var d = new Date();
  var h = d.getHours();
  var m = d.getMinutes();
  var s = d.getSeconds();
  m = timer(m);
  s = timer(s);
  document.getElementById('time').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function timer(i) {
  if (i < 10) 
  {i = "0" + i}; 
  return i;
}

function func1() {
    var x =  document.getElementById("addevent");
          if (x.style.display == "block") {
            x.style.display = "none";
          }
          else {
                 x.style.display = "block";

                }
    }

    function func2() {
    var x =  document.getElementById("savedevents");
          if (x.style.display == "block") {
            x.style.display = "none";
          }
          else {
                 x.style.display = "block";

                }
    }


  function makesound()
        {
                var audio = new Audio('audio/alaram1.mp3');
                audio.play();
                if (Notification.permission !== "granted") {
                Notification.requestPermission();
                }
                else{
                 var notification = new Notification('Hello....', {icon: 'tenor.gif',body: "Your time Up",});
                notification.onclick = function () {
                window.open("#");
                
                };
                }  
            
        } 

      


