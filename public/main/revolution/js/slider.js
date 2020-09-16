/* Home_Page Slider
------------------------*/

/* homepage-1*/

var revapi41,
    tpj=jQuery;
     tpj(document).ready(function() {
      if(tpj("#rev_slider_4_1").revolution == undefined){
          revslider_showDoubleJqueryError("#rev_slider_4_1");
        }else{
          revapi41 = tpj("#rev_slider_4_1").show().revolution({
            sliderType:"standard",
            sliderLayout: "auto",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
              keyboardNavigation:"off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation:"off",
              mouseScrollReverse:"default",
              onHoverStop:"off",
              touch:{
                touchenabled:"on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
              }
              ,
              arrows: {
                style:"zeus",
                enable:false,
                hide_under:991,
                hide_onleave:false,
                tmp:'',
                left: {
                  h_align:"left",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                },
                right: {
                  h_align:"right",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                }
            },

             bullets: {
 
                    enable: true,
                    style: 'uranus',
                    direction: 'horizontal',
                    rtl: false,
             
                    container: 'slider',
                    h_align: 'center',
                    v_align: 'bottom',
                    h_offset: 0,
                    v_offset: 20,
                    space: 5,
             
                    hide_onleave: false,
                    hide_onmobile: false,
                    hide_under: 768,
                    hide_over: 9999,
                    hide_delay: 200,
                    hide_delay_mobile: 1200

                  }
             
                },          


            responsiveLevels:[1240,1024,778,480],
            visibilityLevels:[1240,1024,778,480],
            gridwidth:[1240,1024,778,480],
            gridheight:[876,715,450,350],
            lazyType:"none",
            shadow:0,
            spinner:"",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            disableProgressBar:"on",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
            }
          });
        }
      });


/* homepage-2*/

    var revapi42,
    tpj=jQuery;
     tpj(document).ready(function() {
      if(tpj("#rev_slider_4_2").revolution == undefined){
          revslider_showDoubleJqueryError("#rev_slider_4_2");
        }else{
          revapi41 = tpj("#rev_slider_4_2").show().revolution({
            sliderType:"standard",
            sliderLayout: "auto",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
              keyboardNavigation:"off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation:"off",
              mouseScrollReverse:"default",
              onHoverStop:"off",
              touch:{
                touchenabled:"on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
              }
              ,
              arrows: {
                style:"zeus",
                enable:true,
                hide_under:767,
                hide_onleave:false,
                tmp:'',
                left: {
                  h_align:"left",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                },
                right: {
                  h_align:"right",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                }
              }
            },
            responsiveLevels:[1240,1024,778,480],
            visibilityLevels:[1240,1024,778,480],
            gridwidth:[1240,1024,778,480],
            gridheight:[800,715,450,350],
            lazyType:"none",
            shadow:0,
            spinner:"",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            disableProgressBar:"on",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
            }
          });
        }
      });

    
     /*header-classic*/
    var revapi43,
    tpj=jQuery;
     tpj(document).ready(function() {
      if(tpj("#rev_slider_4_3").revolution == undefined){
          revslider_showDoubleJqueryError("#rev_slider_4_3");
        }else{
          revapi41 = tpj("#rev_slider_4_3").show().revolution({
            sliderType:"standard",
            sliderLayout: "auto",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
              keyboardNavigation:"off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation:"off",
              mouseScrollReverse:"default",
              onHoverStop:"off",
              touch:{
                touchenabled:"on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
              }
              ,
              arrows: {
                style:"zeus",
                enable:true,
                hide_under:991,
                hide_onleave:false,
                tmp:'',
                left: {
                  h_align:"left",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                },
                right: {
                  h_align:"right",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                }
            },

             bullets: {
 
                    enable: false,
                    style: 'uranus',
                    tmp: '',
                    direction: 'horizontal',
                    rtl: false,
             
                    container: 'slider',
                    h_align: 'center',
                    v_align: 'bottom',
                    h_offset: 0,
                    v_offset: 20,
                    space: 5,
             
                    hide_onleave: false,
                    hide_onmobile: false,
                    hide_under: 768,
                    hide_over: 9999,
                    hide_delay: 200,
                    hide_delay_mobile: 1200

                  }
             
                },          


            responsiveLevels:[1240,1024,778,480],
            visibilityLevels:[1240,1024,778,480],
            gridwidth:1240,
            gridheight:730,
            lazyType:"none",
            shadow:0,
            spinner:"",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            disableProgressBar:"on",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
            }
          });
        }
      });



   /* home-shop*/
    var revapi44,
    tpj=jQuery;
     tpj(document).ready(function() {
      if(tpj("#rev_slider_4_4").revolution == undefined){
          revslider_showDoubleJqueryError("#rev_slider_4_4");
        }else{
          revapi41 = tpj("#rev_slider_4_4").show().revolution({
            sliderType:"standard",
            sliderLayout: "auto",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
              keyboardNavigation:"off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation:"off",
              mouseScrollReverse:"default",
              onHoverStop:"off",
              touch:{
                touchenabled:"on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
              }
              ,
              arrows: {
                style:"zeus",
                enable:true,
                hide_under:767,
                hide_onleave:false,
                tmp:'',
                left: {
                  h_align:"left",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                },
                right: {
                  h_align:"right",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                }
              }
            },
            responsiveLevels:[1240,1024,778,480],
            visibilityLevels:[1240,1024,778,480],
            gridwidth:[1240,1240,778,480],
            gridheight:[973,915,480,380],
            lazyType:"none",
            shadow:0,
            spinner:"",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            disableProgressBar:"on",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
            }
          });
        }
      });



      /*header-elegant*/
    var revapi45,
    tpj=jQuery;
     tpj(document).ready(function() {
      if(tpj("#rev_slider_4_5").revolution == undefined){
          revslider_showDoubleJqueryError("#rev_slider_4_5");
        }else{
          revapi41 = tpj("#rev_slider_4_5").show().revolution({
            sliderType:"standard",
            sliderLayout: "auto",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
              keyboardNavigation:"off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation:"off",
              mouseScrollReverse:"default",
              onHoverStop:"off",
              touch:{
                touchenabled:"on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
              }
              ,
              arrows: {
                style:"zeus",
                enable:true,
                hide_under:767,
                hide_onleave:false,
                tmp:'',
                left: {
                  h_align:"left",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                },
                right: {
                  h_align:"right",
                  v_align:"center",
                  h_offset:20,
                  v_offset:0
                }
              }
            },
            responsiveLevels:[1240,1024,778,480],
            visibilityLevels:[1240,1024,778,480],
            gridwidth:[1240,1240,778,480],
            gridheight:[785,785,450,350],
            lazyType:"none",
            shadow:0,
            spinner:"",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            disableProgressBar:"on",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
            }
          });
        }
      });
