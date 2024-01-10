jQuery(document).ready(function ($) {

    // получаем данные из php
    const pluginUrl = map_script_vars.plugin_url;
    const pinSlug = map_script_vars.important_post_ids;


    // при нажатие на кнопку добавить или изменить

    $(document).on('click', '.addSquare', function () {

        const postId = $(this).data('post-id');
        // запускаем скрипт созданиея метки
        createBlackSquare(postId);

        $(".td__btn").each(function (index, element) {
            var currentPostId = $(element).data('post-id');

            if (currentPostId == postId) {
                $(element).find('.addSquare, .deleteSquare').remove();
                $(`<button class="addSquare" data-post-id="${postId}">Изменить</button> <button class="deleteSquare" data-post-id="${postId}">Удалить</button>`).appendTo(this);
            }
        });
        showInfo(this);


    });



    $(document).on('click', '.deleteSquare', function () {

        // получаем id
        const postId = $(this).data('post-id');
        $('.black-square[data-post-id="' + postId + '"]').remove();
        // перезаписываем данные
        saveCoordinates(postId, " ", " ");


        $(".td__btn").each(function (index, element) {
            var currentPostId = $(element).data('post-id');

            if (currentPostId == postId) {
                $(element).find('.addSquare, .deleteSquare').remove();
                $(`<button class="addSquare" data-post-id="${postId}">Добавить</button>`).appendTo(this);
            }
        });


    });

















    function createBlackSquare(postId) {
        // удаляем все пины 
        $('.black-square[data-post-id="' + postId + '"]').remove();

        // Create a new black square
        initializeBlackSquare(postId);
    }







    // 
    function initializeBlackSquare(postId) {
        // получаем кординаты по оси х и у у пина
        const xCoordinate = parseInt($('.black-square[data-post-id="' + postId + '"]').data('x-coordinate'));
        const yCoordinate = parseInt($('.black-square[data-post-id="' + postId + '"]').data('y-coordinate'));



        // Вставляем через апенд нашу метку
        if (pinSlug.includes(postId)) {
            $('.int__map').append('<img class="black-square big-pin pin-change" src="' + pluginUrl + '/images/pin.svg" data-post-id="' + postId + '" />');
        } else {
            $('.int__map').append('<img class="black-square pin-change" src="' + pluginUrl + '/images/pin-small.svg" data-post-id="' + postId + '" />');
        }

        $('.black-square[data-post-id="' + postId + '"]').css({
            'left': 50 + '%',
            'top': 50 + '%'
        }).draggable({
            containment: '.int__map',
            stop: function (event, ui) {

                const xCoordinateC = ui.position.left;
                const yCoordinateC = ui.position.top;
                const xCoordinate = Math.round(xCoordinateC / ($(".int__map").width() / 100));
                const yCoordinate = Math.round(yCoordinateC / ($(".int__map").height() / 100));

                saveCoordinates(postId, xCoordinate, yCoordinate);
            },
        });
    }



    function saveCoordinates(postId, xCoordinate, yCoordinate) {
        // AJAX request to save coordinates
        $.ajax({
            url: map_script_vars.ajaxurl,
            type: 'POST',
            data: {
                action: 'save_coordinates',
                post_id: postId,
                x_coordinate: xCoordinate,
                y_coordinate: yCoordinate,
            },
            success: function (response) {



                // Выводим div с классом 'fix'
                const fixDiv = $('<div class="fix">Сохранено</div>');
                fixDiv.appendTo('.wrap');

                // Закрываем div через секунду
                setTimeout(function () {
                    fixDiv.remove();
                }, 1000);

            },
        });
    }

    $(".black-square").click(function () {
        showInfo(this);
    }

    );

    function showInfo(postId) {

        // Показываем loader при начале запроса
        $(".loader").show();
        $(".highlighted__wrap .highlighted__title, .highlighted__wrap .highlighted__city, .highlighted_btn").text(" ")

        const postId2 = $(postId).data('post-id');

        $.ajax({
            url: map_script_vars.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_post_data',
                post_id: postId2,
            },
            success: function (response) {
                $(".loader").hide();
                $(".highlighted__wrap .highlighted__title").text(response.title);
                $(".highlighted__wrap .highlighted__city").text(response.city)
                $(`<button class="addSquare" data-post-id="` + postId2 + `">Изменить</button>`).appendTo(".highlighted_btn");

            },
            error: function (error) {
                $(".loader").hide();
                console.log(error);
            },
        })



    }





});
