


//Google Analytics Scroll reach tracking plugin by Dave Taylor
//Free to use but Please link back if you find this plugin useful - http://www.dave-taylor.co.uk


$(document).ready(function() { 
    var u=0; 
    var d = $(document).height();
   
    var v = $(window).height();
    
    var p = (d/10);
    
    var vp = Math.round((v/d)*100);
     
    
    
   var title = document.title;
   var _gaq = _gaq || [];


    if (v>p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '10%',10,true]);
    }
      if (v>2*p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '20%',20,true]);
    }
      if (v>3*p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '30%',30,true]);
    }
      if (v>4*p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '40%',40,true]);
    }
      if (v>5*p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '50%',50,true]);
    }
      if (v>6*p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '60%',60,true]);
    }
      if (v>7*p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '70%',70,true]);
    }
      if (v>8*p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '80%',80,true]);
    }
      if (v>9*p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '90%',90,true]);
    }
      if (v>10*p) {
    _gaq.push(['_trackEvent', title, 'scroll reach', '100%',100,true]);
    }
    
    var m = Math.floor(v/p);
    
    
    var q =(d*((m+1)/10));
    
    
    var s = (q-v);
     
    
    
 var invoked = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= s && !invoked ){
        invoked = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+1)*10) + '%',((m+1)*10),true]);
    }
});

 var i = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= (s+p) && !i ){
        i = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+2)*10) + '%',((m+2)*10),true]);
    }
});
    
 var j = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= (s+(2*p)) && !j ){
        j = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+3)*10) + '%',((m+3)*10),true]);
    }
});
        
 var k = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= (s+(3*p)) && !k ){
        k = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+4)*10) + '%',((m+4)*10),true]);
    }
});

 var l = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= (s+(4*p)) && !l ){
        l = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+5)*10) + '%',((m+5)*10),true]);
    }
});

 var x = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= (s+(5*p)) && !x ){
        x = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+6)*10) + '%',((m+6)*10),true]);
    }
});
    
    
 var n = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= (s+(6*p)) && !n ){
        n = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+7)*10) + '%',((m+7)*10),true]);
    }
});
    
    
 var o = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= (s+(7*p)) && !o ){
        o = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+8)*10) + '%',((m+8)*10) ,true]);
    }
});
    
 var b = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= (s+(8*p)) && !b ){
        b = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+9)*10) + '%',((m+9)*10),true]);
    }
});
    
 var c = false;
 $(window).scroll(function(){
    if ($(window).scrollTop() >= (s+(9*p)) && !c ){
        c = true; // don't call this twice
        _gaq.push(['_trackEvent', title, 'scroll reach', ((m+10)*10) + '%',((m+10)*10),true]);
    }
});
    
     
});






