// var paginate = 1;
// var dataExplore = [];
// loadMoreData(paginate);
// $(window).scroll(function () {
//     if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
//         paginate++;
//         loadMoreData(paginate);
//     }
// })

// function loadMoreData(paginate) {
//     var userlike, userfavorite;
//     $.ajax({
//         url: window.location.origin + '/getDataExplore/' + '?page=' + paginate,
//         type: "GET",
//         dataType: "JSON",
//         success: function (e) {
//             console.log(e)
//             e.data.data.map((x) => {
//                 var hasilPencarian = x.likefotos.filter(function (hasil) {
//                     return hasil.id_user === e.idUser
//                 })
//                 if (hasilPencarian.length <= 0) {
//                     userlike = 0;
//                 } else {
//                     userlike = hasilPencarian[0].id_user;
//                 }

//                 var hasilPencarianFavorite = x.favorite.filter(function (hasil) {
//                     return hasil.id_user === e.idUser
//                 })
//                 if (hasilPencarianFavorite.length <= 0) {
//                     userfavorite = 0;
//                 } else {
//                     userfavorite = hasilPencarianFavorite[0].id_user;
//                 }

//                 let datanya = {
//                     id: x.id,
//                     judul_foto: x.judul_foto,
//                     deskripsi_foto: x.deskripsi,
//                     foto: x.url,
//                     tanggal: x.created_at,
//                     jml_comment: x.comment_count,
//                     jml_like: x.likefotos_count,
//                     idUserLike: userlike,
//                     useractive: e.idUser,
//                     userfavorite: userfavorite
//                 }
//                 dataExplore.push(datanya)
//                 // console.log(userlike)
//                 // console.log(e.idUser)
//             })
//             getExplore()
//         },
//         error: function (jqXHR, textStatus, errorThrown) {

//         }
//     })
// }

// const getExplore = () => {
//     $('#exploredata').html('')
//     dataExplore.map((x, i) => {
//         $('#exploredata').append(
//             `
            // <div class="flex mt-2 bg-white">
            //     <div class="flex flex-col px-2">
            //         <a href="/explore-detail/${x.id}">
            //             <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
            //                 <img src="/assets/${x.foto}" alt=""
            //                     class="w-full transition duration-500 ease-in-out hover:scale-105">
            //                 </div>
            //         </a>
            //         <div class="flex flex-wrap items-center justify-between px-2 mt-2">
            //             <div>
            //                 <div class="flex flex-col">
            //                     <div>
            //                         ${x.judul_foto}
            //                     </div>
            //                     <div class="text-xs text-abuabu">
            //                         ${x.tanggal}
            //                     </div>
            //                 </div>
            //             </div>
            //             <div>
            //                 <span class="bi ${x.userfavorite === x.useractive ? 'bi-tag-fill' : 'bi-tag'}" onclick="pinned(this, ${x.id})"></span>
            //                 <small> ${x.jml_comment}</small>
            //                 <span class="bi bi-chat-left-text"></span>
            //                 <small> ${x.jml_like}</small>
            //                 <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill text-red-800' : 'bi-heart'} bi-heart" onclick="likes(this, ${x.id})"></span>
            //             </div>
            //         </div>
            //     </div>
            // </div>
//             `
//         )
//     })
// }


// function likes(txt, id) {
//     $.ajax({
//         url: window.location.origin + '/likefotos',
//         dataType: "JSON",
//         type: "POST",
//         data: {
//             _token: $('input[name="_token"]').val(),
//             idfoto: id,
//         },
//         success: function (res) {
//             console.log(res)

//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             alert('gagal')
//         }
//     })
// }

// function pinned(txt, id) {
//     $.ajax({
//         url: window.location.origin + '/pinned',
//         dataType: "JSON",
//         type: "POST",
//         data: {
//             _token: $('input[name="_token"]').val(),
//             idfoto: id,
//         },
//         success: function (res) {
//             console.log(res)

//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             alert('gagal')
//         }
//     })
// }


var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
        paginate++;
        loadMoreData(paginate);
    }
})

//pengulangan data
function loadMoreData(paginate) {
    var urlnya = window.location.href.split("?")[1];
    var parameter = new URLSearchParams(urlnya);
    var cariValue = parameter.get('cari')
    if(cariValue == 'null'){
    url = window.location.origin + '/getDataExplore/' + '?page'+ paginate;
    } else {
    url = window.location.origin + '/getDataExplore?cari='+ cariValue + '&page=' + paginate
    }
    var userlike, userfavorite;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (e) {
            console.log(e)
            e.data.data.map((x) => {
                var hasilPencarian = x.likefotos.filter(function (hasil) {
                    return hasil.id_user === e.idUser
                })
                if (hasilPencarian.length <= 0) {
                    userlike = 0;
                } else {
                    userlike = hasilPencarian[0].id_user;
                }

                var hasilPencarianFavorite = x.favorite.filter(function (hasil) {
                    return hasil.id_user === e.idUser
                })
                if (hasilPencarianFavorite.length <= 0) {
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
                    userfavorite: userfavorite
                }
                dataExplore.push(datanya)
                // console.log(userlike)
                // console.log(e.idUser)
            })
            getExplore()
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    })
}

const getExplore =()=>{
    $('#exploredata1').html('')
    dataExplore.map((x, i)=>{
        $('#exploredata1').append(
            `
            <div class="flex mt-2 ">
            <div class="flex flex-col px-2">
                    <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                        <img src="/assets/${x.foto}" alt=""
                            class="w-full transition duration-500 ease-in-out hover:scale-105">
                        </div>
                </a>
                <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                    <div>
                        <div class="flex flex-col text-white">
                            <div>
                                ${x.judul_foto}
                            </div>
                            <div class="text-xs text-white">
                                ${new Date (x.tanggal).toLocaleDateString("id")}
                            </div>
                        </div>
                    </div>
                    <div>
                        <span class=" bi ${x.userfavorite === x.useractive ? 'bi-tag-fill' : 'bi-tag'}" onclick="pinned(this, ${x.id})"></span>
                        <a href="/explore-detail/${x.id}">
                        <span class=" text-white bi bi-chat-left-text"></span><a>
                        <small class="text-white"> ${x.jml_comment}</small>
                        <span class=" text-white bi ${x.idUserLike === x.useractive ? 'bi-heart-fill text-red-800' : 'bi-heart'} bi-heart" onclick="likes(this, ${x.id})"></span>
                        <small class="text-white"> ${x.jml_like}</small>
                    </div>
                </div>
            </div>
        </div>
            `
        )
    });
}

function likes(txt, id) {
    $.ajax({
        url: window.location.origin + '/likefotos',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: id,
        },
        success: function (res) {
            console.log(res)

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('gagal')
        }
    })
}

function pinned(txt, id) {
    $.ajax({
        url: window.location.origin + '/pinned',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: id,
        },
        success: function (res) {
            console.log(res)

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('gagal')
        }
    })
}