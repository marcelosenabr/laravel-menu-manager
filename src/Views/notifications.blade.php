@if(true !== config('menu.jquery_show') && config('menu.jquery_toastr_show'))
<script src="{{ config('menu.jquery_link') }}"></script>
@endif
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Styles -->
<style type="text/css">
    #success {
        background: green;
    }

    #error {
        background: red;
    }

    #warning {
        background: coral;
    }

    #info {
        background: cornflowerblue;
    }

    #question {
        background: grey;
    }
</style>
<script>

    $(document).ready(function () {
        toastr.options = {
                "maxItems": 1,
                "preventDuplicates": true,
                "progressBar": true,
                "timeOut": "2500",
        }
    });

    if ("{{ session('message.toastr') == true }}") {
        flashMessage({
            type: "{{ session('message.type') }}",
            text: "{{ session('message.text') }}",
            toastr: true,
        });
    }
    function flashMessage(data) {
        if (!data.toastr) {
            $("#notifications_messages").show();
            $('#div_alert').addClass('alert-' + data.type);
            $('#text_message').text(data.text);
        }else{
            toastrI9(data);
        }
    }

    function toastrI9(data2) {
        var type = data2.type;
        var text = data2.text;
        switch (type) {
            case 'info':
                toastr.info(text);
                break;

            case 'warning':
                toastr.warning(text);
                break;

            case 'success':
                toastr.success(text);
                break;

            case 'error':
                toastr.error(text);
                break;
            case 'danger':
                toastr.error(text);
                break;
        }
    }
</script>

@if (session('message') && session('message.toastr') != true)
<div class="alert alert-{{ session('message.type') }}" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    {{ session('message.text') }}
</div>
@endif

<div id="notifications_messages" style="display:none;">
    <div id="div_alert" class="alert alert-block" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div id="text_message"></div>
    </div>
</div>
