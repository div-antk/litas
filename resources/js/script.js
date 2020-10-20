// Macy({
//   container: '.masonry-block01'
// });
console.log('(´・ω・｀)');

var masonry = new Macy({
  container: '.masonry-container',
  // 子要素を他の子要素の高さに合わせる
  trueOrder: false,
  useOwnImageLoader: false,
  // 子要素同士の感覚
	margin: {
		x: 4,
		y: 4
	},
  columns: 6,
  // ブレイクポイントごとの設定
	breakAt: {
		1200: {columns: 5},
		940: {columns: 4},
		740: {columns: 3}
	}
});