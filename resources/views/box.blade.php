@extends('layout')

@section('content')
    <div class="container">
        <div id="wrapper">
            <div class="row">
                <div class="col common-div">Div 1</div>
                <div class="col common-div">Div 2</div>
                <div class="col common-div">Div 3</div>
                <div class="col common-div">Div 4</div>
            </div>

            <div class="row mt-4">
                <select class="form-control" id="color-changer">
                    <option value="">Select Color</option>
                    <option value="bg-primary">Primary</option>
                    <option value="bg-secondary">Secondary</option>
                    <option value="bg-success">Success</option>
                    <option value="bg-danger">Danger</option>
                    <option value="bg-warning text-dark">Warning</option>
                    <option value="bg-info">Info</option>
                    <option value="bg-light text-dark">Light</option>
                    <option value="bg-dark">Dark</option>
                </select>
            </div>
        </div>
    </div>

    @push('css')
        <style>
            #wrapper {
                margin: 100px auto;
            }

            .common-div {
                height: 200px;
                border: 1px solid #000;
                text-align: center;
                line-height: 100px;
                cursor: pointer;
            }
        </style>
    @endpush

    @push('script')
        <script>
            $(document).ready(function () {
                Echo.channel('box-changer-notification')
                    .listen('.box-changer-event', (e) => {
                        console.log('listening event', e.data);

                        $(".common-div").each(function () {
                            // Remove all classes except col, common-div, and text-white
                            var classesToRemove = $(this).attr("class").split(" ").filter(function (c) {
                                return c !== "col" && c !== "common-div" && c !== "text-white";
                            });
                            $(this).removeClass(classesToRemove.join(" "));
                        });

                        $("#color-changer option").each(function () {
                            if ($(this).is(":selected")) {
                                $(this).removeAttr("selected");
                            }
                        });

                        $("#color-changer option").each(function(){
                            if ($(this).val() === e.data) {
                                $(this).prop("selected", true);
                            }
                        });

                        $(document).find('.common-div').addClass(e.data);
                    });
            })
        </script>
    @endpush

@endsection


