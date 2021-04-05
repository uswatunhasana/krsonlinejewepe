function subtotalKRS() {
  var subtotal_barang = subtotal;
  $('.total_barang').each(function () {
    subtotal_barang += parseInt($(this).val());
  });
  $('.nilai-subtotal1-td').html( + parseInt(subtotal_barang).toLocaleString());
  $('.nilai-subtotal2-td').val(subtotal_barang);
}

function isiMK() {
  var total = subtotal;
  $('.nilai-total1-td').html( + parseInt(total).toLocaleString());
  $('.nilai-total2-td').val(total);
}

function jumlahMK() {
  var jumlah_barang = 0;
  $('.jumlah_barang_text').each(function () {
    jumlah_barang += parseInt($(this).text());
  });
  $('.jml-barang-td').html(jumlah_barang + ' Barang');
}

$(document).on('click', '.btn-hapus', function (e) {
  e.preventDefault();
  $(this).parent().parent().remove();
  subtotalBarang();
  diskonBarang();
  jumlahBarang();
});

