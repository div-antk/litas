// Laravelの全画面で共通的に使用することを想定したJS

import './bootstrap'
// import './packery.pkgd.min'
import './macy'
// import './draggabilly.pkgd.min'
import Vue from 'vue'
import ListingLike from './components/ListingLike'
import ListingTagsInput from './components/ListingTagsInput'
import draggable from 'vuedraggable'
// import FollowButton from './components/FollowButton'

const app = new Vue({
  el: '#app',
  components: {
    ListingLike,
    ListingTagsInput,
    draggable,
  }
})