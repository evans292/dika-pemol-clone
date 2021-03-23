require('./bootstrap');

require('alpinejs');

import * as Popper from '@popperjs/core';
import Webcam from 'webcam-easy';

import Vue from "vue";
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css'


// ============= POPPER =====================================

/* Sidebar - Side navigation menu on mobile/responsive mode */
window.toggleNavbar  = function (collapseID) {
    document.getElementById(collapseID).classList.toggle("hidden");
    document.getElementById(collapseID).classList.toggle("bg-white");
    document.getElementById(collapseID).classList.toggle("m-2");
    document.getElementById(collapseID).classList.toggle("py-3");
    document.getElementById(collapseID).classList.toggle("px-6");
    }
    
    /* Function for dropdowns */
    window.openDropdown = function (event, dropdownID) {
    let element = event.target;
    while (element.nodeName !== "A") {
        element = element.parentNode;
    }
    Popper.createPopper(element, document.getElementById(dropdownID), {
        placement: "bottom-start",
    });
    document.getElementById(dropdownID).classList.toggle("hidden");
    document.getElementById(dropdownID).classList.toggle("block");
    }

// ============= VUE =====================================

Vue.use(VueToast);

window.greet = function(args, position = 'top') 
{
    Vue.$toast.success(`Halo ${args}!`, {
        duration: 2000,
        dismissible: true,
        position: position
       })    
}

window.success = function(args) 
{
    Vue.$toast.success(`${args}`, {
        duration: 2000,
        dismissible: true,
        position: 'top-right'
       })    
}

window.failed = function(args) 
{
    Vue.$toast.error(`${args}`, {
        duration: 2000,
        dismissible: true,
        position: 'top-right'
       })    
}

// ============= WEBCAM EASY =====================================
const webcamElement = document.getElementById('webcam');
const canvasElement = document.getElementById('canvas');
const snapSoundElement = document.getElementById('snapSound');
const webcam = new Webcam(webcamElement, 'user', canvasElement, snapSoundElement);

window.start = function(args) 
{
    webcam.start()
    .then(result =>{
      console.log("webcam started");
    })
    .catch(err => {
      console.log(err);
    });
}

window.capture = function(args) 
{
    let picture = webcam.snap();
    document.querySelector('#pic').src = picture;
}

window.stop = function (args) 
{
    webcam.stop()
}

window.save = function(params) 
{
    var base64image = document.getElementById("pic").src;

    Webcam.upload( base64image, "{{ route('presence.snap') }}", function(code, text) {
    console.log('Save successfully');
    //console.log(text);
    });
}




