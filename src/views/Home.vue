<template>
<div class="slider js-slider">
  <div class="slider__inner js-slider__inner"></div>
  
  <div class="slide js-slide">
    <div class="slide__content">
      <figure class="slide__img js-slide__img slide__poker" >
        <img class="slide__poker" src="@/assets/images/carousel1_2.png">
      </figure>
       <figure class="slide__img js-slide__img carousel1_1">
        <img src="@/assets/images/carousel1_1.png">
      </figure>
    </div>
    
    <div class="slider__text js-slider__text">
      <div class="slider__text-line js-slider__text-line"><div>Black is</div></div>
      <div class="slider__text-line js-slider__text-line"><div>timeless. Black is</div></div>
      <div class="slider__text-line js-slider__text-line"><div>the colour of</div></div>
      <div class="slider__text-line js-slider__text-line"><div>Eternity.</div></div>
    </div>
    
  </div>
  
  <div class="slide js-slide">
    <div class="slide__content">
      <figure class="slide__img js-slide__img">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/58281/photo3.jpg">
      </figure>
       <figure class="slide__img js-slide__img">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/58281/photo4.jpg">
      </figure>
    </div>
  </div>
  
  <div class="slide js-slide">
    <div class="slide__content">
      <figure class="slide__img js-slide__img">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/58281/photo5.jpg">
      </figure>
       <figure class="slide__img js-slide__img">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/58281/photo6.jpg">
      </figure>
    </div>
  </div>
  
  <nav class="slider__nav js-slider__nav">
    <div class="slider-bullet js-slider-bullet">
      <span class="slider-bullet__text js-slider-bullet__text">01</span>
      <span class="slider-bullet__line js-slider-bullet__line"></span>
    </div>
     <div class="slider-bullet js-slider-bullet">
      <span class="slider-bullet__text js-slider-bullet__text">02</span>
      <span class="slider-bullet__line js-slider-bullet__line"></span>
    </div>
     <div class="slider-bullet js-slider-bullet">
      <span class="slider-bullet__text js-slider-bullet__text">03</span>
      <span class="slider-bullet__line js-slider-bullet__line"></span>
    </div>
  </nav>
  
  <div class="scroll js-scroll">Scroll</div>
  
</div>

<div class="vert-text">
  <span>
    Wings+Horns<br>
    X Kyoto Black
  </span>
</div>
</template>

<script setup>
import { ref, onMounted, reactive } from 'vue';
import * as THREE from 'three';
import { gsap } from 'gsap';
import { TweenMax, TimelineMax, Expo, Power4, Linear } from 'gsap';

const vert = `
  varying vec2 vUv;
  void main() {
    vUv = uv;
    gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
  }
`;

const frag = `
  varying vec2 vUv;
  
  uniform sampler2D texture1;
  uniform sampler2D texture2;
  uniform sampler2D disp;
  
  uniform float dispPower;
  uniform float intensity;
  
  uniform vec2 size;
  uniform vec2 res;
  
  vec2 backgroundCoverUv( vec2 screenSize, vec2 imageSize, vec2 uv ) {
    float screenRatio = screenSize.x / screenSize.y;
    float imageRatio = imageSize.x / imageSize.y;
    vec2 newSize = screenRatio < imageRatio 
        ? vec2(imageSize.x * (screenSize.y / imageSize.y), screenSize.y)
        : vec2(screenSize.x, imageSize.y * (screenSize.x / imageSize.x));
    vec2 newOffset = (screenRatio < imageRatio 
        ? vec2((newSize.x - screenSize.x) / 2.0, 0.0) 
        : vec2(0.0, (newSize.y - screenSize.y) / 2.0)) / newSize;
    return uv * screenSize / newSize + newOffset;
  }
  
  void main() {
    vec2 uv = vUv;
    
    vec4 disp = texture2D(disp, uv);
    vec2 dispVec = vec2(disp.x, disp.y);
    
    vec2 distPos1 = uv + (dispVec * intensity * dispPower);
    vec2 distPos2 = uv + (dispVec * -(intensity * (1.0 - dispPower)));
    
    vec4 _texture1 = texture2D(texture1, distPos1);
    vec4 _texture2 = texture2D(texture2, distPos2);
    
    gl_FragColor = mix(_texture1, _texture2, dispPower);
  }
`;

const el = ref(null);
const inner = ref(null);
const slides = ref([]);
const bullets = ref([]);

const state = reactive({
  animating: false,
  text: false,
  initial: true,
  current: 0,
  next: 1,
  total: 0,
  delta: 0
});

let textures = [];
let renderer, scene, clock, camera, mat, disp;

const images = [
  new URL('@/assets/images/carousel1.png', import.meta.url).href,
  new URL('@/assets/images/carousel2.png', import.meta.url).href,
  new URL('@/assets/images/carousel3.png', import.meta.url).href
];

const setStyles = () => {
  slides.value.forEach((slide, index) => {
    if (index === 0) return;
    TweenMax.set(slide, { autoAlpha: 0 });
  });

  bullets.value.forEach((bullet, index) => {
    if (index === 0) return;

    const txt = bullet.querySelector('.js-slider-bullet__text');
    const line = bullet.querySelector('.js-slider-bullet__line');

    TweenMax.set(txt, { alpha: 0.25 });
    TweenMax.set(line, {
      scaleX: 0,
      transformOrigin: 'left'
    });
  });
};

const cameraSetup = () => {
  camera = new THREE.OrthographicCamera(
    el.value.offsetWidth / -2,
    el.value.offsetWidth / 2,
    el.value.offsetHeight / 2,
    el.value.offsetHeight / -2,
    1,
    1000
  );

  camera.lookAt(scene.position);
  camera.position.z = 1;
};

const setup = () => {
  scene = new THREE.Scene();
  clock = new THREE.Clock(true);

  renderer = new THREE.WebGLRenderer({ alpha: true });
  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setSize(el.value.offsetWidth, el.value.offsetHeight);

  inner.value.appendChild(renderer.domElement);
};

const loadTextures = () => {
  const loader = new THREE.TextureLoader();
  loader.crossOrigin = '';

  images.forEach((image, index) => {
    const texture = loader.load(image + '?v=' + Date.now(), render);
    texture.minFilter = THREE.LinearFilter;
    texture.generateMipmaps = false;

    if (index === 0 && mat) {
      mat.uniforms.size.value = [
        texture.image.naturalWidth,
        texture.image.naturalHeight
      ];
    }

    textures.push(texture);
  });

  disp = loader.load('https://s3-us-west-2.amazonaws.com/s.cdpn.io/58281/rock-_disp.png', render);
  disp.magFilter = disp.minFilter = THREE.LinearFilter;
  disp.wrapS = disp.wrapT = THREE.RepeatWrapping;
};

const createMesh = () => {
  mat = new THREE.ShaderMaterial({
    uniforms: {
      dispPower: { type: 'f', value: 0.0 },
      intensity: { type: 'f', value: 0.5 },
      res: { value: new THREE.Vector2(window.innerWidth, window.innerHeight) },
      size: { value: new THREE.Vector2(1, 1) },
      texture1: { type: 't', value: textures[0] },
      texture2: { type: 't', value: textures[1] },
      disp: { type: 't', value: disp }
    },
    transparent: true,
    vertexShader: vert,
    fragmentShader: frag
  });

  const geometry = new THREE.PlaneGeometry(el.value.offsetWidth, el.value.offsetHeight, 1);
  const mesh = new THREE.Mesh(geometry, mat);

  scene.add(mesh);
};

const transitionNext = () => {
  TweenMax.to(mat.uniforms.dispPower, 2.5, {
    value: 1,
    ease: Expo.easeInOut,
    onUpdate: render,
    onComplete: () => {
      mat.uniforms.dispPower.value = 0.0;
      changeTexture();
      render();
      state.animating = false;
    }
  });

  const current = slides.value[state.current];
  const next = slides.value[state.next];

  const currentImages = current.querySelectorAll('.js-slide__img');
  const nextImages = next.querySelectorAll('.js-slide__img');

  const currentText = current.querySelectorAll('.js-slider__text-line div');
  const nextText = next.querySelectorAll('.js-slider__text-line div');

  const currentBullet = bullets.value[state.current];
  const nextBullet = bullets.value[state.next];

  const currentBulletTxt = currentBullet.querySelectorAll('.js-slider-bullet__text');
  const nextBulletTxt = nextBullet.querySelectorAll('.js-slider-bullet__text');

  const currentBulletLine = currentBullet.querySelectorAll('.js-slider-bullet__line');
  const nextBulletLine = nextBullet.querySelectorAll('.js-slider-bullet__line');

  const tl = new TimelineMax({ paused: true });

  if (state.initial) {
    TweenMax.to('.js-scroll', 1.5, {
      yPercent: 100,
      alpha: 0,
      ease: Power4.easeInOut
    });

    state.initial = false;
  }

  tl.staggerFromTo(currentImages, 1.5, { yPercent: 0, scale: 1 }, { yPercent: -185, scaleY: 1.5, ease: Expo.easeInOut }, 0.075)
    .to(currentBulletTxt, 1.5, { alpha: 0.25, ease: Linear.easeNone }, 0)
    .set(currentBulletLine, { transformOrigin: 'right' }, 0)
    .to(currentBulletLine, 1.5, { scaleX: 0, ease: Expo.easeInOut }, 0);

  if (currentText) {
    tl.to(currentText, 2, { yPercent: 0 }, { yPercent: -100, ease: Power4.easeInOut }, 0);
  }

  tl.set(current, { autoAlpha: 0 }).set(next, { autoAlpha: 1 }, 1);

  if (nextText) {
    tl.fromTo(nextText, {duration: 2, yPercent: 100 }, { yPercent: 0, ease: Power4.easeOut }, 1.5);
  }

  tl.staggerFromTo(nextImages, 1.5, { yPercent: 150, scaleY: 1.5 }, { yPercent: 0, scaleY: 1, ease: Expo.easeInOut }, 0.075, 1)
    .to(nextBulletTxt, 1.5, { alpha: 1, ease: Linear.easeNone }, 1)
    .set(nextBulletLine, { transformOrigin: 'left' }, 1)
    .to(nextBulletLine, 1.5, { scaleX: 1, ease: Expo.easeInOut }, 1);

  tl.play();
};

const nextSlide = () => {
  if (state.animating) return;

  state.animating = true;
  transitionNext();

  state.current = state.current === state.total ? 0 : state.current + 1;
  state.next = state.current === state.total ? 0 : state.current + 1;
};

const changeTexture = () => {
  mat.uniforms.texture1.value = textures[state.current];
  mat.uniforms.texture2.value = textures[state.next];
};

const render = () => {
  renderer.render(scene, camera);
};

onMounted(() => {
  el.value = document.querySelector('.js-slider');
  inner.value = el.value.querySelector('.js-slider__inner');
  slides.value = [...el.value.querySelectorAll('.js-slide')];
  bullets.value = [...el.value.querySelectorAll('.js-slider-bullet')];

  state.total = images.length - 1;

  setup();
  cameraSetup();
  loadTextures();
  createMesh();
  setStyles();
  render();

  window.addEventListener('wheel', nextSlide, { passive: true });

  const links = document.querySelectorAll('.js-nav a');
  links.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      links.forEach(other => other.classList.remove('is-active'));
      link.classList.add('is-active');
    });
  });
});
</script>

<style lang="scss" scoped>
html{
  font-size: 16px;
}

html, body{
  height: 100%;
}

body{
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #111;
  font-family: 'helvetica neue', helvetica, sans-serif;
  overflow: hidden;
}

a{
  color: #fff;
  text-decoration: none;
}

.scroll{
  position: absolute;
  bottom: 2rem;
  left: 50%;
  transform: translateX(-50%);
  color: rgba(#fff, 0.5);
  font-family: 'font-2';
  font-size: calc(0.5rem + 0.35vw);
  z-index: 10;
}

.logo{
  position: absolute;
  top: 2rem;
  left: 50%;
  transform: translateX(-50%);
  padding: 0;
  margin: 0;
  z-index: 10;
  
  img{
    display: block;
    height: 1rem;
    width: auto;
  }
}

ul, li{
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav{
  position: absolute;
  top: 2rem;
  z-index: 10;
  
  &--left{
    left: 1rem;
  }
  
  &--right{
    right: 1rem;
  }
  
  ul{
    display: flex;
    align-items: center;
    height: 1rem;
  }
  
  li{
    display: block;
    margin: 0 1rem;
    padding: 0;
  }
  
  a{
    position: relative;
    display: flex;
    align-items: center;
    font-size: calc(0.5rem + 0.35vw);
    font-family: 'helvetica neue', helvetica, sans-serif;
    
    span{
      position: relative;
      
      &:before{
        content: '';
        position: absolute;
        left: 0;
        bottom: -0.35rem;
        width: 100%;
        height: 1px;
        background-color: rgba(#fff, 0.25);
        transition: transform .75s ease;
        transform-origin: right;
        transform: scaleX(0);
      }
    }
    
    &:hover,
    &.is-active {

      span{
        
        &:before{
          transform: scaleX(1);
          transform-origin: left;
        }
      }
    }
  }
}

.vert-text{
  position: absolute;
  bottom: 2rem;
  right: 2rem;
  width: 15rem;
  display: flex;
  align-items: center;
  z-index: 10;
  
  span{
    display: block;
    color: #fff;
    text-transform: uppercase;
    line-height: 1.1;
    transform: rotate(-90deg) translateY(15rem);
    transform-origin: bottom left;
    font-size: 1.35rem;
  }
}

.cart-total{
  display: block;
  height: 2rem;
  width: 2rem;
  background-color: rgba(#fff, 0.25);
  border-radius: 50%;
  text-align: center;
  line-height: 2rem;
  margin-left: 1rem;
}

.slider{
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  
  &__text{
    position: absolute;
    bottom: calc(2rem + 3vw);
    left: calc(2rem + 3vw);
    z-index: 10;
    font-size: calc(1rem + 4vw);
    text-transform: uppercase;
    transform-origin: top;
    line-height: 1.075;
    color: #fff;
    font-weight: 500;
    
    &-line{
      overflow: hidden;
    }
  }
  
  &__inner{
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
  }
  
  &__nav{
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    z-index: 10;
  }
  
  &-bullet{
    display: flex;
    align-items: center;
    padding: 1rem 0;
    
    &__text{
      color: #fff;
      font-size: 0.65rem;
      margin-right: 1rem;
    }
    
    &__line{
      background-color: #fff;
      height: 1px;
      width: 1rem;
    }
  }
  
  canvas{
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
  }
}

.slide{
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
  
  &__content{  
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
  }
  
  &__img{
    position: relative;
    width: 25vw;
    height: 70vh;
    padding: 0;
    margin: 0;
    min-width: 12.5rem;
    transform-origin: top;
    
    &:first-child{
      top: -1.5rem;
    }
    
    &:last-child{
      bottom: -1.5rem;
    }
    
    img{
      display: block;
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;

    }
    
  }

}

// .slide{
//  border: 2px solid red;
//  position: absolute;
//   left: 0;
//   top: 0;
//   right: 0;
//   bottom: 0;
//   overflow: hidden;

//   &__content{
//     display: flex;
//     align-items: center;
//     justify-content: center;
//     position: absolute;
//     left: 0;
//     top: 0;
//     right: 0;
//     bottom: 0;
//   }

//   &__img{
//     position: relative;
//     width: 25vw;
//     height: 70vh;
//     padding: 0;
//     margin: 0;
//     min-width: 12.5rem;
//     transform-origin: top;
    
//     &:first-child{
//       top: -1.5rem;
//     }
// }
// }

// img .poker{
//         position: absolute;
//         left: -440px;
//         top: -90px;
//         /* width: 100%; */
//         height: 140%;
//       }

// .poker{
//       display: block;
//       position: absolute;
//       left: -170;
//       top: 0;
//       width: unset;
//       height: unset;
//       max-width: 1200px;
//       object-fit: cover;
//     }

</style>