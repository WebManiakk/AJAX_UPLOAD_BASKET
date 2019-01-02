//удаление товара из корзины в попапе
$(document).on("click", '.t-basket__close', function(e) {
    e.preventDefault();
    var id = $(this).attr('itemId');
      $.ajax({
          url: '/local/ajax/delforbasket.php',
          data: {
            id: id,
        },
        dataType: 'json',
          success: function(result){
			  $('.header__h-info li.h-info__item-basket span.h-info__count').text(parseInt($('.header__h-info li.h-info__item-basket span.h-info__count').text())-1);
			  $.ajax({
					url:'/local/ajax/addtocart.php',
					type:'POST',
					data:{'basket':'refresh'},
					success: function(data) {
					   $('#basket_popup').html(data);

					},
				})
              // $('#del_'+id).css({"display": "none"});
          }
      });
});
