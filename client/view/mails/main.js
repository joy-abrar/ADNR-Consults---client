 /* --------------------------- LOADING SCREEN SCRIPT -------------------- */
//paste this code under the head tag or in a separate js file.
// Wait for window load
$(window).load(function() 
{
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
});

/* -------------------- END LOADING SCREEN SCRIPT -------------------- */

const getCurrentTimeDate = () => {
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




/* ------------------------------------------------------------------------ TINYMCE ----------------------------------------------------------------------*/
  tinymce.init({

      selector: 'textarea',
      menubar: 'false',
      //plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      plugins: 'autolink lists media table',
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
      //toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',

      height: '24rem',
      width: '98%',
      content_style: "textArea { padding-left: 1%; }",
      branding: false,
    });

    /* ------------------------------------------------------------------------END TINYMCE ------------------------------------------------------------------*/

let mailFunctionStatus = 'allMailFunction' ;
    function mail(status)
    {

        switch (status)
        {
            case 'writeFunction' : 
            mailFunctionStatus = 'writeFunction';
            document.getElementById('writeAmail').style = "display:flex";
            document.getElementById('allMail').style = "display:none";
            document.getElementById('archiveMail').style = "display:none";
            document.getElementById('sentMail').style = "display:none";
            document.getElementById('readMail').style = "display:none";
            document.getElementById('unreadMail').style = "display:none";
            break;

            case 'allMailFunction' : 
            mailFunctionStatus = 'allMailFunction';
            document.getElementById('allMail').style = "display:flex";
            document.getElementById('writeAmail').style = "display:none";
            document.getElementById('archiveMail').style = "display:none";
            document.getElementById('sentMail').style = "display:none";
            document.getElementById('readMail').style = "display:none";
            document.getElementById('unreadMail').style = "display:none";
            break;

            case 'archiveFunction' : 
            mailFunctionStatus = 'archiveFunction';
            document.getElementById('archiveMail').style = "display:flex";
            document.getElementById('writeAmail').style = "display:none";
            document.getElementById('allMail').style = "display:none";
            document.getElementById('sentMail').style = "display:none";
            document.getElementById('readMail').style = "display:none";
            document.getElementById('unreadMail').style = "display:none";
            break;

            case 'readFunction' : 
            mailFunctionStatus = 'readFunction';
            document.getElementById('readMail').style = "display:flex";
            document.getElementById('writeAmail').style = "display:none";
            document.getElementById('allMail').style = "display:none";
            document.getElementById('archiveMail').style = "display:none";
            document.getElementById('sentMail').style = "display:none";
            document.getElementById('unreadMail').style = "display:none";
            break;

            case 'unreadFunction' : 
            mailFunctionStatus = 'unreadFunction';
            document.getElementById('unreadMail').style = "display:flex";
            document.getElementById('writeAmail').style = "display:none";
            document.getElementById('allMail').style = "display:none";
            document.getElementById('archiveMail').style = "display:none";
            document.getElementById('sentMail').style = "display:none";
            document.getElementById('readMail').style = "display:none";
            break;

            case 'sentMailFunction' :
            document.getElementById('sentMail').style = "display:flex"
            document.getElementById('writeAmail').style = "display:none";
            document.getElementById('allMail').style = "display:none";
            document.getElementById('archiveMail').style = "display:none";
            document.getElementById('readMail').style = "display:none";
            document.getElementById('unreadMail').style = "display:none";
            break;
        }
    }

    function cancelSendingMail()
    {
        document.getElementById('writeAmail').style = "display:none";
    }