{% set data_content = data['data_content'] %}  
{% if data_content.last > data_content.current %}
<script>
$(document).ready(function () {
    $(window).scroll(function() { 
       if($(window).scrollTop() + $(window).height() == $(document).height()) {
               var url = "{{ data['url'] }}&page={{ data_content.current+1 }}";
               window.location = url;
       }
    });
});
</script> 
{% endif %}