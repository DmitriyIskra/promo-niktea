<!DOCTYPE html>
<html>
<head>
    <title>AllPHPTricks.com</title>
    <style>
        table {
            width: 100%;
            border: none;
            margin-bottom: 20px;
        }
        table thead th {
            font-weight: bold;
            text-align: left;
            border: none;
            padding: 10px 15px;
            background: #97f8e4;
            font-size: 14px;
            border-left: 1px solid #4d9f9b;
            border-right: 1px solid #4d9f9b;
        }
        table tbody td {
            text-align: left;
            border-left: 1px solid #4d9f9b;
            border-right: 1px solid #4d9f9b;
            padding: 10px 15px;
            font-size: 14px;
            vertical-align: top;
        }
        table thead tr th:first-child, table tbody tr td:first-child {
            border-left: none;
        }
        table thead tr th:last-child, table tbody tr td:last-child {
            border-right: none;
        }
        table tbody tr:nth-child(even){
            background: #d1ffe6;
        }
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
            /*border-right: 0;*/
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

        .preloader {
            /*фиксированное позиционирование*/
            position: fixed;
            /* координаты положения */
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            /* фоновый цвет элемента */
            background: #e0e0e0;
            /* размещаем блок над всеми элементами на странице (это значение должно быть больше, чем у любого другого позиционированного элемента на странице) */
            z-index: 1001;
        }

        .preloader__row {
            position: relative;
            top: 50%;
            left: 50%;
            width: 70px;
            height: 70px;
            margin-top: -35px;
            margin-left: -35px;
            text-align: center;
            animation: preloader-rotate 2s infinite linear;
        }

        .preloader__item {
            position: absolute;
            display: inline-block;
            top: 0;
            background-color: #337ab7;
            border-radius: 100%;
            width: 35px;
            height: 35px;
            animation: preloader-bounce 2s infinite ease-in-out;
        }

        .preloader__item:last-child {
            top: auto;
            bottom: 0;
            animation-delay: -1s;
        }

        @keyframes preloader-rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes preloader-bounce {

            0%,
            100% {
                transform: scale(0);
            }

            50% {
                transform: scale(1);
            }
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
        <!--<input type="submit">-->
    </div>
    </form>
    <div id="search_box-result">
    </div>
    <div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div>
    <table>
        <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Код</th>
            <th>Чек</th>
            <th>Время регистрации чека</th></tr>
        </thead>
        <tbody id="for-parse">

        </tbody>
    </table>
</div>

</body>
<script>
    $('.preloader').fadeOut().end().delay(400).fadeOut('slow');

    $(document).ready(function() {

        var $result = $('#search_box-result');
        $('#search').on('keyup', function(){
            var search = $(this).val();
            if ((search != '') && (search.length > 1)){
                $('.preloader').fadeIn();
                $.ajax({
                    type: "POST",
                    url: "/api/admin/search",
                    data: {'search': search},
                    success: function(msg){

                        $result.html(msg);
                        console.log(msg);
                        const tableData = msg.map(value => {
                            return (
                                `<tr>
                                <td contentEditable="true" class='edit' id="name_${ value.belongs_user_id }">${ value.user_name }</td>
                                <td contentEditable="true" class='edit' id="second_name_${ value.belongs_user_id }">${ value.user_second_name }</td>
                                <td contentEditable="true" class='edit' id="patronymic_${ value.belongs_user_id }">${ value.user_patronymic }</td>
                                <td contentEditable="true" class='edit' id="phone_${ value.belongs_user_id }">${ value.user_phone } </td>
                                <td contentEditable="true" class='edit' id="email_${ value.belongs_user_id }">${ value.user_email } </td>
                                <td>${value.code_string}</td>
                                <td>${value.ticket_path}</td>
                                <td>${value.code_activated_time}</td>
                                </tr>`
                            );
                        }).join('')
                        $('.preloader').fadeOut();

                        const tableBody = document.querySelector("#for-parse");
                        tableBody.innerHTML = tableData;

                        if(msg != ''){
                            $result.fadeIn();
                        } else {
                            $result.fadeOut(100);
                        }
                        $('.edit').click(function(){
                            $(this).addClass('editMode');
                        });

                        // Save data
                        $(".edit").focusout(function(){
                            $(this).removeClass("editMode");
                            var id = this.id;
                            var split_id = id.split("_");
                            var field_name = split_id[0];
                            var edit_id = split_id[1];
                            var value = $(this).text();

                            $.ajax({
                                url: 'handler.php',//файл с php скриптом, обновляющий данные в бд
                                type: 'post',
                                data: { field:field_name, value:value, id:edit_id },// отправляем имя поля, новое значение и id, чтобы определить, что конкретно и как надо обновить в таблице
                                success:function(response){
                                    console.log('Save successfully');
                                }
                            });

                        });
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
