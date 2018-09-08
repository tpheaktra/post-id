$("#images").change(function(e) {
    e.preventDefault();
    $("#image_message").html(''); // To remove the previous error message
    var file = this.files[0];
    defaultimg = file.name;
    var imagefile = file.type;
    var match = ["image/jpeg", "image/png", "image/jpg"];
    var sizefile = this.files[0].size;
    var form = this;
    file_check = this.files && this.files[0];

    var fileName = document.getElementById("images").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

    console.log(extFile);

    //check size
    if (sizefile < 9000000) {
        //check width and height
        if( file_check ) {
            var img = new Image();
            img.src = window.URL.createObjectURL( file );
            img.onload = function() {
                var width = img.naturalWidth,
                    height = img.naturalHeight;
                window.URL.revokeObjectURL( img.src );

                if( (width <= 1024 && height <= 1024) && ((extFile == 'png') || (extFile == 'jpg') || (extFile == 'jpeg'))) {
                    $("#image_message").html("<p class='alert alert-success'>ជោគជ័យសម្រាប់រូបភាពដែលជ្រើសរើស</p>");
                    var reader = new FileReader();
                    //imageIsLoaded
                    reader.onload = function(e) {
                        $("#images").css("color", "green");
                        document.getElementById("submit1").disabled = false;
                        $('#image-defalt').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);

                }
                else {
                    document.getElementById("submit1").disabled = true;
                    $('#image-defalt').attr('src', '/upload/avatar5.png');
                    $("#image_message").html("<p class='alert alert-danger'>Your image allow min size(1024x1024)pixcel <br> Allow File Type: jpeg,png,jpg</p>");
                    return false;
                }
            }
        }else {
            $('#image-defalt').attr('src', '/upload/avatar5.png');
            $('.fileinput-exists').attr('src', '/upload/avatar5.png');
            document.getElementById("submit1").disabled = true;
            $("#image_message").html("<p class='alert alert-danger'>Allow File Type: jpeg,png,jpg</p>");
            return false;
        }

    } else {
        document.getElementById("submit1").disabled = true;
        $('#image-defalt').attr('src', '/upload/avatar5.png');
        $("#image_message").html("<p class='alert alert-danger'>Your image more then 1M</p>");
        return false;
    }
});


$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});