var selectedFile=document.getElementById("selectedFile");
selectedFile.addEventListener("change",(e)=>{
    var file=e.target.files[0];


    var xhr=new XMLHttpRequest();
    xhr.open("POST","/Assignment/Question_23/Pages/upload.php",true);  
    var formData=new FormData();
    formData.append("file",file);
    xhr.send(formData);

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            // some code ...
            if(xhr.response==200){
                document.getElementById("res").innerText="Image Successfully Uploaded... Wait to reload";
                setTimeout(function () { 
                    window.location.pathname="/Assignment/Question_23/Pages/";
                 },500);


            }   
            else{
                document.getElementById("res").innerText="Please try again later";
            }
          
        }
    }

})