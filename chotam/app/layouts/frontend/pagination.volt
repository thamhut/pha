<div id="pagination">
    <ul>
        {% set data_content = data['data_content'] %}
        <li><a href="{{ data['url'] }}"><<</a></li>
        {% if data_content.before < data_content.current %}
        <li><a href="{{ data['url'] }}&page={{ data_content.before }}"><</a></li>
        {% endif %}
        {% if data_content.current > 3 %}
        <li><a href="{{ data['url'] }}&page={{ data_content.current - 2 }}">{{ data_content.current - 2 }}</a></li>
        {% endif %}
        {% if data_content.current >= 2 %}
        <li><a href="{{ data['url'] }}&page={{ data_content.current - 1 }}">{{ data_content.current - 1 }}</a></li>
        {% endif %}
        <li><a class="current" href="{{ data['url'] }}&page={{ data_content.current }}">{{ data_content.current }}</a></li>
        {% if data_content.current <= (data_content.last - 1) %}
        <li><a href="{{ data['url'] }}&page={{ data_content.current+1 }}">{{ data_content.current+1 }}</a></li>
        {% endif %}
        {% if data_content.current < (data_content.last - 2) %}
        <li><a href="{{ data['url'] }}&page={{ data_content.current+2 }}">{{ data_content.current+2 }}</a></li>
        {% endif %}
        {% if data_content.current < data_content.next %}
        <li><a href="{{ data['url'] }}&page={{ data_content.next }}">></a></li>
        {% endif %}
        <li><a href="{{ data['url'] }}&page={{ data_content.last }}">>></a></li>
    </ul>
</div>

<style>
    #pagination li{
        display:inline;
        padding: 7px;
        vertical-align: middle;
        border-bottom: 0px;
    }
    #pagination{height: 40px;text-align: right;}
    #pagination ul{margin-top:10px;}
    .current{font-weight: bold; text-decoration: underline !important;color:#F60!important;}
</style>