<script type="text/javascript">
    var BASE_URL = "<?= base_url('index.php/') ?>";
    var BASE_ASSETS = "<?= base_url() ?>";

    $(()=>{
        loadData();
    })
    function showForm(){
        $('#load-data').hide()
        $('#form-data').show()
    }

    function onBack(){
        $('#load-data').show()
        $('#form-data').hide()
    }

    function loadData(){
        $.ajax({
            url: BASE_URL+'user/loadData',
            type: "GET",
            success: function(res){
                var res = JSON.parse(res);

                $('#table-user tbody').html('')
                var html = ''
                $.each(res,function(i,v){
                    html += `<tr>
                        <td>${i+1}</td>
                        <td><img src="${BASE_ASSETS}uploads/${v.user_foto}" alt="" width="200" height="100"></td>
                        <td>${v.user_name}</td>
                        <td>${v.user_role}</td>
                        <td>${v.user_username}</td>
                        <td align="center">
                            <a class="btn btn-sm bg-warning m-1 text-white" href="javacript:;">Edit</a>
                            <a class="btn btn-sm bg-danger m-1 text-white" href="javacript:;">Delete</a>
                        </td>
                    </tr>`
                })
                // for(var i = 0;i<res.length;i++){
                //     html += `<tr>
                //         <td>${i+1}</td>
                //         <td><img src="${BASE_ASSETS}uploads/${res[i].user_foto}" alt="" width="200" height="100"></td>
                //         <td>${res[i].user_name}</td>
                //         <td>${res[i].user_role}</td>
                //         <td>${res[i].user_username}</td>
                //         <td align="center">
                //             <a class="btn btn-sm bg-warning m-1 text-white" href="javacript:;">Edit</a>
                //             <a class="btn btn-sm bg-danger m-1 text-white" href="javacript:;">Delete</a>
                //         </td>
                //     </tr>`
                // }
                $('#table-user tbody').html(html)
                
            },
        })
    }

    function save(){
        var data = new FormData($("#form-user")[0]);
        var id = $('[name=user_id]').val();

        $.ajax({
            url: BASE_URL+'user/'+ (id ? 'update' : "add" ),
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            success: function(res){
                var res = JSON.parse(res);
                alert(res.message);
                if(res.success){
                    onBack()
                    loadData()
                }
            }
        })
    }
    
</script>