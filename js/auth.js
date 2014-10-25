$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
        return null;
    }
    else{
        return results[1] || 0;
    }
}

function insert (uid, name, photo, smallphoto){
    var posting = $.post("/../php/dbwWrker",{
        vk_id=uid,
        vk_name=name,
        vk_photo=photo,
        vk_smalPhoto=smallphoto
        });
}

var uid = $.urlParam('uid');
var name = $.urlParam('first_name')+' '+$.urlParam('last_name');
var photo = $.urlParam('photo');
var smallPhoto = $.urlParam('photo_rec');
console.log(uid,name,photo,smallPhoto);