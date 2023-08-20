<!DOCTYPE html>
<html>
<head>
    <title>AllPHPTricks.com</title>
    <style>
        .search_box {
            position: relative;
            width: 50%;
            padding-left: 25%;
            padding-top: 7%;
        }
        .search_box input[type="text"] {
            display: block;
            width: 100%;
            height: 35px;
            line-height: 35px;
            padding: 0;
            margin: 0;
            border: 1px solid #9f9897;
            outline: none;
            overflow: hidden;
            border-radius: 0px;
            background-color: rgb(255, 255, 255);
            text-indent: 15px;
            font-size: 14px;
            color: #222;
            border-right: 0;
        }
        .search_box input[type="submit"] {
            display: inline-block;
            width: 40%;
            height: 37px;
            padding: 0;
            margin: 0;
            border: 0;
            outline: 0;
            overflow: hidden;
            background-color: #8bbbdc;
            color: #FFF;
            border: 1px solid #9f9897;
        }

        /* Стили для плашки с результатами */
        .search_result {
            position: absolute;
            top: 100%;
            left: 0;
            border: 1px solid #ddd;
            background: #fff;
            padding: 10px;
            z-index: 9999;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }
        .flex{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
            flex-direction: row;
            align-content: center;
        }
    </style>
    <script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
</head>
<body>
<div class="search_box">
    <form action="">
        <div class="flex">
        <input type="text" name="search" id="search" placeholder="Введите город">
        <input type="submit">
    </div>
    </form>
    <div id="search_box-result">
        @foreach ($researcher as $item)
            <P>1123</P>
        @endforeach

    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        var $result = $('#search_box-result');

        $('#search').on('keyup', function(){
            var search = $(this).val();
            if ((search != '') && (search.length > 1)){
                $.ajax({
                    type: "POST",
                    url: "/api/admin/search",
                    data: {'search': search},
                    success: function(msg){
                        $result.html(msg);
                        if(msg != ''){
                            $result.fadeIn();
                        } else {
                            $result.fadeOut(100);
                        }
                    }
                });
            } else {
                $result.html('');
                $result.fadeOut(100);
            }
        });

        $(document).on('click', function(e){
            if (!$(e.target).closest('.search_box').length){
                $result.html('');
                $result.fadeOut(100);
            }
        });

        $(document).on('click', '.search_result-name a', function(){
            $('#search').val($(this).text());
            $result.fadeOut(100);
            return false;
        });

        $(document).on('click', function(e){
            if (!$(e.target).closest('.search_box').length){
                $result.html('');
                $result.fadeOut(100);
            }
        });

    });
</script>
</html>
