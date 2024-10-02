<template>
    <div id="carousel" class="noselect" @click="resetSelectedItem($event)">
      <div class="arrow arrow-left" @click="moveRight">←</div>
      <transition-group :name="direction" tag="div" mode="out-in">
        <div class="body"      
          v-for="(item, index) in generateItems()"
          :key="item.id"
          :class="['item', `level${item.level}`, { 'enlarged': item.level === 0 && selectedItem === item.id }]"
          @click="item.level === 0 && handleClick(item, $event)"
          >
            <div class="book" ref="book">
                <div class="back page"    :style="{ backgroundImage: `url('/tid102/g2/PDO/MS/back_${item.id}.jpg')` }" @click="rotatePage('back')"></div> 
                <div class="page6 r page" :style="{ backgroundImage: `url('/tid102/g2/PDO/MS/right3_${item.id}.jpg')` }" @click="rotatePage('page6')"></div>
                <div class="page5 l page" :style="{ backgroundImage: `url('/tid102/g2/PDO/MS/left3_${item.id}.jpg')` }" @click="rotatePage('page5')"></div>
                <div class="page4 r page" :style="{ backgroundImage: `url('/tid102/g2/PDO/MS/right2_${item.id}.jpg')` }" @click="rotatePage('page4')"></div>
                <div class="page3 l page" :style="{ backgroundImage: `url('/tid102/g2/PDO/MS/left2_${item.id}.jpg')` }" @click="rotatePage('page3')"></div>
                <div class="page2 r page" :style="{ backgroundImage: `url('/tid102/g2/PDO/MS/right1_${item.id}.jpg')` }" @click="rotatePage('page2')"></div>
                <div class="page1 l page" :style="{ backgroundImage: `url('/tid102/g2/PDO/MS/left1_${item.id}.jpg')` }" @click="rotatePage('page1')"></div>
                <div class="front page" :style="{ backgroundImage: `url('/tid102/g2/PDO/MS/${item.id}.jpg')` }" @click="rotatePage('front')"></div>
            </div>
           

        </div>
      </transition-group>
      <div class="arrow arrow-right" @click="moveLeft">→</div>
    </div>
  </template>
  
<script setup>
  import { ref, computed } from 'vue'

  const selectedItem = ref(null)
  const items = ref(['paint1', 'paint6', 'paint5', 'paint4', 'paint3', 'paint2'])
  const active = ref(0)
  const direction = ref('')

  // 計算屬性來判斷書是否開啟
  const isBookOpen = computed(() => selectedItem.value !== null)

  const handleClick = (item, event) => {
      if (item.level === 0) {
          selectedItem.value = item.id
      }
      event.stopPropagation()
  }

  const resetSelectedItem = (event) => {
      const element = document.querySelector('.enlarged')
      event.stopPropagation()

      if (element && element.classList.contains('enlarged')) {
          const book = element.querySelector('.book')

          book.querySelector('.front').style.transform = 'rotateY(-7deg)'
          book.querySelector('.page1').style.transform = 'rotateY(-6deg)'
          book.querySelector('.page2').style.transform = 'rotateY(-5deg)'
          book.querySelector('.page3').style.transform = 'rotateY(-4deg)'
          book.querySelector('.page4').style.transform = 'rotateY(-3deg)'
          book.querySelector('.page5').style.transform = 'rotateY(-2deg)'
          book.querySelector('.page6').style.transform = 'rotateY(-1deg)'
          book.querySelector('.back').style.transform = 'rotateY(0deg)'
          book.style.transform = 'translateX(0px)'

          selectedItem.value = null
      }
  }

  const moveLeft = () => {
      if (!isBookOpen.value) {
          active.value = active.value === 0 ? items.value.length - 1 : active.value - 1
          direction.value = 'left'
      }
  }

  const moveRight = () => {
      if (!isBookOpen.value) {
          active.value = (active.value + 1) % items.value.length
          direction.value = 'right'
      }
  }

  const generateItems = () => {
      const result = []
      for (let i = active.value - 2; i <= active.value + 2; i++) {
          let index = i
          if (i < 0) index = items.value.length + i
          if (i >= items.value.length) index = i % items.value.length
          result.push({ id: items.value[index], level: active.value - i })
      }
      return result
  }

  const rotatePage = (page) => {
      const book = document.querySelector('.enlarged .book')
      const pageElement = book.querySelector(`.${page}`)

      switch (page) {
          case 'front':
              pageElement.style.transform = 'rotateY(-180deg)'
              book.querySelector('.page1').style.transform = 'rotateY(-179deg)'
              book.style.transform = 'translateX(50%)'
              break
          case 'page2':
              pageElement.style.transform = 'rotateY(-178deg)'
              book.querySelector('.page3').style.transform = 'rotateY(-177deg)'
              break
          case 'page4':
              pageElement.style.transform = 'rotateY(-176deg)'
              book.querySelector('.page5').style.transform = 'rotateY(-175deg)'
              break
          case 'page6':
              book.querySelector('.front').style.transform = 'rotateY(-180deg) translateX(100%)'
              book.querySelector('.page1').style.transform = 'rotateY(-179deg) translateX(100%)'
              book.querySelector('.page2').style.transform = 'rotateY(-178deg) translateX(100%)'
              book.querySelector('.page3').style.transform = 'rotateY(-177deg) translateX(100%)'
              book.querySelector('.page4').style.transform = 'rotateY(-176deg) translateX(100%)'
              book.querySelector('.page5').style.transform = 'rotateY(-175deg) translateX(100%)'
              pageElement.style.transform = 'rotateY(-174deg) translateX(100%)'
              book.querySelector('.back').style.transform = 'rotateY(-173deg) translateX(100%)'
              book.style.transform = 'translateX(200%)'
              break
          case 'back':
              pageElement.style.transform = 'rotateY(0deg)'
              book.querySelector('.front').style.transform = 'rotateY(-180deg)'
              book.querySelector('.page1').style.transform = 'rotateY(-179deg)'
              book.querySelector('.page2').style.transform = 'rotateY(-178deg)'
              book.querySelector('.page3').style.transform = 'rotateY(-177deg)'
              book.querySelector('.page4').style.transform = 'rotateY(-176deg)'
              book.querySelector('.page5').style.transform = 'rotateY(-175deg)'
              book.querySelector('.page6').style.transform = 'rotateY(-1deg)'
              book.style.transform = 'translateX(50%)'
              break
          case 'page5':
              pageElement.style.transform = 'rotateY(-2deg)'
              book.querySelector('.page4').style.transform = 'rotateY(-3deg)'
              break
          case 'page3':
              pageElement.style.transform = 'rotateY(-4deg)'
              book.querySelector('.page2').style.transform = 'rotateY(-5deg)'
              break
          case 'page1':
              pageElement.style.transform = 'rotateY(-6deg)'
              book.querySelector('.front').style.transform = 'rotateY(-7deg)'
              book.style.transform = 'translateX(0px)'
              break
      }

  }
</script>
  
  

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css?family=Lobster');

#carousel {
    display: flex;
    align-items: center;
    width: 100vw;
    height: 100vh;
    // background-color: rgb(201, 201, 255);
    padding-top: 100px;
    margin-top: -220px;
}

.arrow {
    width: 30px;
    height: 30px;
    z-index: 1000;
    font-size: 20px;
    cursor: pointer;
    line-height: 30px;
    border-radius: 50%;
    position: absolute;
    text-align: center;
    background-color: white;
}


.item {
    color: white;
    font-size: 40px;
    position: absolute;
    text-align: center;
    transition:
        height 1s,
        width 1s,
        left 1s, 
        margin-top 1s,
        line-height 1s,
        background-color 1s,
        transform 0.3s ease;
}


.level0 {
    z-index: 5;
    opacity: 1;
    width: 200px;
    height: 250px;
    margin-top: -150px;
    line-height: 200px;
}

.level1,.level-1 {
    z-index: 4;
    opacity: 0.9;
    width: 130px;
    height: 180px;
    margin-top: -85px;
    line-height: 180px;
}

.level2,.level-2 {
    z-index: 3;
    width: 110px;
    opacity: 0.7;
    height: 150px;
    margin-top: -70px;
    line-height: 150px;
}

$edge: 15vw;
$gap1: 24vw;
$gap2: 14vw;

.arrow-left     {left : calc(        $edge - (  30px / 2 ));}
.level-2        {left : calc( 50vw - $gap1 - ( 110px / 2 ));}
.level-1        {left : calc( 50vw - $gap2 - ( 130px / 2 ));}
.level0         {left : calc( 50vw         - ( 200px / 2 ));}
.level1         {left : calc( 50vw + $gap2 - ( 130px / 2 ));}
.level2         {left : calc( 50vw + $gap1 - ( 110px / 2 ));}
.arrow-right    {right: calc(        $edge - (  30px / 2 ));}


.left-enter-active,.left-leave-active, .right-leave-active ,.right-enter-active {
    transition: all 1s;
}

.left-enter , .left-leave-to  { transform: translateX(-100%);opacity: 0;}
.right-enter, .right-leave-to { transform: translateX( 100%);opacity: 0;}

.body{
    display: flex;
    justify-content: center;
    perspective: 1200px;
}

.book{
    display: flex;
    transform-style: preserve-3d;
    position: relative;
    width: 200px;
    margin: 0 auto;
    cursor: pointer;
    backface-visibility: visible;
    transition: .2s;
    transform: rotateY(-10deg);
}

.book > div {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    position: absolute;
    transform-style: preserve-3d;
    transform-origin: left center;
    background-color: white;
    transition:
        transform 0.3s ease-in-out, 
        box-shadow .35s ease-in-out; 
}


.book:hover{
    transform: translateY(-10px);
    animation: shake 5s infinite; 
    box-shadow: 0 0 1em 0 rgba(255, 255, 255, 0.2);
}

// @keyframes shake {
//       0% { transform: translateY(-7px) }
//      30% { transform: translateY( 7px) }
//      50% { transform: translateY( 0px) }
//      70% { transform: translateY( 7px) }
//     100% { transform: translateY(-7px) }
// }

.front{
    background-color: white;

}
.front,.back,.l,.r{
    background-position:center;
    border-top-right-radius: .5em;
    border-bottom-right-radius: .5em;
}


.front{ background-size: cover; transform: rotateY(-7deg) }
.page1{ background-size: cover; transform: rotateY(-6deg) ;background-color:red($color: #000000);}
.page2{ background-size: cover; transform: rotateY(-5deg) }
.page3{ background-size: cover; transform: rotateY(-4deg) }
.page4{ background-size: cover; transform: rotateY(-3deg) }
.page5{background-size: cover;  transform: rotateY(-2deg) }
.page6{ background-size: cover; transform: rotateY(-1deg) }
 .back{ background-size: cover; transform: rotateY( 0deg) }

.text{
  border-top-left-radius: .5em;
  border-bottom-left-radius: .5em;
    background-size: cover;
    transform: scaleX(-1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    height: 100%;
    text-align: center;
}

.page2,.page4,.page6{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
}

.book h6{
    margin-bottom: 20px;
}

.book:hover .front{ transform: rotateY(-30deg) scale(1.1); }
.book:hover .page1{ transform: rotateY(-28deg) scale(1.1); }
.book:hover .page2{ transform: rotateY(-26deg) scale(1.1); }
.book:hover .page3{ transform: rotateY(-24deg) scale(1.1); }
.book:hover .page4{ transform: rotateY(-22deg) scale(1.1); }
.book:hover .page5{ transform: rotateY(-20deg) scale(1.1); }
.book:hover .page6{ transform: rotateY(-18deg) scale(1.1); }
.book:hover .back { transform: rotateY(-16deg) scale(1.1); }

.enlarged .book .front{ transform: rotateY(-7deg) }
.enlarged .book .page1{ transform: rotateY(-6deg) }
.enlarged .book .page2{ transform: rotateY(-5deg) }
.enlarged .book .page3{ transform: rotateY(-4deg) }
.enlarged .book .page4{ transform: rotateY(-3deg) }
.enlarged .book .page5{ transform: rotateY(-2deg) }
.enlarged .book .page6{ transform: rotateY(-1deg) }
.enlarged .book  .back{ transform: rotateY( 0deg) }

.enlarged {
    transform: translateY(-10px);
    // width: 600px;
    top: 50%;
    z-index: 10;
    transform-style: preserve-3d;
    transform: scale(2);
    left: calc(50% - 100px);
}
@media screen and (max-width:430px) {

    .book{
        width: 100px;
    }

    .level0 {
        width: 100px;
        height: 125px;
    margin-top: -100px;

    }

    .level1,.level-1 {
        width: 80px;
        height: 100px;
    }

    .level2,.level-2 {
        width: 60px;
        height: 75px;
    }

    .arrow-left     {left : calc(        $edge - (  30px / 2 ));}
    .level-2        {left : calc( 50vw - $gap1 - ( 60px / 2 ));}
    .level-1        {left : calc( 50vw - $gap2 - ( 80px / 2 ));}
    .level0         {left : calc( 50vw         - ( 100px / 2 ));}
    .level1         {left : calc( 50vw + $gap2 - ( 80px / 2 ));}
    .level2         {left : calc( 50vw + $gap1 - ( 60px / 2 ));}
    .arrow-right    {right: calc(        $edge - (  30px / 2 ));}
    .enlarged {
    // top: 0%;
        left: calc(50% - 50px);
    }
}
</style>
