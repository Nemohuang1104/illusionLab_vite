<template>
  <div>
    <!-- 内容区域 -->
    <div class="content">
      <div>
        content-0
      </div>
      <div>
        content-1
      </div>
      <div>
        content-2
      </div>
      <div>
        content-3
      </div>
      <div>
        content-4
      </div>
    </div>
    <!-- 导航区域 -->
    <ul class="navs">
      <li :class="{active: active===0}" @click="scrollTo(0)">
        content-0
      </li>
      <li :class="{active: active===1}" @click="scrollTo(1)">
        content-1
      </li>
      <li :class="{active: active===2}" @click="scrollTo(2)">
        content-2
      </li>
      <li :class="{active: active===3}" @click="scrollTo(3)">
        content-3
      </li>
      <li :class="{active: active===4}" @click="scrollTo(4)">
        content-4
      </li>
    </ul>
  </div>
</template>

<script>
import { ref, onMounted, onBeforeUnmount } from 'vue';

export default {
  setup() {
    const active = ref(0);// 当前激活的导航索引

    const onScroll = () => {
      const navContents = document.querySelectorAll('.content div');
      const offsetTopArr = Array.from(navContents).map(item => item.offsetTop);
      const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;

      let navIndex = 0;
      for (let n = 0; n < offsetTopArr.length; n++) {
        if (scrollTop >= offsetTopArr[n]) {
          navIndex = n;
        }
      }
      active.value = navIndex;
    };

    const scrollTo = (index) => {
      const targetOffsetTop = document.querySelector(`.content div:nth-child(${index + 1})`).offsetTop;
      let scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
      const STEP = 50;

      const smoothDown = () => {
        if (scrollTop < targetOffsetTop) {
          if (targetOffsetTop - scrollTop >= STEP) {
            scrollTop += STEP;
          } else {
            scrollTop = targetOffsetTop;
          }
          document.body.scrollTop = scrollTop;
          document.documentElement.scrollTop = scrollTop;
          requestAnimationFrame(smoothDown);
        }
      };

      const smoothUp = () => {
        if (scrollTop > targetOffsetTop) {
          if (scrollTop - targetOffsetTop >= STEP) {
            scrollTop -= STEP;
          } else {
            scrollTop = targetOffsetTop;
          }
          document.body.scrollTop = scrollTop;
          document.documentElement.scrollTop = scrollTop;
          requestAnimationFrame(smoothUp);
        }
      };

      if (scrollTop > targetOffsetTop) {
        smoothUp();
      } else {
        smoothDown();
      }
    };

    onMounted(() => {
      window.addEventListener('scroll', onScroll);
    });

    onBeforeUnmount(() => {
      window.removeEventListener('scroll', onScroll);
    });

    return {
      active,
      scrollTo,
    };
  },
};

</script>

<style scoped>
  /* 内容区的样式 */
  .content {
    background-color: white;
    width: 500px;
  }
  .content div {
    width: 100%;
    height: 600px;
    font-size: 36px;
    padding: 20px;
    background-color: #7ec384;
  }
  .content div:nth-child(2n) {
    background-color: #847ec3;
  }
  /* 导航栏的样式 */
  .navs {
    position: fixed;
    top: 80px;
    left: 700px;
    background-color: #efefef;
  }
  .navs li {
    padding: 0 20px;
    line-height: 1.6;
    font-size: 24px;
    cursor: pointer;
  }
  /* 当导航被点亮后改变颜色 */
  .navs .active{
    color: #847ec3;
    background-color: #e2e2e2;
  }
</style>

作者：七分小熊猫
链接：https://juejin.cn/post/6844903940539023367
来源：稀土掘金
著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。