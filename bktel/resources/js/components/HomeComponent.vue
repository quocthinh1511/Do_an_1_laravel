<template >
<div>
      <!-- <b-carousel
        id="carousel-1"
        v-model="slide"
        :interval="4000"
        controls
        indicators
        background="#ababab"
        img-width="1024"
        img-height="480"
        style="text-shadow: 1px 1px 2px #333;"
        @sliding-start="onSlideStart"
        @sliding-end="onSlideEnd"
      > -->
        <!-- Text slides with image -->
        <!-- <b-carousel-slide
          caption="First slide"
          text="Nulla vitae elit libero, a pharetra augue mollis interdum."
          img-src="https://picsum.photos/1024/480/?image=52"
        ></b-carousel-slide> -->
  
        <!-- Slides with custom text -->
        <!-- <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54">
          <h1>Hello world!</h1>
        </b-carousel-slide> -->
  
        <!-- Slides with image only -->
        <!-- <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=58"></b-carousel-slide> -->
  
        <!-- Slides with img slot -->
        <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
        <!-- <b-carousel-slide>
          <template #img>
            <img
              class="d-block img-fluid w-100"
              width="1024"
              height="480"
              src="https://picsum.photos/1024/480/?image=55"
              alt="image slot"
            >
          </template>
        </b-carousel-slide> -->
  
        <!-- Slide with blank fluid image to maintain slide aspect ratio -->
        <!-- <b-carousel-slide caption="Blank Image" img-blank img-alt="Blank image">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eros felis, tincidunt
            a tincidunt eget, convallis vel est. Ut pellentesque ut lacus vel interdum.
          </p>
        </b-carousel-slide>
      </b-carousel>
      -->

      <!-- <p class="mt-4">
        Slide #: {{ slide }}<br>
        Sliding: {{ sliding }}
      </p> -->
      

  <video id="video" width="720" height="560" autoplay muted></video>
  <div class='center_form'>
          <label class='black' for="first_name">Name</label>
          <input name="name" v-model="customer.name" placeholder="Name" class="form-control " />
        </div>
        <div class='center_form'>
          <label class='black' for="first_name">Phone Number</label>
          <input name="phone_number" v-model="customer.phone_number" placeholder="Phone Number" class="form-control " />
        </div>
        <div class="centerr">
          <button class="btn btn-primary center_form centerr but_student custom-button margintop-40px" @click="submit"> Submit
          </button>
        </div>
  </div>

  </template>
  <style>
  canvas{
    position: absolute;
  }
  
  body{
    margin: 0;
    padding:0;
    display:flex ;
    justify-content: center;
    align-items: center;
  }

</style>
  <script>
import * as faceapi from 'face-api.js'
// all faces


// implements nodejs wrappers for HTMLCanvasElement, HTMLImageElement, ImageData
import  canvas from 'canvas'


// patch nodejs environment, we need to provide an implementation of
// HTMLCanvasElement and HTMLImageElement, additionally an implementation
// of ImageData is required, in case you want to use the MTCNN


    export default {
      mounted(){ 
       
          const video = document.getElementById('video')
          Promise.all([
            faceapi.nets.tinyFaceDetector.loadFromUri('/models'),
            faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
            faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
            faceapi.nets.faceExpressionNet.loadFromUri('/models'),
            faceapi.nets.ageGenderNet.loadFromUri('/models')
          ]).then(startVideo)
          
          function startVideo() {
            navigator.getUserMedia(
              { video: {} },
              stream => video.srcObject = stream,
              err => console.error(err)
            )
     
          
          video.addEventListener('play', () => {
            
              const canvas = faceapi.createCanvasFromMedia(video)
              document.body.append(canvas)
              const displaySize = { width: video.width, height: video.height }
              faceapi.matchDimensions(canvas, displaySize)
              setInterval(async () => {
              const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions().withAgeAndGender()

             
              
              const resizedDetections = faceapi.resizeResults(detections, displaySize)
              canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
              faceapi.draw.drawDetections(canvas, resizedDetections)
              faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
              faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
              resizedDetections.forEach( detection => {
              const box = detection.detection.box
              const drawBox = new faceapi.draw.DrawBox(box, { label: Math.round(detection.age) + " year old " + detection.gender })
              drawBox.draw(canvas)
              })
       
            }, 100)
          })
          }
      }
      ,
      data() {
        return {
          slide: 0,
          sliding: null,
          customer: {
          name: "",
          phone_number : "",
          land_mark: ""
          }
        }
      },
      methods: {
        onSlideStart(slide) {
          this.sliding = true
        },
        onSlideEnd(slide) {
          this.sliding = false
        },
        async submit(){
          
          const video = document.getElementById('video')
          Promise.all([
            faceapi.nets.tinyFaceDetector.loadFromUri('/models'),
            faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
            faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
            faceapi.nets.faceExpressionNet.loadFromUri('/models'),
            faceapi.nets.ageGenderNet.loadFromUri('/models')
          ])
          const detectionWithLandmarks = await faceapi.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks()
          console.log(detectionWithLandmarks);
          await axios.post('submit_customer', {
            name: this.customer.name,
            phone_number : this.customer.phone_number,
            land_mark: detectionWithLandmarks
      })
        } 
         }
      }
    
  </script>