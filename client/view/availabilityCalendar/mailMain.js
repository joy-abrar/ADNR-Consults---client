/* ------------------------------------------------------------------------ TINYMCE ----------------------------------------------------------------------*/
    tinymce.init({

      selector: 'textarea',
      menubar: 'false',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
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