<template>




<div class="container">
    <h1 class="text-center">Laravel webcam capture image and save from camera - ItSolutionStuff.com</h1>
     
    <form method="POST" action="">

        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" Click="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
</template>

<script>


</script>