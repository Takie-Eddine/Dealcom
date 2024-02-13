

$('.chat-form').on('submit', function(e){
    e.preventDefault();
    let msg = $(this).find('textarea').val();
    $.post($(this).attr('action'), $(this).serialize(), function(response){

    });

    $('#kt_chat_messenger_body').append(`

        <div class="d-flex justify-content-end mb-10">

            <div class="d-flex flex-column align-items-start">

                <div class="d-flex align-items-center mb-2">

                    <div class="symbol symbol-35px symbol-circle">


                    </div>

                    <div class="ms-3">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1"></a>
                        <span class="text-muted fs-7 mb-1">just now</span>
                    </div>

                </div>

                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end " data-kt-element="message-text">${msg}</div>
            </div>
        </div>
    `);

    $(this).find('textarea').val('');
})
