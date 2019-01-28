$(document).ready(function(){
  $('#part').change(function(){
    if(this.value){
      // console.log(this.value);
      var val = this.value;
      $.ajax({
        type: 'POST',
        dataType: 'JSON',
        data: {
            id_part: val,
        },
        url: window.location.origin + '/pengadaan/pengadaan/getPeramalan',
        beforeSend: function(){
          // $('#add_cart_info').html("");
        },
        success:  function(response){
          var value_ramal = '0';
          if(response.status){
            value_ramal = response.hasil;
            value_ramal_bulat = "="+Math.round(value_ramal);
          }else{
            value_ramal = "Tidak Ada";
            value_ramal_bulat = value_ramal;
          }
          $('#ramal').attr('value',value_ramal);
          $('#ramal_bulat').attr('value',value_ramal_bulat);
        }
      });
    }else{
      $('#ramal').attr('value','');
      $('#ramal_bulat').attr('value','');
    }
  });
});
