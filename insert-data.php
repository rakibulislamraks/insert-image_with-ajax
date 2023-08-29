<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #error-msg{
            color:red;
            padding: 8px
        }
        #preview{
            display: none;
            padding: 10px;
        }
        #preview img{
            width: 300px;
            height: auto;
        }
    </style>
</head>
<body>
   <form action="show-data.php"id="form" method="POST" enctype="multipart/form-data">
    <input type="file"id="myimage"name="file"><br>
    <input type="submit"id="submit"value="upload">

   </form>
<div id="preview">
    <div id="image_preview"></div>
</div>

   <script src="../js/jquery.js"></script>
   <script>
    $(document).ready(function(){
        $("#submit").click(function(e){
            e.preventDefault();

            let formData = new FormData();
            let img = $("#myimage")[0].files;
            if(img.length > 0){
                formData.append('my_image', img[0]);
                $.ajax({
                    url: 'show-data.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data){
                       const data1 = JSON.parse(data);
                      
                    }
                });
            }
            else{
                alert("error! please select image.");

            }
            
        });
    });

   </script>
</body>
</html>