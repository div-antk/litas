// Macy({
//   container: '.masonry-block01'
// });

$(function(){
	$('.masonry-container').masonry({
			itemSelector: '.card',
			columnWidth: '.grid-sizer',
			percentPosition: true
	});
});

// var masonry = new Macy({
// 	itemSelector: '.col-sm-6',
//   container: '.masonry-container',
//   // 子要素を他の子要素の高さに合わせる
//   trueOrder: false,
//   useOwnImageLoader: false,
// 	// 子要素同士の感覚
//   margin: {
// 		x: 4,
// 		y: 4
// 	},
//   columns: 6,
//   // ブレイクポイントごとの設定
// 	breakAt: {
// 		1200: {columns: 5},
// 		940: {columns: 4},
// 		740: {columns: 3}
// 	}
// });

// 整列
// var $container = $('#packery');
// 	$container.packery({
// 	itemSelector: '.item',
// 	gutter: 10
// });

// 並び替え
// var $container = $('#packery').packery({
// 	columnWidth: 80,
// 	rowHeight: 80
// });
// $container.find('.item').each( function( i, itemElem ) {
// 	var draggie = new Draggabilly( itemElem );
// 	$container.packery( 'bindDraggabillyEvents', draggie );
// });