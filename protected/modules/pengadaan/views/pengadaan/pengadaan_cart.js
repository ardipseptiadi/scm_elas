$(document).on('click', ".addCart", function () {
  var part_atr = $('#part');
  var qty_atr = $('#qty');
  var supplier_atr = $('#supplier');
  if(supplier_atr.val() == ''){
    alert("Supplier belum dipilih");
    return false;
  }
  if((part_atr.val()) && (qty_atr.val())){
    if(qty_atr.val() > 0){
    var id_part = part_atr.val();
    var qty = qty_atr.val();
    var supp = supplier_atr.val();
    //
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        data: {
            id_part: id_part,
            qty: qty,
            supp:supp,
        },
        url: window.location.origin + '/pengadaan/pengadaan/addCart',
        beforeSend: function(){
          $('#add_cart_info').html("");
        },
        success:  function(response){
          if(response.status){
              $('#add_cart_info').html("berhasil ditambahkan").attr('class','text-success');
          }else{
            var newHtml = response.responseText;
            $('#add_cart_info').html(newHtml).attr('class','text-danger');
          }
          $.fn.yiiGridView.update('cart-grid', {
                complete: function(jqXHR, status) {
                    console.log(status);
                }
            });
              // $('#cart-grid').yiiGridView('update');
        }
    });
  }else{ alert("Quantity tidak boleh kurang dari sama dengan 0")}
  }else{
    alert("Produk harus dipilih & Quantity tidak boleh kosong");
  }
});

function removecartitem(id,id_part)
{
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        data: {
            id: id,
            id_part: id_part
        },
        url: window.location.origin + '/pengadaan/pengadaan/removeCart',
        success:  function(response){
            $.fn.yiiGridView.update('cart-grid', {
                    complete: function(jqXHR, status) {
                        console.log(status);
                    }
            });
        }
    });
}
