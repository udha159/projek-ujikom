var segmentTerakhir = window.location.href.split("/").pop();

$.getJSON(window.location.origin + '/other-pin/getDataPin/' + segmentTerakhir, function (res) {
    console.log(res)
    $('#namaUser').html(res.dataUser.nama_lengkap)
    $('#bio').html(res.dataUser.bio)
    $('#imageUser').prop('src', 'assets' + res.dataUser.pictures)
    $('#follower').html(res.jumlahFollower[0].jmlfollower + ' Pengikut')
    $('#follow').html(res.jumlahFollow[0].jmlfollow + ' Mengikuti')
    if (res.dataUserActive == res.dataUser.id) {
        $('#tombolikuti').html('')
    } else {
        if (res.dataFollow == null) {
            $('#tombolikuti').html('<button class="px-4 mt-4 text-white bg-black rounded-full" onclick="ikuti(this,' + res.dataUser.id + ')">Ikuti</button>')
        } else {
            $('#tombolikuti').html('<button class="px-4 mt-4 text-white bg-black rounded-full" onclick="ikuti(this,' + res.dataUser.id + ')">Tidak Ikuti</button>')
        }
    }
})

function ikuti(txt, id) {
    $.ajax({
        url: window.location.origin + '/explore-detail/ikuti',
        type: "POST",
        dataType: "JSON",
        data: {
            idfollow: id,
            _token: $('input[name="_token"]').val()
        },
        success: function (res) {
            location.reload()
        },
        error: function (jqHXR, textStatus, errorThrown) {
            alert('gagal')
        }
    })
}
