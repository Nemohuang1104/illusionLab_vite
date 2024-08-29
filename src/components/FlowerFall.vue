<template>
  <div id="flower">
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>
    <i><img src="../assets/images/duck.png" alt=""></i>


  </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>

#flower{
  position:relative;
  top:-450px;
  width:100%;
  text-align: right;

  i{
    display: inline-block;
    width: 200px;
    height: 150px;
    // background: linear-gradient(to bottom right, #309900, #005600);
    transform: skew(20deg);
    // border-radius: 5% 40% 70%;
    // box-shadow: inset 0px 0px 1px #222;
    // border: 1px solid #333;
    z-index: 1;
    animation: falling 5s 0s infinite;
    // transform-origin: -10px -10px;
  }

  

    :nth-of-type(2n) { 
      animation: falling2 5s 0s infinite; 
    };

    :nth-of-type(3n) { animation: falling3 5s 0s infinite; 
    }

    
    :nth-of-type(n)    { height:230px; width:300px; }
    // :nth-of-type(n):before { width:7px; height:5px; top:17px; right:10px; }
    // :nth-of-type(n):after { width:2px; height:17px; left: 12px; top:0px; }

    :nth-of-type(2n+1)    { height:230px; width:300px; }
    // :nth-of-type(2n+1):before { width:4px; height:3px; top:7px; right:0px; }
    // :nth-of-type(2n+1):after { width:2px; height:6px; left: 5px; top:1px; }

    :nth-of-type(3n+2)  { height:17px; width:23px; }
    // :nth-of-type(3n+2):before  { height:4px; width:4px; top:12px; right:1px; }
    // :nth-of-type(3n+2):after  { height:10px; width:2px; top:1px; left:8px; }

    :nth-of-type(n)   { animation-delay: 1.9s;}
    :nth-of-type(2n)  { animation-delay: 2.9s;}
    :nth-of-type(3n)  { animation-delay: 1.3s;}
    :nth-of-type(4n)  { animation-delay: 2.4s;}
    :nth-of-type(5n)  { animation-delay: 2s;  }
    :nth-of-type(6n)  { animation-delay: 1.5s;}
    :nth-of-type(7n)  { animation-delay: 1.8s;}
    :nth-of-type(8n)  { animation-delay: .5s;}
    :nth-of-type(9n)  { animation-delay: 1.3s;}
    :nth-of-type(10n) { animation-delay: 1.5s;}
    :nth-of-type(11n) { animation-delay: 0.8s;}
    :nth-of-type(12n) { animation-delay: 2.1s;}
    :nth-of-type(13n) { animation-delay: 0s;  }
    :nth-of-type(14n) { animation-delay: 2.7s;}
    :nth-of-type(15n) { animation-delay: 1s;  }

    // :nth-of-type(n)    { background: linear-gradient(to bottom right, #309900, #005600); }
    // :nth-of-type(2n+2)  { background: linear-gradient(to bottom right, #5e9900, #2b5600); }
    // :nth-of-type(4n+1)  { background: linear-gradient(to bottom right, #990, #564500); }

    // :nth-of-type(n)    { opacity: .7;}
    // :nth-of-type(3n+1)  { opacity: .5;}
    // :nth-of-type(3n+2)  { opacity: .3;}

    :nth-of-type(n)    {transform: rotate(180deg);}


    :nth-of-type(n) { animation-timing-function:ease-in-out;}
    
  }

@keyframes falling {
  
  0% {
      transform:
          translate3d(0,0,0)
          rotate(0deg);
      opacity: 0;
          
      }

  20% {
       opacity: 1;
       transform:
          translate3d(0,0,0)
          rotate(0deg);
        opacity: 1;
  }

  80%{
    opacity: 1;

  }
  
  100% {
      transform:
          translate3d(-350px,700px,0)
          rotate(90deg);
           opacity: 0;

      }
}

@keyframes falling3 {
     0% {
        transform:
            translate3d(0,0,0)
            rotate(-20deg);
      opacity: 0;

    }

    20% {
       opacity: 1;

  }

  80%{
    opacity: 1;

  }
    
    100% {
        transform:
            translate3d(-230px,640px,0)
            rotate(-70deg);
        opacity: 0;
    }
}

@keyframes falling2 {
     0% {
        transform:
            translate3d(0,0,0)
            rotate(90deg);
      opacity: 0;

    }

    20% {
       opacity: 1;

  }
  80%{
    opacity: 1;

  }
    
    100% {
        transform:
            translate3d(-400px,680px,0)
            rotate(0deg);
        opacity: 0;
    }
}


</style>