function updateStatus(){
    const switchMode = document.getElementById('switch-mode');
    if(switchMode.checked) {
        open_office();
        function open_office(query)
        {
            $.ajax({
                url:"./fetch/open.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#status_office').html(data);
                }
            });
        } 
    }else {
        close_office();
        function close_office(query)
        {
            $.ajax({
                url:"./fetch/close.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#status_office').html(data);
                }
            });
        } 
    }
}