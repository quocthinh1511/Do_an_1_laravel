<template >
<div>
  <video id="video" width="720" height="560" autoplay muted></video>

  </div>

  </template>
  <style>
  canvas{
    position: absolute;
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
      data() {
        return {
          slide: 0,
          sliding: null,
          customer: {
          name: ""        
          },
          count: []
          
        }
      },
      mounted(){ 
        axios.post('/index_name_customer')
        .then(response => {
          for(var i = 0 ; i< response.data.length;i++){
          this.count.push(response.data[i])
          }
        });
        const labels = this.count;
        const video = document.getElementById('video')
          Promise.all([
            faceapi.nets.ssdMobilenetv1.loadFromUri('/models'),
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
              const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions().withAgeAndGender().withFaceDescriptors()

              const resizedDetections = faceapi.resizeResults(detections, displaySize)
              canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
              faceapi.draw.drawDetections(canvas, resizedDetections)
              faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
              faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
              // resizedDetections.forEach( detection => {
              // const box = detection.detection.box
              // // const drawBox = new faceapi.draw.DrawBox(box, { label: Math.round(detection.age) + " year old " + detection.gender })
              // drawBox.draw(canvas)
              // })

              const labeledFaceDescriptors = await Promise.all(
                    labels.map(async label => {

              const imgUrl = `storage/uploads/${label}/test.png`
              console.log(imgUrl);
              const img = await faceapi.fetchImage(imgUrl)
        
              const faceDescription = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
        
                if (!faceDescription) {
                throw new Error(`no faces detected for ${label}`)
                }
        
              const faceDescriptors = [faceDescription.descriptor]
              return new faceapi.LabeledFaceDescriptors(label, faceDescriptors)
    })
);

const threshold = 0.4
const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, threshold)

const results = detections.map(fd => faceMatcher.findBestMatch(fd.descriptor))
console.log(results);
results.forEach((bestMatch, i) => {
    const box = detections[i].detection.box
    const text = bestMatch.toString()
    const drawBox = new faceapi.draw.DrawBox(box, { label: text })
    drawBox.draw(canvas)
})
    }, 100)
        })
          
 }
      },
     
      methods: {
        onSlideStart(slide) {
          this.sliding = true
        },
        onSlideEnd(slide) {
          this.sliding = false
        }
         }
      }
    
  </script>