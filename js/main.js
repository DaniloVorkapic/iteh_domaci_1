
function deletePhone( deleteid){
    $.ajax({
        url: 'handler/delete.php',
        type: 'post',
        data: { deletesend: deleteid  },
        
        success: function(data, status){
            location.reload(true);
            alert("Uspesno obrisano!");
        }
    });
}