<template>


<div>
  <button type="button" class="mt-3 mb-3 custom-button" @click="returnHome" style="background-color: rgb(155, 236, 253); padding: 10px; border-radius: 10px;">
          Return Home
        </button>


    <div id="app" class="web-camera-container">
 
      <div class="camera-button">
          <button style="margin-bottom: 50px; background-color: rgb(155, 236, 253); padding: 10px; border-radius: 10px;" type="button" class=" custom-button button is-rounded"  @click="toggleCamera">
            <span v-if="!isCameraOpen">Open Camera</span>
            <span v-else>Close Camera</span>
        </button>
      </div>
      
      <div v-show="isCameraOpen && isLoading" class="camera-loading">
        <ul class="loader-circle">
        </ul>
      </div>
      
      <div v-if="isCameraOpen" v-show="!isLoading" class="camera-box" :class="{ 'flash' : isShotPhoto }">
        
        <div class="camera-shutter" :class="{'flash' : isShotPhoto}"></div>
          
        <video v-show="!isPhotoTaken" ref="camera" :width="450" :height="337.5" autoplay></video>
        
        <canvas v-show="isPhotoTaken" id="photoTaken" ref="canvas" :width="450" :height="337.5"  style="margin-top: 350px; "></canvas>
      </div>
      
      <div v-if="isCameraOpen && !isLoading" class="camera-shoot">
        <button type="button" class="button" @click="takePhoto">
          <img src="https://img.icons8.com/material-outlined/50/000000/camera--v2.png">
        </button>
      </div>
      
      <div v-if="isPhotoTaken && isCameraOpen" class="camera-download">
        <div class = 'center_form black'>
            <label class ='' for="first_name">Customer Name</label>
            <input name="first_name" v-model="customer.name" placeholder="first name" class="form-control black" />
        </div>
        <div class = 'center_form'>
            <label class ='' for="first_name">Phone Number</label>
            <input name="first_name" v-model="customer.phone" placeholder="Your phone" class="form-control black" />
        </div>
        <button id="downloadPhoto" download="my-photo.jpg" class="button custom-button mt-3" role="button" @click="downloadImage" style="background-color: rgb(155, 236, 253); padding: 10px; border-radius: 10px;">
          Done
        </button>
      </div>
    </div>
  </div>
    </template>
<style>
.custom-button{
    border: none;   
    border-radius: 4px; 
    box-shadow: 0 5px 0 #ffffff;
    transition: .5s;
}
.custom-button:active{ 
    box-shadow: none;
    transform: translateY(5px);
}
.custom-button:hover{ 
  background-color:  #badaf0;
}
.black{
  color:black !important;
}

  </style>
    <script >
    export default{
        data() {
        return {
          isCameraOpen: false,
          isPhotoTaken: false,
          isShotPhoto: false,
          isLoading: false,
          link: '#',
          customer: { 
            name: "", 
            phone: ""
          }
        }
      },
      methods: {
        toggleCamera() {
          if(this.isCameraOpen) {
            this.isCameraOpen = false;
            this.isPhotoTaken = false;
            this.isShotPhoto = false;
            this.stopCameraStream();
          } else {
            this.isCameraOpen = true;
            this.createCameraElement();
          }
        },

        
        returnHome(){
          window.location.href = "/home"
        },

        //opencamera
        createCameraElement() {
          this.isLoading = true;
          const constraints = (window.constraints = {
                    audio: false,
                    video: true
                });
                navigator.mediaDevices
                    .getUserMedia(constraints)
                    .then(stream => {
              this.isLoading = false;
                        this.$refs.camera.srcObject = stream;
                    })
                    .catch(error => {
              this.isLoading = false;
                        alert("May the browser didn't support or there is some errors.");
                    });
        },
        
        //close camera
        stopCameraStream() {
          let tracks = this.$refs.camera.srcObject.getTracks();
                tracks.forEach(track => {
                    track.stop();
                });
        },
        
        //takephoto
        takePhoto() {
          if(!this.isPhotoTaken) {
            this.isShotPhoto = true;
            const FLASH_TIMEOUT = 50;
            setTimeout(() => {
              this.isShotPhoto = false;
            }, FLASH_TIMEOUT);
          }
          this.isPhotoTaken = !this.isPhotoTaken;
          const context = this.$refs.canvas.getContext('2d');
          context.drawImage(this.$refs.camera, 0, 0, 450, 337.5);
        },
        
        //downphototofolder
        downloadImage() {
          const canvas = document.getElementById("photoTaken").toDataURL("image/jpeg")
          axios.post('/take_snap_shot',{
            image : canvas ,
            name : this.customer.name,
            phone_number: this.customer.phone
          }      
          )
          .then(window.location.href='home')
        }
    }
  }
  </script>
  <style>
  </style>