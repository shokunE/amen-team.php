//id, val, название поля, название таблици
function changeVal( id, val, pole, tabl ){
    $.ajax({
        type: 'post',
        url: "/changeval/", //Путь к обработчику
        data: {'id':id,'val':val, 'pole': pole, 'tabl': tabl},
        dataType: 'json',
        success: function(data){

        }
    });
}


function changeValToggle( id, val, pole, tabl ){
    if( val ){
        changeVal(id,'1',pole,tabl);
    }else{
        changeVal(id,'0',pole,tabl);
    }
}

function changeReview( id, val, pole, tabl ) {
    changeVal( id, val, pole, tabl );
    changeVal( id, 1, 'edit', tabl );
}