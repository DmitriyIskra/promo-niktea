<!DOCTYPE html>
<html lang="ru">

<head>
    @include('template_parts.header_css_js')
    <link rel="stylesheet" href="{{ asset("css/winners.css?v=").time()}}">
    <title>Призы</title>
</head>
<script>
    let ready_main = false
    let ready_tea = false
    function check(PrizeName) {
        var settings = {
            "url": "http://niktea/api/winners/status",
            "method": "POST",
            "timeout": 0,
            "async": false,
            "headers": {
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "type": PrizeName
            }),
        };

        $.ajax(settings).done(function (response2) {
            if(PrizeName == "main"){
                ready_main = response2
            }else{
                ready_tea = response2
            }
            if (response2 === false) {
                verstka = ''
                var $result = $('#' + PrizeName);
                $result.empty()
                console.log(verstka)
                $result.append(verstka);
            }
        });
    }
    check("main")
    check("tea")
</script>
<body data-variant="winners">

<header>
    <div class="header-wrapper header-wrapper--white">
        <title>Победители</title>
        @include('template_parts.header_menu')
        <link rel="stylesheet" href="{{ asset("css/winners.css?v=").time()}}">

    </div>
</header>

@include('template_parts.modal')

<main class="main">

    <div class="winners__container">

        <div class="winners__head">
            <h1>Победители</h1>
        </div>
        <div class="posts-section"></div>
        <section class="winners">

            <div class="winners-body">


                <div class="prize-button--wrap">
                    <button class="tablinks" value="main" onclick="openTypePrize(event, 'main')" id="defaultOpen">ГЛАВНЫЕ ПРИЗЫ</button>
                    <button class="tablinks" value="tea" onclick="openTypePrize(event, 'tea')">ЧАЙНЫЕ ПРИЗЫ</button>
                </div>

                <div id="main" class="tabcontent">
                </div>
                <div id="tea" class="tabcontent">
                </div>



                <div class="winners__button--wrap">
                    <button class="button__return">ВЕРНУТЬСЯ НА ГЛАВНУЮ</button>
                    <div class="button__return--back"></div>
                </div>

            </div>

        </section>

    </div>

</main>

@include('template_parts.footer')

<!-- переход на главную -->
<script>
    function openTypePrize(evt, PrizeName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(PrizeName).style.display = "block";
        evt.currentTarget.className += " active";
        render_table_result(PrizeName)
    }
    document.getElementById("defaultOpen").click();

    function render_table_result(PrizeName, page = 1){
        console.log(PrizeName)
        let verstka = `<table>
            <thead class='winners__tabe__head'>
            <tr>
            <th>Приз</th>
        <th class='winner__contacts'>Номер телефона и почта</th>
        <th>Дата вручения</th>
    </tr>
    </thead>
        <tbody id='PrizeNamebody'>`
        let ready
        if(PrizeName == "main"){
            ready = ready_main
        }else{
            ready = ready_tea
        }
        ready = false
        if(ready) {
            var settings = {
                "url": "/api/winners",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify({
                    "type": PrizeName,
                    "page": page
                }),
            };

            $.ajax(settings).done(function (response) {
                $.each(response, function (index, element) {
                    element.forEach(function (entry) {
                        parser(entry);
                    });
                    verstka += `</table>`
                    pagerender(page)
                    var $result = $('#' + PrizeName);
                    $result.empty()
                    console.log(verstka)
                    $result.append(verstka);
                    link_pagi()
                });
            });
        }else{
            zaglushka(PrizeName);
        }

        function zaglushka(PrizeName){
            if($('.attention')){
                $('.attention').remove()
            }
            let string = ''
            var div = document.createElement('div');
            div.className = 'attention';
            let winners_body = $(".winners-body")
            if(PrizeName == "main"){
                string = `<h1 style='text-align: center'>Список победителей будет определен после 15 октября.</h1>`
            }else{
                string = `<h1 style='text-align: center'>Список победителей будет определен после 15 декабря.</h1>`
            }
            div.innerHTML = string;
            var ele = document.querySelector('.winners__button--wrap');
            ele.parentNode.insertBefore(div, ele);

        }

        function pagerender(){
            console.log(page)
            pre_page = page - 1;
            next = page + 1
            after_next = page + 2
            if(page === 1) {
                verstka += `<div class='winners__table__pagination'>
                        <button class='pagination-number' value='pre_page'>
                        <img src='{{ asset('img/icons/pagination-arrow-left.svg') }}' alt='pagination-arrow-left'></button>
                        <button class='pagination-number active' value='` + page + `'>` + page + `</button>
                        <button class='pagination-number' value='` + next + `'>` + next + `</button>
                        <button class='pagination-number' value='` + after_next + `'>` + after_next + `</button>
                        <button class='pagination-number' value='next_page'>
                        <img src='{{ asset('img/icons/pagination-arrow-right.svg') }}' alt='pagination-arrow-right'></button>
                    </div>`
            }else{
                verstka += `<div class='winners__table__pagination'>
                        <button class='pagination-number' value='pre_page'>
                        <img src='{{ asset('img/icons/pagination-arrow-left.svg') }}' alt='pagination-arrow-left'></button>
                        <button class='pagination-number' value='` + pre_page + `'>` + pre_page + `</button>
                        <button class='pagination-number active' value='` + page + `'>` + page + `</button>
                        <button class='pagination-number' value='` + next + `'>` + next + `</button>
                        <button class='pagination-number' value='next_page'>
                        <img src='{{ asset('img/icons/pagination-arrow-right.svg') }}' alt='pagination-arrow-right'></button>
                    </div>`
            }
            }

        function parser(entry){
            console.log(entry);
            console.log(entry['user_phone'])
            verstka += `<tr>
            <td>`+entry['code_description']+`</td>
            <td>`+entry['user_email']+'/'+entry['user_phone']+`</td>
            <td>`+entry['code_delivery']+`</td>
            </tr>`
        }
    }
    function link_pagi() {
        $(".pagination-number").on('click', function () {
            let active_type = $(".tablinks.active").val()
            render_table_result(active_type, parseInt($(this).val()));
        });
    }
</script>

</body>
</html>
