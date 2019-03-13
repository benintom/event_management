$(document).ready(function() {

    $('select[name="state"]').on('change', function(){
        var stateId = $(this).val();
        if(stateId) {
            $.ajax({
                url: '/dist/get/'+stateId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="district"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="district"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="district"]').empty();
        }

    });

});