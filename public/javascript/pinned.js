var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);

$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        paginate++;
        loadMoreData(paginate);
    }
})


function loadMoreData(paginate) {
    $.ajax({
        url: window.location.origin + '/getDataFavorite' + '?page=' + paginate,
        type: "GET",
        dataType: "JSON",
        success: function (e) {
            console.log(e)
            e.data.data.map((x) => {
                var hasilPencarian = x.likefotos.filter(function(hasil){
                    return hasil.id_user === e.idUser
                })
                if(hasilPencarian.length <= 0) {
                    userlike = 0;
                } else {
                    userlike = hasilPencarian[0].id_user;
                }

                var hasilPencarianFavorite = x.favorite.filter(function(hasil){
                    return hasil.id_user === e.idUser
                })
                if(hasilPencarianFavorite.length <= 0) {
                    userfavorite = 0;
                } else {
                    userfavorite = hasilPencarianFavorite[0].id_user;
                }
                let datanya = {
                    id: x.id,
                    judul_foto: x.judul_foto,
                    deskripsi_foto: x.deskripsi,
                    foto: x.url,
                    tanggal: x.created_at,
                    jml_comment: x.comment_count,
                    jml_like: x.likefotos_count,
                    idUserLike: userlike,
                    useractive: e.idUser,
                    idUserFavorite: userfavorite
                }
                dataExplore.push(datanya)
            })
            getExplore()
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    })
}


const getExplore = () => {
    $('#pinnedfoto').html('')
    dataExplore.map((x, i) => {
        $('#pinnedfoto').append(
            `
            <div class="flex mt-2 bg-white">
                <div class="flex flex-col px-2">
                    <a href="explore-detail.html">
                        <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                            <img src="/assets/${x.foto}" alt=""
                                class="w-full transition duration-500 ease-in-out hover:scale-105">
                            </div>
                    </a>
                    <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                        <div>
                            <div class="flex flex-col">
                                <div>
                                    ${x.judul_foto}
                                </div>
                                <div class="text-xs text-abuabu">
                                    ${x.tanggal}
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="bi ${x.idUserFavorite === x.useractive ? 'bi-tag-fill' : 'bi-tag'}" onclick="pinned(this, ${x.id})"></span>
                            <small> ${x.jml_comment}</small>
                            <span class="bi bi-chat-left-text"></span>
                            <small> ${x.jml_like}</small>
                            <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill text-red-800' : 'bi-heart'} bi-heart" onclick="likes(this, ${x.id})"></span>
                        </div>
                    </div>
                </div>
            </div>
            `
        )
    })
}

function likes (txt, id) {
    $.ajax({
        url: window.location.origin +'/likefotos',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: id,
            },
            success: function(res) {
                console.log(res)
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('gagal')
        }
    })
}

function pinned (txt, id) {
    $.ajax({
        url: window.location.origin +'/pinned',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: id,
            },
            success: function(res) {
                console.log(res)
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('gagal')
        }
    })
}
