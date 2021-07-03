(function($){

    //document ready
    $(document).ready(function(){

        $(document).on('click','a.logout_btn',function(e){
            e.preventDefault();
           $('form#logout_form').submit();
        });

        //Ck Editor
        CKEDITOR.replace( 'aboutsection' );













    });


})(jQuery)
