const getCurrentTimeDate = () => 
{
        let currentTimeDate = new Date();

        var weekday = new Array(7);
        weekday[0] = "DIM";
        weekday[1] = "LUN";
        weekday[2] = "MAR";
        weekday[3] = "MER";
        weekday[4] = "JEU";
        weekday[5] = "VEN";
        weekday[6] = "SAM";

        var month = new Array();
        month[0] = "JAN";
        month[1] = "FEV";
        month[2] = "MAR";
        month[3] = "AVR";
        month[4] = "MAI";
        month[5] = "JUN";
        month[6] = "JUI";
        month[7] = "AOU";
        month[8] = "SEP";
        month[9] = "OCT";
        month[10] = "NOV";
        month[11] = "DEC";

        var hours   =  currentTimeDate.getHours();

        var minutes =  currentTimeDate.getMinutes();
        minutes = minutes < 10 ? '0'+minutes : minutes;

        /*
         var AMPM = hours >= 12 ? 'PM' : 'AM';

        
        if(hours === 12)
        {
            hours=12;

        }
        else
        {
            hours = hours%12;
        }
        */
        //var currentTime = `${hours}:${minutes}${AMPM}`;
        var currentTime = `${hours}:${minutes}`;
        var currentDay = weekday[currentTimeDate.getDay()];

        var currentDate  = currentTimeDate.getDate();
        var currentMonth = month[currentTimeDate.getMonth()];
        var CurrentYear = currentTimeDate.getFullYear();

        var fullDate = `${currentDate} ${currentMonth} ${CurrentYear}`;


        document.getElementById("time").innerHTML = currentTime;
        document.getElementById("day").innerHTML = currentDay;
        document.getElementById("date").innerHTML = fullDate;

        setTimeout(getCurrentTimeDate, 500);

    }
    getCurrentTimeDate();


    /*----------------------------- ADDING DOCUMENTS FORM PARAM ---------------------*/


    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("addADocumentButton");

    // Get the <span> element that closes the modal
    var span = document.getElementById("closing1");

    // When the user clicks the button, open the modal 
    btn.onclick = function() 
    {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() 
    {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) 
    {
      if (event.target == modal) 
      {
        modal.style.display = "none";
      }
    }

    /*----------------- END ADDING DOCUMENTS FORM PARAM -----------------*/

    /*------------------------------------------- SHOW BLOB AS PDF IN BROWSER WINDOW ------------------------------------*/
function debugBase64(base64URL)
{
  //console.log(base64URL);
    var win = window.open();
    win.document.write('<iframe src="' + base64URL  + '" frameborder="0" style="border:0; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%;" allowfullscreen></iframe>');
}
//debugBase64();

/*------------------------------------------- END SHOW BLOB AS PDF IN BROWSER WINDOW ------------------------------------*/




    /*----------------------------- SHARING DOCUMENTS FORM PARAM ---------------------*/

function showFunction()
{
    // Get the modal
    var modal2 = document.getElementById("myModal2");

    // Get the button that opens the modal
    var btn2 = document.getElementById("shareButton");

    // Get the <span> element that closes the modal
    var span2 = document.getElementById("closing2");
    // When the user clicks the button, open the modal 
    btn2.onclick = function()
    {
      modal2.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span2.onclick = function() 
    {
      modal2.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) 
    {
      if (event.target == modal2) 
      {
        modal2.style.display = "none";
      }
    }
 }
    /* ----------------- END SHARING DOCUMENTS FORM PARAM ----------------- */


function showConditions()
{
  document.getElementById('conditionBloc').style.display = "block";
  document.getElementById('documentAddingConfirmFalseButton').style.display = "none";
  document.getElementById('documentAddingConfirmButton').style.display = "inline-block";
  
}