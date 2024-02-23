

$('.chat-form').on('submit', function(e){
    e.preventDefault();
    let msg = $(this).find('textarea').val();
    $.post($(this).attr('action'), $(this).serialize(), function(response){

    });
    addMessage(msg,'justify-content-start','bg-light-info','text-start');
    $(this).find('textarea').val('');
})



const addMessage = function(msg, c = 'justify-content-end', c1 = 'bg-light-primary', c2 = 'text-end'){
    $('#kt_chat_messenger_body').append(`

        <div class="d-flex ${c} mb-10">

            <div class="d-flex flex-column align-items-start">

                <div class="d-flex align-items-center mb-2">

                    <div class="symbol symbol-35px symbol-circle">


                    </div>

                    <div class="ms-3">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1"></a>
                        <span class="text-muted fs-7 mb-1">just now</span>
                    </div>

                </div>

                <div class="p-5 rounded ${c1} text-dark fw-semibold mw-lg-400px ${c2} " data-kt-element="message-text">${msg}</div>
            </div>
        </div>
    `);
}
