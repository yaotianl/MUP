/**
 * Created by yaotianlin on 8/10/2014.
 */
$(document).ready(function(){
    setTimeout(function(){
        $("div.message").fadeOut("slow", function () {
            $("div.message").remove();
        });
    }, 2000);
});
