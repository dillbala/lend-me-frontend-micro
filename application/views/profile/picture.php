<?php if (!empty($error))
{
    echo $error;
}?>





<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.9.1.min.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container col-sm-4">


    <!-- Modal -->
    <div class="modal fade" id="modalId" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
<!--                    <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <h4 class="modal-title">Camera Access</h4>
                </div>
                <div class="modal-body">
                    <p>We need access to your camera to take a picture of yours.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id = "closeModal" class="btn btn-default" data-dismiss="modal">Accept</button>
                </div>
            </div>

        </div>
    </div>

</div>
<div class="col-sm-4"></div>
<div class="col-sm-4"></div>




<div class="container-fluid">
<video id="video" width="240" height="200" autoplay></video>
<canvas id="canvas" width="240" height="200"></canvas>
<hr>

    <div class="row">
    <div class="col-sm-4" id="snapButton" style="visibility: hidden">
<button id="snap" class="btn btn-primary">Capture Photo</button>
    </div>


    <div id="uploadButton" class="col-sm-4" style="visibility: hidden">
<button class="btn btn-primary" id="upload">Submit</button>
    </div>

    </div>
</div>
<script>


    $(window).on('load',function(){
        document.getElementById('uploadButton').style.visibility='hidden';
        document.getElementById('snapButton').style.visibility='hidden';
        $('#modalId').modal('show');
    });

$('#closeModal').click(function () {

    $('#modalId').modal('hide');

    takePicture();
})

function  takePicture() {




    var video = document.getElementById('video');

// Get access to the camera!
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
// Not adding `{ audio: true }` since we only want video now
        navigator.mediaDevices.getUserMedia({video: true}).then(function (stream) {
            video.src = window.URL.createObjectURL(stream);
            video.play();
        });
    }
    document.getElementById('snapButton').style.visibility='visible';

}
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var video = document.getElementById('video');


    document.getElementById("upload").addEventListener("click", function () {
        var image = new Image();

        image.src = canvas.toDataURL("image/jpg");
        console.log(image);
        $.post("<?php echo base_url() . 'profile/upload'?>", {
            file: canvas.toDataURL("image/jpg"),
        }, function (data) {
            if (data === 'success') {
                alert("Successfully uploaded");
                window.location.href = '<?php echo base_url() . "profile/"?>';
                return false;

            }
            else {
                alert(data);
            }
        });


    });


// Trigger photo take
    document.getElementById("snap").addEventListener("click", function () {
        context.drawImage(video, 0, 0, 240, 200);
        document.getElementById('uploadButton').style.visibility='visible';

    });



</script>
